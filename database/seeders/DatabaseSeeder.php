<?php

namespace Database\Seeders;

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
        $this->call([
            IdiomaSeeder::class,
            MoedaSeeder::class,
            PaisSeeder::class,

            IdiomaPaisSeeder::class,
            MoedaPaisSeeder::class,
        ]);
    }
}
