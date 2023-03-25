<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('payments', function (Blueprint $table) {
         $table->id();
         $table->string('uid', 20)->unique(); //new

         // sender information
         $table->string('sender_bank', 50);
         $table->string('sender_acc', 10);
         $table->string('sender', 40); //sender name

         // receiver info
         $table->string('receiver_bank', 50);
         $table->string('receiver_acc', 10);
         $table->string('receiver', 40); //receiver name

         // transaction/payment info
         $table->enum('type', ['credit', 'debit']); //(deposit, withdraw)
         $table->string('medium', 10); //cash, online, atm, cheque
         $table->float('amount', 12);
         $table->string('remarks', 50);

         // Notifications
         $table->longText('trx_email')->default('Email Notification : Unavailable ');
         $table->longText('trx_sms', 250)->default('SMS Notification : Unavailable ');

         // foreign keys
         // the user_id belongs to the bluebird sender; payments are made by users of the app,but not all receivers are banking with us
         $table->foreignIdFor(User::class, 'sender_id');
         $table->foreignIdFor(User::class, 'receiver_id')->nullable();

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
      Schema::dropIfExists('payments');
   }
};
