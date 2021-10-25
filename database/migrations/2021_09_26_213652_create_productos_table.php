<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->string('100')->nullable($value=false);
            $table->string('nombre')->string('100')->nullable($value=false);
            $table->string('imagen')->string('230')->nullable($value=true);
            $table->string('medida')->string('100')->nullable($value=true);
            $table->enum('tipo_producto', ['pieza', 'area']);

            $table->BigInteger('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');

            $table->string('material')->string('200')->nullable($value=true);


            $table->double('precio_compra', 8, 2);
            $table->double('precio_venta', 8, 2);

     
            $table->text('descripcion')->nullable($value=false);
           
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
        Schema::dropIfExists('productos');
    }
}
