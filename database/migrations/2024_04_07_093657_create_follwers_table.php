<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('uid')->unique();
            $table->bigInteger('main_user_id');
            $table->string('username');
            $table->string('fullname');
            $table->string('twubric');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follwers');
    }
};
