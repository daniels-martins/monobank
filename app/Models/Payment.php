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
}
