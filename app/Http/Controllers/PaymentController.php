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
        $request['uid'] = uniqid('093');
        // $request->validate(); //normal validation goes here

        $validator = Validator::make(
            $request->all(['uid' => 'unique:payments,uid'])
        );

        if ($validator->fails()) {
            // regenerate uniqid
            $request['uid'] = uniqid('093');
            // reload the route with the modified $request
            redirect()->route('payments.store', $request);
        } else
            $uid =  $request['uid']; // we go ahead and use the uniqid

        // The default payment method for this route is Debit
        // You can't make a payment and be credited
        $payment_type = 'DR'; //debit or credit

        // Payment Medium
        // Summary
        // 1. Cash 
        // a. withdrawn at the bank => dr only
        // b. Deposit at bank => cr
        // 2. Online POS eg.(jumia)  [have to link a debit card to this transaction] =>dr only
        // 3. ATM offline (offline, when the physical card is required) => dr/cr eg. via atm deposit at bank
        // 4. Cheque => cr/dr
        // 5. Online or Bank or Mobile | Transfer | from Bank App or WebApp => dr/cr



        // Since its done online via bank app,
        $payment_medium = 'online_transfer';

        // each payment medium has their message generated randomly from a set of rules
        // eg. the date, location and atm machine changes per every atm transaction.


        // get the sender account info used in trx
        $senderAza = Aza::where('num', $request->source_aza)->first();

        // get the sender name
        $sender = $senderAza->getOwner();




        $time_info = date('Hisu');

        // build the trx_uid
        $trx_uid = $this->buildTrxUId();

        //learn how to implement exceptions here
        // here you'll throw an InsufficientBalance Exception
        if (intval($senderAza->balance) < intval($request->amount))
            return back()->with('danger', 'Insufficient Funds');

        // dump all extra trx data into a native php object
        $newTrx = new stdClass();

        $newTrx->sender = $sender;
        $newTrx->payment_type = $payment_type;
        $newTrx->payment_medium = $payment_medium;
        $newTrx->trx_uid = $trx_uid;
        $newTrx->time_info = $time_info;
        $newTrx->senderAzaBalance = $senderAza->balance;

        // create new payment
        $newPayment = $this->createNewPayment($request, $newTrx);



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
        if ($newPayment) {







            $senderAza->refresh(); //to make sure we get the updated account balance

            // perform the debit transaction after creating the trx not before 
            // then save evidence to both the sender aza and the trx

            $senderBalanceAfterTrx = $senderAza->balance = $senderAza->balance - $request->amount;
            $senderAza->save();

            $newPayment->final_balance =  $senderBalanceAfterTrx;
            $newPayment->save();

            // ==================================================

            // Generate the sms Alert
            #code

            $desc = "$request->remarks | $payment_medium __ 
            FROM $sender TO $request->beneficiary ";

            $smsComposer  = 'Acct: ' . $request->source_aza . '\n';
            $smsComposer .= 'Amt: ' . $request->$request->amount . '\n';
            $smsComposer .= "Desc: $desc" . '\n';
            $smsComposer .= 'Avail Bal: ' . $senderAza->balance . '\n';
            $smsComposer .= 'Date: ' . $newPayment->created_at . '\n';

            // save sms alert content to db
            $newPayment->trx_sms = $smsComposer;
            $newPayment->save();

            // ==================================================
            // Generate the email Alert
            #code

            // save email alert text to db
            #code


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

    public function buildTrxUId()
    {

        $unique_trx_id_prefix = 'TRX'; //default prefix

        // unique Bank Code, specific to MonoBank
        $MonoBankTrxPrefix = '093';

        // date identifying code
        $date_info = date('dmYHisu');
        // final trx id
        return $trx_uid = $unique_trx_id_prefix . $MonoBankTrxPrefix . $date_info;
    }

    public  function createNewPayment(Request $request, stdClass $newTrx)
    {
        # code...
        return $newPayment = Payment::create([
            // sender information
            'sender_acc' => $request->source_aza,
            'sender_bank' =>  'MonoBank',
            'sender' =>  $newTrx->sender,


            // receiver info
            'receiver_acc' => $request->destination_aza,
            'receiver_bank' => $request->destination_bank,
            'receiver' => $request->beneficiary,

            // transaction info
            'type' => $newTrx->payment_type,
            'medium' => $newTrx->payment_medium,
            'amount' => $request->amount,
            'remarks' => $request->remarks,
            'init_balance' => $newTrx->ssenderAzaBalance,

            // tracking info
            'session_id' => $request->_token,
            'trx_session_id' => $request->_token . $newTrx->time_info,
            'uid' => $request['uid'],
            'trx_uid' => $newTrx->trx_uid,

        ]);
    }
}
