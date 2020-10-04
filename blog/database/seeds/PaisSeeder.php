<?php

use Illuminate\Database\Seeder;
use App\Models\ModelPaises;
class PaisSeeder extends Seeder
{

    public function run(ModelPaises $pais)
    {
        $pais->create([
            'nomePais' => 'Hong Kong',
            'id_idioma' => '6',
        ]);
        
        $pais->create([
            'nomePais' => 'Egito',
            'id_idioma' => '9',
        ]);
        $pais->create([
            'nomePais' => 'Escocia',
            'id_idioma' => '7',
        ]);
    }
}
