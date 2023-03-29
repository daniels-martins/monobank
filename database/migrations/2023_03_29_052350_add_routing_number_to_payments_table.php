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
         $table->integer('receiver_routing_num')->after('receiver')->default(123456789); //9 digit routing number

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
         if (Schema::hasColumn('payments', 'receiver_routing_num')) Schema::dropColumns('payments', ['receiver_routing_num']);
      });
   }
};
