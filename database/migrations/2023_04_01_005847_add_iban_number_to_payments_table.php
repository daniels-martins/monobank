<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::table('payments', function (Blueprint $table) {
         $table->string('recipient_iban_num', 35)->default('iban_num_from_34_to_35_digits')->after('receiver_routing_num'); //9 digit routing number
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::table('payments', function (Blueprint $table) {
         if (Schema::hasColumn('payments', 'recipient_iban_num')) Schema::dropColumns('payments', ['recipient_iban_num']);
      });
   }
};
