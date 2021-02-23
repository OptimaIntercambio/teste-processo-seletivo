<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdiomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idiomas = [
            [
                'id' => 1,
                'nome' => 'Português',
                'num_falantes' => 273000000,
            ],
            [
                'id' => 2,
                'nome' => 'Inglês',
                'num_falantes' => 500000000,
            ],
            [
                'id' => 3,
                'nome' => 'Espanhol',
                'num_falantes' => 406000000,
            ],
            [
                'id' => 4,
                'nome' => 'Russo',
                'num_falantes' => 258000000,
            ],
        ];

        DB::table('idiomas')->insert($idiomas);
    }
}
