<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelPaisesTable extends Migration
{
    public function up()
    {
        Schema::create('model_paises', function (Blueprint $table) { //model_paises: tabela 'paises'
            $table->increments('id');
            $table->integer('id_idioma')->unsigned();
            $table->foreign('id_idioma')->references('id')->on('idiomas')->onDelete('cascade')->onUpdate('cascade'); //chave estrangeira
            $table->string('nomePais');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('model_paises');
    }
}
