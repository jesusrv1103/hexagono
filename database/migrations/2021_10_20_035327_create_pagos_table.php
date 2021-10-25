<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {

            $table->id();
            $table->BigInteger('venta_id')->unsigned();
            $table->foreign('venta_id')->references('id')->on('ventas');

            $table->BigInteger('forma_pago_id')->unsigned();
            $table->foreign('forma_pago_id')->references('id')->on('forma_de_pagos');
            $table->date('fecha_pago')->nullable($value=true);
            $table->double('monto_pago', 8, 2);

            $table->boolean('estado')->default(1);
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
        Schema::dropIfExists('pagos');
    }
}
