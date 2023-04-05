<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reserva_id');
            $table->string('endereco_faturamento');
            $table->string('cpf_cnpj');
            $table->date('data_emissao');
            $table->decimal('valor_total', 10, 2);
            $table->enum('status_pagamento', ['pendente', 'pago', 'cancelado'])->default('pendente');
            $table->timestamps();
            $table->foreign('reserva_id')->references('id')->on('reservas');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faturas');
    }
}
