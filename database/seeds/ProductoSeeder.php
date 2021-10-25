<?php

use Illuminate\Database\Seeder;

use App\Admin\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $producto = new Producto;//Creamos producto
        $producto->codigo = "45564";
        $producto->nombre = "Producto 1";

        $producto->medida = "12x45";
        $producto->tipo_producto = "pieza";//area
        $producto->categoria_id = 1;
        $producto->material = "Vinil";
        $producto->precio_compra = 95;
        $producto->precio_venta = 123;
        $producto->descripcion = "Descripcion de producto 1";
        $producto->save();//Guardamos producto


            
        $producto = new Producto;//Creamos producto
        $producto->codigo = "7878";
        $producto->nombre = "Producto 2";

        $producto->medida = "56x45";
        $producto->tipo_producto = "area";//area
        $producto->categoria_id = 2;
        $producto->material = "MDF";
        $producto->precio_compra = 35;
        $producto->precio_venta = 50;
        $producto->descripcion = "Descripcion de producto 2";
        $producto->save();//Guardamos producto

        
    }
}
