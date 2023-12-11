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
        Schema::create('users', function (Blueprint $table) {
          $table->id();
          $table->string('nombres', 100)->nullable();
          $table->string('apellidos', 100)->nullable();
          $table->string('name');
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->string('avatar', 191)->default('avatar.png');
          $table->tinyInteger('visible')->default(1);
          $table->rememberToken();
          $table->foreignId('current_team_id')->nullable();
          $table->string('profile_photo_path', 2048)->nullable();
          $table->timestamps();
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
