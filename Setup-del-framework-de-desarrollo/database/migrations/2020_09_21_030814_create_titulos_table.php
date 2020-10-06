<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulos', function (Blueprint $table) {
            //First define all of the tables columns.
            $table->bigIncrements('titulo_id');
            $table->unsignedBigInteger('plataforma_id'); //The types must be the same; bigIncrements = unsignedBigInteger;
            $table->string('titulo_nombre');
            $table->string('titulo_edicion');
            $table->boolean('titulo_estado');
            $table->timestamps();
            //Then add the constraints, for example, foreign keys. 
            $table->foreign('plataforma_id')
                ->references('plataforma_id')
                ->on('plataformas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titulos');
    }
}
