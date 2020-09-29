<?php

use Illuminate\Database\Seeder;
use App\Models\Idiomas;

class IdiomasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Idiomas $idioma)
    {
        
        $idioma->create([
            'name' => 'Português (Brasil)',
            'sigla' => 'pt-br',
        ]);
        
        $idioma->create([
            'name' => 'Português (Portugal)',
            'sigla' => 'pt',
        ]);
        
        $idioma->create([
            'name' => 'Inglês',
            'sigla' => 'en',
        ]);
    }
}
