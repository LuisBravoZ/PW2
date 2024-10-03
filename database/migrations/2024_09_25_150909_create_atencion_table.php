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
        Schema::create('atencion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('turno_id')->constrained('turno')->onDelete('cascade');
            $table->float('altura');
            $table->float('peso');
            $table->float('cintura');
            $table->float('cadena');
            $table->float('circunferencia_muneca');
            $table->float('circunferencia_cuello');
            $table->float('actividad_fisica');
            $table->float('imc');
            $table->float('tmb');
            $table->float('cintura_talla');
            $table->float('cintura_cadera');
            $table->float('porcetaje_grasa');            
            $table->float('complexion_hueso');   
            $table->string('observacion');         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atencion');
    }
};
