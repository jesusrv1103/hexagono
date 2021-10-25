<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolSeeder::class);
         $this->call(SucursalSeeder::class);
         $this->call(ClienteSeeder::class);
         $this->call(FormaPagoSeeder::class);
         $this->call(CategoriaSeeder::class);
        $this->call(ProductoSeeder::class);
         $this->call(UserSeeder::class);
    }
}
