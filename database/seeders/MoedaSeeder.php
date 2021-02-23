<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoedaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moedas = [
            [
                'id' => 1,
                'nome' => 'Dólar Comercial',
                'codigo' => 'USD',
            ],
            [
                'id' => 2,
                'nome' => 'Euro',
                'codigo' => 'EUR',
            ],
            [
                'id' => 3,
                'nome' => 'Libra Esterlina',
                'codigo' => 'GBP',
            ],
            [
                'id' => 4,
                'nome' => 'Bitcoin',
                'codigo' => 'BTC',
            ],
            [
                'id' => 5,
                'nome' => 'Iene Japonês',
                'codigo' => 'JPY',
            ],
        ];

        DB::table('moedas')->insert($moedas);
    }
}
