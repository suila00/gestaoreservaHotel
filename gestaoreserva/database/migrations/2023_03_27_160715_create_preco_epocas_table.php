<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrecoEpocasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preco_epocas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_quarto_id');
            $table->unsignedBigInteger('epoca_id');
            $table->decimal('preco', 10, 2);
            $table->timestamps();
            $table->foreign('tipo_quarto_id')->references('id')->on('tipo_quartos');
            $table->foreign('epoca_id')->references('id')->on('epocas');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preco_epocas');
    }
}
