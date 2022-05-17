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
        Schema::create('sin_enfs', function (Blueprint $table) {
            $table->engie="InnoDB";
            $table->id();
            $table->bigInteger('idSintoma')->unsigned();
            $table->bigInteger('idEnfermedad')->unsigned();
            $table->timestamps();

            $table->foreign('idSintoma')->references('id')->on('sintomas')->onDelete("cascade")->onUpdate('cascade');
            $table->foreign('idEnfermedad')->references('id')->on('enfermedads')->onDelete("cascade")->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sin_enfs');
    }
};
