<?php

use Illuminate\Database\Seeder;
use App\Admin\FormaDePago;


class FormaPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $forma_de_pago = new FormaDePago;//Creamos forma de pago
        $forma_de_pago->nombre = "Tarjeta";
        $forma_de_pago->save();//Guardamos Forma de Pago
 
  
        $forma_de_pago = new FormaDePago;//Creamos Forma de Pago
        $forma_de_pago->nombre = "Efectivo";
        $forma_de_pago->save();//Guardamos Forma de pago


        $forma_de_pago = new FormaDePago;//Creamos Forma de Pago
        $forma_de_pago->nombre = "Transferencia";
        $forma_de_pago->save();//Guardamos Forma de pago
    }
}
