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
        $this->call(IdiomasSeeder::class);
        $this->call(PaisesSeeder::class);
        $this->call(MoedasSeeder::class);
    }
}
