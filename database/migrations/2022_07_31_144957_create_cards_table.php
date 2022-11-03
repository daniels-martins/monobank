<?php

use App\Models\User;
use App\Models\CardKind;
use App\Models\CardType;
use App\Models\CardGroup;
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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('card_num');   
            $table->string('pan', 10)->nullable();
            
            $table->string('pin', 4)->default('0000');
            $table->string('cvv', 4)->default('111');
            $table->string('expiry', 5);
            $table->dateTime('expiry_timestamp');

            $table->boolean('status')->default(1);
            
            // foreign keys
            $table->foreignIdFor(CardKind::class);
            $table->foreignIdFor(CardType::class);
            $table->foreignIdFor(CardGroup::class);
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
        Schema::dropIfExists('cards');
    }
};
