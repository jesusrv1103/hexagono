<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;
use App\Admin\Cliente;
use App\Admin\FormaDePago;

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

  
}
