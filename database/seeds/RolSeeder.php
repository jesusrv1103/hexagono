<?php

use Illuminate\Database\Seeder;
use App\Admin\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $rol = new Rol;//Creamos Rol
        $rol->name = "admin";
        $rol->description = "COntrol Total sobre el sistema";
        $rol->save();//Guardamos Rol


       
        $rol = new Rol;//Creamos Rol
        $rol->name = "vendedor";
        $rol->description = "COntrol Total sobre el sistema";
        $rol->save();//Guardamos Rol

        $rol = new Rol;//Creamos Rol
        $rol->name = "disenador";
        $rol->description = "Puede visualizar los pedidos que estan en linea";
        $rol->save();//Guardamos Rol
    }
}
