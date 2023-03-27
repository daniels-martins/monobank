<?php

use App\Models\Aza;
use App\Models\User;
use App\Models\AzaType;
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
        Schema::create('aza', function (Blueprint $table) {
            $table->id();
            // $table->enum('type', ['savings', 'checking']);
            $table->string('num', 10)->unique();
            $table->bool('status')->default(true);
            $table->string('balance')->default(0);

            // foreign keys
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(AzaType::class);
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
        Schema::dropIfExists('aza');
    }

};
