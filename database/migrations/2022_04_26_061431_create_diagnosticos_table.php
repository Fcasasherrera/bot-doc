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
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('idCita')->unsigned();
            $table->bigInteger('idEnfermedad')->unsigned();
            $table->bigInteger('idPruebaLab')->unsigned();
            $table->bigInteger('idPruebaMor')->unsigned();            
            $table->bigInteger('idTratamiento')->unsigned();
            $table->string('detalles');
            $table->timestamps();

            $table->foreign('idCita')->references('id')->on('citas')->onDelete("cascade")->onUpdate('cascade');
            $table->foreign('idEnfermedad')->references('id')->on('enfermedads')->onDelete("cascade")->onUpdate('cascade');
            $table->foreign('idPruebaLab')->references('id')->on('prueba_labs')->onDelete("cascade")->onUpdate('cascade');
            $table->foreign('idPruebaMor')->references('id')->on('prueba_mortems')->onDelete("cascade")->onUpdate('cascade');
            $table->foreign('idTratamiento')->references('id')->on('tratamientos')->onDelete("cascade")->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnosticos');
    }
};
