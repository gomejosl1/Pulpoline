<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesFarmaciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes_farmacias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parteuno');
            $table->string('partedos');
            $table->string('partetres');
            $table->timestamps();
            $table->softDeletes();    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensajes_farmacias');
    }
}
