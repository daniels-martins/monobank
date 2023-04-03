<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   use HasFactory;
   protected $guarded = ['id'];









   //  helpers
   public function getTrxUId()
   {

      $unique_trx_id_prefix = 'TRX'; //default prefix

      // unique Bank Code, specific to MonoBank
      $MonoBankTrxPrefix = '093' . $this->uid;

      // final trx id
      return $trx_uid = $unique_trx_id_prefix . $MonoBankTrxPrefix;

      // date identifying code is redundant
      // $date_info = date('dmYHisu');
   }


   public function presentMedium()
   {
      $formattedString_v1 = str_replace('_', ' ', $this->medium);
      $formattedString = str_replace('ext', 'external', $formattedString_v1);
      return ucwords($formattedString);
   }

   public function desc()
   {
      $desc = '';
      // for self trx
      if ($this->sender == $this->receiver) $desc = $this->remarks;

      // if user is the sender
      else if ($this->sender_id == auth()->user()->id) $desc = "Sent to " . $this->receiver;

      // if user is the receiver
      else if ($this->receiver_id == auth()->user()->id) $desc = "Received from " . $this->sender;

      return $desc;
   }
}
