<?php

use Illuminate\Database\Seeder;

use App\Admin\Sucursal;


class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        $sucursal = new Sucursal;//Creamos Sucursal
        $sucursal->nombre = "Sucursal 1";
        $sucursal->domicilio = "Domiclio 1";
        $sucursal->telefono = "4991058737";
        $sucursal->save();//Guardamos Sucursal

        /*
        $sucursal = new Sucursal;//Creamos Sucursal
        $sucursal->nombre = "Sucursal 2";
        $sucursal->domicilio = "Domiclio 2";
        $sucursal->telefono = "4991058736";
        $sucursal->save();//Guardamos Sucursal */
    }
}
