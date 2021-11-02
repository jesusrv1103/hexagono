<?php

namespace App\Admin;

use App\Admin\FormaDePago;


use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = "pagos";

    protected $fillable = ['venta_id', 'tipo_pago', 'monto_pago'];


   
    public function forma_pago()
	{
    	return $this->belongsTo(FormaDePago::class, 'forma_pago_id'); //Se relacionan los modelos implicitos en la tabla del modelo actual
    }
}