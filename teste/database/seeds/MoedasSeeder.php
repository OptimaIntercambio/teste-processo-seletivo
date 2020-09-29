<?php

use Illuminate\Database\Seeder;
use App\Models\Moedas;

class MoedasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Moedas $moeda)
    {
        
        $moeda->create([
            'name' => 'Real',
            'sigla' => 'BRL',
            'dolar' => '0.18',
        ]);

        
        $moeda->create([
            'name' => 'Dolar',
            'sigla' => 'DOL',
            'dolar' => '1',
        ]);
    }
}
