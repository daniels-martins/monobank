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
         $table->enum('status', ['pending', 'successful', 'failed'])->after('remarks');
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
         if (Schema::hasColumn('payemnts', 'status')) Schema::dropColumns('payemnts', 'status');
      });
   }
};
