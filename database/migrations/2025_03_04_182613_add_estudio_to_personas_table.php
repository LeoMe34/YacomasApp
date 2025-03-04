<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->enum('tipoAsist', ['Estudiante', 'Docente', 'Academico', 'Publico general'])->default('Publico general');
            $table->enum('estudio', ['Ninguno', 'Tecnico', 'Licenciatura', 'Maestria', 'Doctorado', 'Otro'])->default('Ninguno');


            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personas', function (Blueprint $table) {
            //
        });
    }
};
