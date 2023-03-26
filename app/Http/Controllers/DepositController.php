<?php

namespace App\Http\Controllers;

use App\Models\AzaType;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{

   public function create(Request $request)
   {
      // dd('make dd');
      $aza_types = AzaType::all();
      $accounts = Auth::user()->azas;
      return view('admin.deposit.create', compact('aza_types', 'accounts'));
   }

   public function store(Request $request)
   {
      $this->validateDepositRequest($request);
      try {
         if ($this->createDepositInDB($request) and $this->updateAzaBalance($request)) return back()->with('success', 'Deposit Successful');
      } catch (\Throwable $th) {
         // dd($th->getMessage()); //for developer
         return back()->with('danger', 'Mobile Deposit failed');
      }
   }



   public function updateAzaBalance($request)
   {
      $relatedAza = Auth::user()->azas()->where('num', $request['source_aza'])->first();
      $relatedAza->balance += $request['amount'];
      return $relatedAza->save();
   }


   public function validateDepositRequest($request)
   {
      $request->validate([
         "source_aza" => "required",
         "amount" => "required",
         "trans-type" => "required",
         "trans-source" => "required",
      ]);
   }

   /**
    *  in this scenario, the source aza represents both the sender_acc and the receiver_acc; denoting a self made cash deposit
    * 
    */
   public function createDepositInDB($request)
   {
      // in this scenario, the source aza represents both the sender_acc and the receiver_acc; denoting a self made cash deposit
      // consult paymentcontroller for the uniqueID
      $request['uid'] = (new PaymentController)->makeUniqueUid();
      $newPayment =  Payment::create([
         'uid' => $request['uid'],
         'sender_bank' => 'Bluebird',
         'sender_acc' => $request['source_aza'],
         'sender' => trim(Auth::user()->profile->getFullName()),
         'receiver_bank' => 'Bluebird',
         'receiver_acc' => $request['source_aza'],
         'receiver' => trim(Auth::user()->profile->getFullName()),
         'type' => $request['trans-type'],
         'medium' => $request['trans-source'], //online
         'amount' => $request['amount'],
         'sender_id' =>  Auth::user()->id,
         'remarks' => 'cash deposit', // must set a value for this 
         // nullables
         // 'trx_email' => null,
      ]);
      if (($newPayment->receiver_acc == $newPayment->sender_acc) and ($newPayment->receiver_acc == $request->user()->azas()->first()->num)) {
         $newPayment->receiver_id = $newPayment->sender_id;
         $newPayment->save();
      }
      
      return $newPayment;
   }
}
