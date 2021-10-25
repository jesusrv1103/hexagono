<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = "pagos";

    protected $fillable = ['venta_id', 'tipo_pago', 'monto_pago'];
}