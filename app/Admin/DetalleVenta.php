<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Venta;
use App\Admin\Producto;

class DetalleVenta extends Model
{
    protected $table="detalle_ventas";


    public function venta()
	{
    	return $this->belongsTo(Venta::class, 'venta_id'); //Se relacionan los modelos implicitos en la tabla del modelo actual
    }


    public function producto()
	{
    	return $this->belongsTo(Producto::class, 'producto_id'); //Se relacionan los modelos implicitos en la tabla del modelo actual
    }


}
