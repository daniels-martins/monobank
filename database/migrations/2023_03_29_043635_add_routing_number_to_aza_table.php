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
         $table->integer('routing')->after('balance')->default(123456789);//9 digit routing number
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
         if (Schema::hasColumn('aza', 'routing')) Schema::dropColumns('aza', ['routing']);
      });
   }
};
