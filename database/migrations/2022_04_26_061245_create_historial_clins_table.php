<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_clins', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->bigInteger('idUsuario')->unsigned();
            $table->bigInteger('idPaciente')->unsigned();
            $table->date('fechaCreacion');
            $table->timestamps();

            $table->foreign('idUsuario')->references('id')->on('usuarios')->onDelete("cascade")->onUpdate('cascade');
            $table->foreign('idPaciente')->references('id')->on('pacientes')->onDelete("cascade")->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_clins');
    }
};
