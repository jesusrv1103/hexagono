<?php

namespace App\Admin;
use App\Admin\Producto;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categorias";


    protected $fillable = ['nombre', 'descripcion'];


    public function productos()
    {
        return $this->hasMany(Producto::class,'categoria_id');
    }


  

}
