<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Admin\Rol;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;//Creamos user
        $user->name = "Administrador";
        $user->email = "admin@hexagonoprint.com.mx";
        $user->password = Hash::make("Hexagono.2021");
        $user->sucursal_id = 1;
        $user->save();//Guardamos user

        $user->roles()->attach(Rol::where('id', 1)->first());







    }
}
