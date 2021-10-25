<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table= "sucursales";

    protected $fillable = ['nombre', 'telefono', 'domicilio'];
}
