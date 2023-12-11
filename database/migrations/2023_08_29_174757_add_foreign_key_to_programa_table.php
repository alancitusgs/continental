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
        Schema::table('programa', function (Blueprint $table) {
          $table->unsignedBigInteger('id_temporada')->after('nombre');
          $table->foreign('id_temporada')->references('id')->on('temporada')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programa', function (Blueprint $table) {
            //
        });
    }
};
