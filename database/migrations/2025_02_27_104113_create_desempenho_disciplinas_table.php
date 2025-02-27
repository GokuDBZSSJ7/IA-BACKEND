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
        Schema::create('desempenho_disciplinas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("estudante_id")->constrained("estudantes")->onDelete("cascade");
            $table->foreignId("disciplina_id")->constrained("disciplinas")->onDelete("cascade");
            $table->foreignId("bimestre_id")->constrained("bimestres")->onDelete("cascade");
            $table->foreignId("turma_id")->constrained("turmas")->onDelete("cascade");
            $table->decimal("nota", 4, 2)->nullable();
            $table->decimal("frequencia", 5, 2);
            $table->integer("faltas")->default(0);
            $table->integer("faltas_consecutivas")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desempenho_disciplinas');
    }
};
