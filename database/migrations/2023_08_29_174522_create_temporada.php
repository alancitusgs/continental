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
        Schema::create('temporada', function (Blueprint $table) {
            $table->id();
            $table->biginteger('anio_inicio')->length(20)->nullable(false);
            $table->biginteger('anio_fin')->length(20)->nullable(false);
            $table->boolean('visible')->nullable(false)->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporada');
    }
};
