<?php

namespace App\Http\Controllers;

use stdClass;
use Faker\Factory;
use App\Models\Aza;
use App\Models\Payment;
use Illuminate\Http\Request;
use GuzzleHttp\TransferStats;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      // not in use
      // return (request()->caller == 'xxx-admin') ? view('admin.xxxadmin.payments.index') :  view('admin.payments.index');
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
      // dd(request()->all());
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
      $request['payment_medium'] = 'local_transfer'; // Because it's done online via bank app,

      // create new payment
      if ($newPayment = $this->createNewPayment($request)) {
         if (($newPayment->receiver_acc == $newPayment->sender_acc) and ($newPayment->receiver_acc == $request->user()->azas()->first()->num)) {
            $newPayment->receiver_id = $newPayment->sender_id;
            $newPayment->save();
         }
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

         // first and important check 
         // if account is blocked, we will redirect to an error page and store the trx as pending
         if ($request->senderAza->is_blocked) {
            $newPayment->status = 'pending';
            // return the money back
            $request->senderAza->balance += $newPayment->amount;

            // save all changes
            $request->senderAza->save();
            $newPayment->save();
            // redirect to suspension page

            sleep(10); //to imitate bad processing on the server

            return redirect()->route('suspension');
            // ->with('danger', 'Transaction Failed Due to Ip check in new view')
         }

         // for monobank users
         // check if receiver account is registered on monobank/bluebird
         $monoReceiverAza = Aza::where('num', $newPayment->receiver_acc)->first();
         if ($monoReceiverAza) {;
            // credit the monoaccount
            $monoReceiverAza->balance += $newPayment->amount;
            $monoReceiverAza->save();
         }

         return back()->with('success', 'Transaction Successful');
      }
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
      // $aza = Aza::first();

      return view('admin.payments.edit', compact('payment'));

      dd('edidter');
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
      // dd($request->all(), $payment);
      $request->validate(['status' => 'sometimes', 'mod_trx_date' => 'sometimes']);

      // update the status if sent
      if ($request->status) {

         // do nothing when nothing changed
         if (
            empty($request->mod_trx_date) and
            (strtolower($payment->status) == strtolower($request->status) or
               (in_array(strtolower($payment->status), ['pending', 'failed']) and
                  in_array(strtolower($request->status), ['pending', 'failed'])))
         ) {
            return back()->with('warning', 'nothing changed');
         }

         // get the sender and receiver aza
         $foundRelatedSenderAza  = Aza::where('num', $payment->sender_acc)->first();
         $foundRelatedReceiverAza  = Aza::where('num', $payment->receiver_acc)->first();

         // if status changed to pending, failed; then return the money back
         if ($payment->status == 'successful' and in_array(strtolower($request->status), ['pending', 'failed'])) {
            if ($foundRelatedSenderAza->num ==  $foundRelatedReceiverAza->num) {
               # if sender and receiver are the same, then we only debit the receiver, cos it could be a cash deposit
               $foundRelatedReceiverAza->balance -= $payment->amount; //receiver will be debited
               $foundRelatedReceiverAza->save();
            } else {
               dd('other');
               // reverse the money
               $foundRelatedSenderAza->balance += $payment->amount; //sender will be credited
               $foundRelatedReceiverAza->balance -= $payment->amount; //receiver will be debited
               $foundRelatedSenderAza->save(); //save for sender 
               $foundRelatedReceiverAza->save(); //save for receiver 
            }
         } else if (in_array(strtolower($payment->status), ['pending', 'failed'])  or strtolower($request->status) == 'successful') {
            if ($foundRelatedSenderAza->num ==  $foundRelatedReceiverAza->num) {
               # if sender and receiver are the same, then we only credit the receiver, cos it could be a cash deposit
               $foundRelatedReceiverAza->balance += $payment->amount; //receiver will be credited
               $foundRelatedReceiverAza->save();
            } else {
               // reverse the money
               $foundRelatedSenderAza->balance -= $payment->amount; //sender will be debited
               $foundRelatedReceiverAza->balance += $payment->amount; //receiver will be credited
               $foundRelatedSenderAza->save(); //save for sender 
               $foundRelatedReceiverAza->save(); //save for receiver 
            }
         }
         // finally update db
         $payment->status = $request->status;
      }

      // update the mod_date if sent
      if ($request->mod_trx_date) {
         dd('mod');
         $theDateTime = Carbon::make($request->mod_trx_date)->toDateString() . ' ' . now()->toTimeString();
         $payment->mod_trx_date = $theDateTime;
      }
      return ($payment->save()) ? back()->with('success', 'Operation Successful') : back()->with('danger', 'Operation Failed');
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
         'sender' =>  trim($request->sender),


         // receiver info
         'receiver_acc' => $request->destination_aza,
         'receiver_bank' => $request->destination_bank,
         'receiver' => trim($request->beneficiary),

         // newly added
         'receiver_routing_num' => trim($request->receiver_routing_num),

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
      $request->validate(
         [
            // source_bank is not sent in request cause it's supposed to be from our bank app
            'source_aza' => 'required|min:5', //bluebird aza
            'destination_aza' => 'required|min:10', //bank aza num
            'destination_bank' => 'required|min:5', //bank name
            'beneficiary' => 'required|min:5',
            'amount' => 'required',
            'receiver_routing_num' => 'required'
         ],
         [
            'source_aza.required' => "The Sender's Bank Account is required",
            'source_aza.min' => "The Sender's Account must a valid account number",
            'destination_aza.required' => "The Receiver's Bank Account number is required",
            'receiver_routing_num.required' => "The Receiver's Bank Routing number is required",
            //  'destination_aza.min' => "The Receiver's Bank Account number must be a valid account number",//validated from html <input>
         ]
      );
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
