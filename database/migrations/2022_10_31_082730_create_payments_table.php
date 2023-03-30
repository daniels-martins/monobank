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
         // future migrations
         $table->integer('receiver_routing_num')->default(123456789);//9 digit routing number

         // transaction/payment info
         $table->enum('type', ['credit', 'debit']); //(deposit, withdraw)
         $table->string('medium', 50); //cash, local_transfer, inter_transfer, atm, cheque
         $table->float('amount', 15);
         $table->string('remarks', 100);

         // future migrations : 2023_03_25_213025_add_status_to_payments_table.php
         $table->enum('status', ['pending', 'successful', 'failed', 'declined'])->default('successful');

         // Notifications
         $table->longText('trx_email')->nullable();
         $table->longText('trx_sms')->nullable();

         // foreign keys
         // the user_id belongs to the bluebird sender; payments are made by users of the app,but not all receivers are banking with us
         $table->foreignIdFor(User::class, 'sender_id');
         $table->foreignIdFor(User::class, 'receiver_id')->nullable();
         
         $table->dateTime('mod_trx_date')->nullable();
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
