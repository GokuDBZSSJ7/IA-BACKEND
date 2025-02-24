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
        Schema::create('bimestres', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->integer("ano");
            $table->date("inicio");
            $table->foreignId("curso_id")->constrained("cursos")->onDelete("cascade");
            $table->date("fim");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimestres');
    }
};
