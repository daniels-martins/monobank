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
            $table->string('num', 10)->unique();
            // $table->boolean('status')->default(true);
            $table->enum('status', ['active', 'inactive', 'held', 'suspended'])->default('active');

            $table->string('balance')->default(0);

            // foreign keys
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(AzaType::class); //['savings', 'checking']
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
