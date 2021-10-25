<?php

namespace App\Admin;
use App\Admin\Categoria;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";

    protected $fillable = ['codigo', 'nombre', 'imagen','medida','tipoProducto', 'categoria_id','material',
                            'precio_compra','precio_venta','descripcion'];


    public function categoria()
	{
    	return $this->belongsTo(Categoria::class, 'categoria_id'); //Se relacionan los modelos implicitos en la tabla del modelo actual
    }
}
