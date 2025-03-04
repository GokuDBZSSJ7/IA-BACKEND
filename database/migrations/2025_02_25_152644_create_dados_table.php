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
        Schema::create('dados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudante_id')->constrained('estudantes')->onDelete('cascade');
            $table->integer('faltas')->nullable();
            $table->integer('faltas_consecutivas')->nullable();
            $table->decimal('nota_media', 4, 2)->nullable();
            $table->decimal('renda_familiar', 10, 2)->nullable();
            $table->boolean('bolsa')->nullable();
            $table->decimal('distancia', 6, 2)->nullable();
            $table->boolean('intervencao')->default(false);
            $table->string('resultado_intervencao')->nullable();
            $table->string('precisao_ia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dados');
    }
};
