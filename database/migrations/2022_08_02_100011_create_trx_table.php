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
            $table->string('sender_bank');
            $table->string('sender_acc');
            $table->string('receiver_bank');
            $table->string('receiver_acc');
            $table->string('amount');
            $table->enum('type', ['credit', 'debit']);//(deposit, withdraw)

            $table->string('method'); //online, cash, cheque

            // foreign keys
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
