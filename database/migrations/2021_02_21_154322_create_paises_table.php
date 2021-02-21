<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paises', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->text('resumo')->nullable();
            $table->text('descricao')->nullable();

            $table->string('bandeira')->nullable();
            $table->string('imagem')->nullable();
            $table->bigInteger('populacao')->nullable();
            $table->float('pib')->nullable();
            $table->float('idh')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paises');
    }
}
