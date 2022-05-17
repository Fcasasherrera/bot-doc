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
        Schema::create('sig_enfs', function (Blueprint $table) {
            $table->engie="InnoDB";
            $table->id();
            $table->bigInteger('idSigno')->unsigned();
            $table->bigInteger('idEnfermedad')->unsigned();
            $table->timestamps();

            $table->foreign('idSigno')->references('id')->on('signos')->onDelete("cascade")->onUpdate('cascade');
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
        Schema::dropIfExists('sig_enfs');
    }
};
