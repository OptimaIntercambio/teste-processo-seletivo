<?php

use Illuminate\Database\Seeder;
use App\Models\Paises;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Paises $pais)
    {
        $pais->create([
            'name' => 'Brasil',
            'id_idioma' => '1',
        ]);

        $pais->create([
            'name' => 'Haiti',
            'id_idioma' => '1',
        ]);
    }
}
