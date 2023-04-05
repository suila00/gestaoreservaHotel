<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilizadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilizadors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_usuario_id');
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->boolean('ativo')->default(false);
            $table->timestamp('data_criacao')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('data_ultima_atualizacao')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamps();
            $table->foreign('tipo_usuario_id')->references('id')->on('tipo_utilizadors');
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
        Schema::dropIfExists('utilizadors');
    }
}
