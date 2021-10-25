<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->BigInteger('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->dateTime('fecha_recibido')->nullable($value=true);
            $table->dateTime('fecha_entrega')->nullable($value=true);

           // $table->BigInteger('estatus_id')->unsigned();
          //  $table->foreign('estatus_id')->references('id')->on('estatus');

         
            $table->string('comentarios')->nullable($value=true);;

            $table->double('total', 8, 2);
            $table->boolean('pagado')->default(0);
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
        Schema::dropIfExists('ventas');
    }
}
