<?php

use Illuminate\Database\Seeder;
use App\Admin\Cliente;
class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cliente = new Cliente;//Creamos cliente
        $cliente->nombre = "Jesus Ramirez Vargas";

        $cliente->rfc = "RAVJ931103F44";
        $cliente->correo = "jesus21c.jrv@gmail.com";

        $cliente->telefono = "4991058737";
        $cliente->descuento =12;
    
        $cliente->save();//Guardamos cliente


        $cliente = new Cliente;//Creamos cliente
        $cliente->nombre = "Juan Ramos";

        $cliente->rfc = "RAVJ931103F33";
        $cliente->correo = "juan@gmail.com";

        $cliente->telefono = "4921345678";
        $cliente->descuento =11;
    
        $cliente->save();//Guardamos cliente
    }
}
