<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCambioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cambio', function (Blueprint $table) {
            $table->id();

            $table->foreignId('moeda_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('codein');
            
            $table->float('high')->nullable();
            $table->float('low')->nullable();
            $table->float('varBid')->nullable();
            $table->float('pctChange')->nullable();
            $table->float('bid')->nullable();
            $table->float('ask')->nullable();
            
            $table->timestamp('verified_date');

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
        Schema::dropIfExists('cambio');
    }
}
