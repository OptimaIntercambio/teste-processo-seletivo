<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoedaPaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relacoes = [
            [
                'id' => 1,
                'moeda_id' => 1,
                'pais_id' => 1,
            ],
        ];

        DB::table('moeda_pais')->insert($relacoes);
    }
}
