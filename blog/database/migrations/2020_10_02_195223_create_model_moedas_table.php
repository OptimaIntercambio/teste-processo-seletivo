<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelMoedasTable extends Migration
{
    public function up()
    {
        Schema::create('moedas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pais')->unsigned();
            $table->foreign('id_pais')->references('id')->on('model_paises')->onDelete('cascade')->onUpdate('cascade'); //chave estrangeira
            $table->double('valor', 10,2);
            
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('moedas');
    }
}
