<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;
use App\Admin\Cliente;
use App\Admin\FormaDePago;

use App\Admin\DetalleVenta;

use App\Admin\Pago;

class Venta extends Model
{
    protected $table= "ventas";
    protected $dates = ['fecha_recibido','fecha_entrega'];


    public function user()
	{
    	return $this->belongsTo(User::class, 'user_id'); //Se relacionan los modelos implicitos en la tabla del modelo actual
    }

    public function cliente()
	{
    	return $this->belongsTo(Cliente::class, 'cliente_id'); //Se relacionan los modelos implicitos en la tabla del modelo actual
    }




    public function pagos()
	{
    	return $this->hasMany(Pago::class, 'venta_id'); //Se relacionan los modelos implicitos en la tabla del modelo actual
    }



    public function detalle_venta()
	{
    	return $this->hasMany(DetalleVenta::class, 'venta_id'); //Se relacionan los modelos implicitos en la tabla del modelo actual
    }

    

  
}
