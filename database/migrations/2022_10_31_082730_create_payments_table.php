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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique()->default('DefaultTRXUniqCode');
            // uni

            // sender information
            $table->string('sender_bank', 50);
            $table->string('sender_acc', 10);
            $table->string('sender', 40);

            // receiver info
            $table->string('receiver_bank', 50);
            $table->string('receiver_acc', 10);
            $table->string('receiver', 40);
            

            // transaction info
            $table->string('type', 10); //credit / debit
            $table->string('medium', 10); //cash, online, atm, cheque
            $table->string('amount', 10);
            $table->string('remarks', 50);
            $table->string('init_balance', 20)->nullable();
            $table->string('final_balance', 20)->nullable();

            // tracking info
            $table->string('session_id', 50);// $request->_token 
            $table->string('trx_session_id', 50)->unique();//$request->_token . $time_info
            $table->string('trx_uid', 50)->unique(); //longest trx_id


            // Notifications
            $table->longText('trx_email')->default('Email Notification : Unavailable ');
            $table->string('trx_sms', 250)->default('SMS Notification : Unavailable '); 

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
