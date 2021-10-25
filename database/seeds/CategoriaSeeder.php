<?php

use Illuminate\Database\Seeder;

use App\Admin\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = new Categoria;//Creamos Categoria
        $categoria->nombre = "Categoria 1";
        $categoria->descripcion = "Descripcion 1";
        $categoria->save();//Guardamos Categoria

     
        $categoria->save();//Guardamos Categoria
        $categoria = new Categoria;//Creamos Categoria
        $categoria->nombre = "Categoria 2";
        $categoria->descripcion = "Descripcion 2";
     
        $categoria->save();//Guardamos Categoria
    }
}
