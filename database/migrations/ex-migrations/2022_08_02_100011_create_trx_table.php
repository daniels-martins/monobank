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
        Schema::create('trx', function (Blueprint $table) {
            $table->id();
            // sender info
            $table->string('sender_bank');
            $table->string('sender_acc');
            // receiver info
            $table->string('receiver_bank');
            $table->string('receiver_acc');
            // trx info
            $table->float('amount', 12);
            $table->enum('type', ['credit', 'debit']);//(deposit, withdraw)
            $table->string('method'); //online, cash, cheque

            // foreign keys
            // the user_id belongs to the bluebird sender; payments are made by users of the app,but not all receivers are banking with us
            $table->foreignIdFor(User::class);
            
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
        Schema::dropIfExists('trx');
    }
};
