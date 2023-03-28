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
      Schema::create('contact_messages', function (Blueprint $table) {
         $table->id();

         $table->string('type', 15); //['suspension', 'contact' ]
         $table->string('fullname', 40);
         $table->string('email', 50);
         $table->string('phone', 15);
         $table->longText('message');
         $table->string('subject', 100)->nullable()->default('Contact Form Message');
         $table->string('acc_num', 10)->nullable();


         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('contact_messages');
   }
};
