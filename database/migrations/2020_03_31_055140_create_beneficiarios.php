<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('cedula');
            $table->string('telefono');
            $table->string('correo');
            // $table->boolean('farmacia')->default(false);
            // $table->boolean('centro_medico')->default(false);
            $table->integer('id_farmacia')->unsigned();    
            $table->integer('id_centro_medico')->unsigned();    
            $table->string('fecha_dialisis');
            $table->string('hora_dialisis');
            $table->string('fecha_retiro');
            $table->boolean('habilitado')->default(false);
            $table->timestamps();
            $table->softDeletes();
            // Relaciones
            $table->foreign('id_farmacia')->references('id')->on('farmacias');
            $table->foreign('id_centro_medico')->references('id')->on('centro_medico');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiarios');
    }
}
