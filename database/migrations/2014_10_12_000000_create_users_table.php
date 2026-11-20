<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('image_profil')->nullable();
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('verify_key');
            $table->integer('active')->nullable();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('num_phone');
            $table->integer('nik');
            $table->string('born_date');
            $table->string('role');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};