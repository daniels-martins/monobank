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
      Schema::create('profiles', function (Blueprint $table) {
         $table->id();

         $table->string('fname', 50)->nullable();
         $table->string('lname', 50)->nullable();
         $table->string('midname', 50)->nullable();

         // personal info
         $table->string('phone')->nullable();
         $table->string('dob')->nullable();
         $table->enum('sex', ['male', 'female', 'others'])->nullable();
         $table->enum('marital_status', ['single', 'married', 'others'])->nullable();
         $table->string('address')->nullable(); //added lately


         // nominee(next of kin)
         $table->string('nok_name')->nullable();
         $table->string('nok_relationship')->nullable();
         $table->string('nok_address')->nullable();
         $table->string('nok_phone')->nullable();

         // foreign keys
         $table->foreignIdFor(User::class)
            ->onDelete('cascade');

            
            // sturbborn boy
            // $table->string('user_email');
         //  $table->foreign(['user_email'])->references('email')->on('users')
         //  ->onDelete('cascade');                
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
      Schema::dropIfExists('profiles');
   }
};
