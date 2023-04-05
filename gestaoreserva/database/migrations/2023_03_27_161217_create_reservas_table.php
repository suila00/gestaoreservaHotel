<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('tipo_quarto_id');
            $table->date('data_checkin');
            $table->date('data_checkout');
            $table->integer('numero_hospedes');
            $table->text('observacoes')->nullable();
            $table->enum('status', ['pendente', 'confirmada', 'cancelada', 'concluida'])->default('pendente');
            $table->string('codigo_confirmacao');
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('tipo_quarto_id')->references('id')->on('tipo_quartos');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
