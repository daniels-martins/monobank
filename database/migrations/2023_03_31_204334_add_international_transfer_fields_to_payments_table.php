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
         $table->boolean('is_foreign')->default(false); //btwn 12 to 17
         $table->string('recipient_current_address', 200)->default('n/a');
         $table->string('recipient_bank_address', 200)->default('n/a');
         $table->enum('recipient_bank_account_type', ['savings', 'checking'])->default('savings'); //saivngs, checking
         $table->enum('jurisdiction', ['domestic', 'foreign'])->default('domestic'); //saivngs, checking
         $table->string('recipient_swift_or_bic_code', 35)->default('n/a');
         $table->string('recipient_phone', 17)->default('n/a');//btwn 12 to 17

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
         $newFields = [
            'is_foreign',
            'recipient_current_address',
            'recipient_bank_address',
            'recipient_bank_account_type',
            'recipient_swift_or_bic_code',
            'recipient_phone',
            'jurisdiction'
         ];
         if (Schema::hasColumns('payments', $newFields)) Schema::dropColumns('payments', $newFields);
      });
   }
};
