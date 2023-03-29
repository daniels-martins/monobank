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
      Schema::table('aza', function (Blueprint $table) {
         $table->string('reason_for_block')->after('is_blocked')->nullable();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::table('aza', function (Blueprint $table) {
         if (Schema::hasColumn('aza', 'reason_for_block')) Schema::dropColumns('aza', ['reason_for_block']);
      });
   }
};
