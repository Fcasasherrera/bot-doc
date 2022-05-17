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
        Schema::create('citas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->bigInteger('idHistorial')->unsigned();
            $table->bigInteger('idSigno')->unsigned();
            $table->bigInteger('idSintoma')->unsigned();
            $table->date('fechaCita');
            $table->string('detalles');
            $table->timestamps();

            $table->foreign('idHistorial')->references('id')->on('historial_clins')->onDelete("cascade")->onUpdate('cascade');
            $table->foreign('idSigno')->references('id')->on('signos')->onDelete("cascade")->onUpdate('cascade');
            $table->foreign('idSintoma')->references('id')->on('sintomas')->onDelete("cascade")->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
};
