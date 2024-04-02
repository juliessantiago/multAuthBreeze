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
        Schema::create('voluntario_horarios', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignId('voluntario_id')
            ->references('id')->on('voluntarios')
            ->cascadeOnDelete(); 
            $table->foreignId('horario_id')
            ->references('id')->on('horarios_livres')//ATENÇÃO NOME TABELA 
            ->cascadeOnDelete(); 
            $table->primary(['voluntario_id', 'horario_id']); //as duas serão chave primária

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voluntario_horarios');
    }
};
