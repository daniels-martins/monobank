<?php

namespace App\Http\Controllers;

use Faker\Factory;
use App\Models\Aza;
use App\Models\Payment;
use Illuminate\Http\Request;
use GuzzleHttp\TransferStats;
use Illuminate\Support\Facades\Validator;
use stdClass;

class PaymentController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return view('admin.payments.index');
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
      $accounts = auth()->user()->azas;
      return view('admin.payments.create', compact('accounts'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      // first of all, make sure that the uid is unique
      $request['uid'] = $this->makeUniqueUid();
      $this->validateRequest($request);

      // get the sender account info used in trx and save to $request
      $request['senderAza'] = Aza::where('num', $request->source_aza)->first(); //sender aza model
      $request['sender']  = $request->senderAza->getOwner(); // get the sender name

      //First stage of trx is checking aza balance ; learn how to implement exceptions so that here you'll throw an InsufficientBalance Exception
      if (intval($request->senderAza->balance) < intval($request->amount)) return back()->withInput($request->all())->with('danger', 'Insufficient Funds');

      // The default payment method for this route is Debit cos You can't make a payment and be credited.
      $request['payment_type'] = 'debit'; //debit or credit
      $request['payment_medium'] = 'online'; // Because it's done online via bank app,

      // create new payment
      $newPayment = $this->createNewPayment($request);

      if ($newPayment) {
         $request->senderAza->refresh(); //to make sure we get the updated account balance

         // do the maths
         // for sender
         $request->senderAza->balance -= $request->amount;
         $request->senderAza->save();

         // for receiver (if bluebird)
         // if ('reciever is bluebird') {
         //    $request['receiverAza'] = Aza::where('num', $request->destination_aza)->first();
         //    $request->receiverAza->balance += $request->amount;
         //    $request->senderAza->save();
         // }



         // Secondary Stuffs
         // Generate the sms Alert
         // $this->generateSmsAlert($request);

         // ==================================================
         // Generate the email Alert
         #code

         // save email alert text to db
         #code
      }

      return back()->with('success', 'Transaction Successful');
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Payment  $payment
    * @return \Illuminate\Http\Response
    */
   public function show(Payment $payment)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Payment  $payment
    * @return \Illuminate\Http\Response
    */
   public function edit(Payment $payment)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Payment  $payment
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Payment $payment)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Payment  $payment
    * @return \Illuminate\Http\Response
    */
   public function destroy(Payment $payment)
   {
      //
   }



   // ===================================Helpers


   public  function createNewPayment(Request $request)
   {
      // dd(trim($request->sender), 'online transfer of $' . $request->amount . ' from '. trim($request->sender) . ' to '. $request->beneficiary);
      $request['default_remark'] = 'online bank transfer of $' . $request->amount . ' from ' . trim($request->sender) . ' to ' . $request->beneficiary;
      return $newPayment = Payment::create([
         // sender information
         'sender_acc' => $request->source_aza,
         'sender_bank' =>  'MonoBank',
         'sender' =>  $request->sender,


         // receiver info
         'receiver_acc' => $request->destination_aza,
         'receiver_bank' => $request->destination_bank,
         'receiver' => $request->beneficiary,

         // transaction info
         'type' => $request->payment_type,
         'medium' => $request->payment_medium,
         'amount' => $request->amount,
         'remarks' => $request->remarks ?? $request['default_remark'],

         // tracking info
         // 'session_id' => $request->_token,
         'uid' => $request['uid'],

         'sender_id' => $request->user()->id
         // sender user id

      ]);
   }

   /**
    * Generates a unique uid for this new payment with the unique constraint on the payments table    
    */
   public function makeUniqueUid()
   {
      $genUid = uniqid('093');
      while (Payment::where('uid', $genUid)->first()) $genUid = uniqid('093'); // check for duplicates
      return $genUid;
   }


   public function validateRequest($request)
   {
      $request->validate([
         // source_bank is not sent in request cause it's supposed to be from our bank app
         'source_aza' => 'required|min:5', //bluebird aza
         'destination_aza' => 'required|min:5', //bank aza num
         'destination_bank' => 'required|min:5', //bank name
         'beneficiary' => 'required|min:5',
         'amount' => 'required'
      ]);
   }

   public function generateSmsAlert($request)
   {

      $desc = "$request->remarks | $request->payment_medium __ 
      FROM $request->sender TO $request->beneficiary ";

      $smsComposer  = 'Acct: ' . $request->source_aza . '\n';
      $smsComposer .= 'Amt: ' . $request->amount . '\n';
      $smsComposer .= "Desc: $desc" . '\n';
      $smsComposer .= 'Avail Bal: ' . $request->senderAza->balance . '\n';
      $smsComposer .= 'Date: ' . $newPayment->created_at . '\n';

      // save sms alert content to db
      $newPayment->trx_sms = $smsComposer;
      $newPayment->save();
   }
}


// notes; 

// Payment Medium
// Summary
// 1. Cash 
// a. withdrawn at the bank => dr only
// b. Deposit at bank => cr
// 2. Online POS eg.(jumia)  [have to link a debit card to this transaction] =>dr only
// 3. ATM offline (offline, when the physical card is required) => dr/cr eg. via atm deposit at bank
// 4. Cheque => cr/dr
// 5. Online or Bank or Mobile | Transfer | from Bank App or WebApp => dr/cr
// each payment medium has their message generated randomly from a set of rules
// eg. the date, location and atm machine changes per every atm transaction.



// Notifications Fmt
/** 
 * Trx Email format
 * Will get the fmt later
 * Sms format
 * Acct: 0162815192
 * Amt: NGN10,000 CR
 * Desc: 100 characters long
 * Avail Bal: NGN20,007.40
 * Date: 04-Oct-2022 14:33
 */
