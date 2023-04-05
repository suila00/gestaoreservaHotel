<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoQuartosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_quartos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->integer('capacidade');
            $table->string('foto')->nullable();
            $table->text('facilidades')->nullable();
            $table->timestamps();
            $table->foreign('hotel_id')->references('id')->on('hotels');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_quartos');
    }
}
