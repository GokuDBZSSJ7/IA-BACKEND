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
        Schema::create('estudantes', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->foreignId("curso_id")->constrained("cursos")->onDelete("cascade");
            $table->foreignId("bimestre_id")->constrained("bimestres")->onDelete("cascade");
            $table->foreignId("escola_id")->constrained("escolas")->onDelete("cascade");
            $table->decimal("renda_familiar", 10, 2)->nullable();
            $table->boolean("bolsa")->nullable();
            $table->decimal("distancia", 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudantes');
    }
};
