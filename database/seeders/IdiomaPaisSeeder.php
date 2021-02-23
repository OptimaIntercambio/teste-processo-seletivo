<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdiomaPaisSeeder extends Seeder
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
                'idioma_id' => 2,
                'pais_id' => 1,
            ],
        ];

        DB::table('idioma_pais')->insert($relacoes);
    }
}
