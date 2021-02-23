<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paises = [
            [
                'id' => 1,
                'nome' => 'Estados Unidos da América',
                'resumo' => 'Os Estados Unidos da América são uma república constitucional federal composta por 50 estados e um distrito federal. A maior parte do país situa-se na região central da América do Norte, formada por 48 estados e o Distrito de Colúmbia, o distrito federal da capital.',
                'descricao' => 'Os Estados Unidos da América (em inglês: United States of America; pronunciado: [juːˈnaɪ.təd ˈsteɪʦ əv əˈmɛ.ɻɪ.kə]), ou simplesmente Estados Unidos (Loudspeaker.svg? United States), são uma república constitucional federal composta por 50 estados e um distrito federal. A maior parte do país situa-se na região central da América do Norte, formada por 48 estados e o Distrito de Colúmbia, o distrito federal da capital. Banhado pelos oceanos Pacífico e Atlântico, faz fronteira com o Canadá ao norte e com o México ao sul. O estado do Alasca está no noroeste do continente, fazendo fronteira com o Canadá no leste e com a Rússia a oeste, através do estreito de Bering. O estado do Havaí é um arquipélago no Pacífico Central. O país também possui vários outros territórios no Caribe e no Oceano Pacífico. Com 9,37 milhões de km² de área e uma população de mais de 300 milhões de habitantes, o país é o quarto maior em área total, o quinto maior em área contígua e o terceiro em população. Os Estados Unidos são uma das nações mais multiculturais e etnicamente diversas do mundo, produto da forte imigração vinda de muitos países.[10] Sua geografia e sistemas climáticos também são extremamente diversificados, com desertos, planícies, florestas e montanhas que abrigam uma grande variedade de espécies. Os paleoindígenas, que migraram da Ásia há quinze mil anos, habitam o que é hoje o território dos Estados Unidos até os dias atuais. Esta população nativa foi muito reduzida após o contato com os europeus devido a doenças e guerras. Os Estados Unidos foram fundados pelas treze colônias do Império Britânico localizadas ao longo da sua costa atlântica. Em 4 de julho de 1776, foi emitida a Declaração de Independência, que proclamou o seu direito à autodeterminação e a criação de uma união cooperativa. Os estados rebeldes derrotaram a Grã-Bretanha na Guerra Revolucionária Americana, a primeira guerra colonial bem sucedida da Idade Contemporânea.[11] A Convenção de Filadélfia aprovou a atual Constituição dos Estados Unidos em 17 de setembro de 1787; sua ratificação no ano seguinte tornou os estados parte de uma única república com um forte governo central. A Carta dos Direitos, composta por dez emendas constitucionais que garantem vários direitos civis e liberdades fundamentais, foi ratificada em 1791. Guiados pela doutrina do destino manifesto, os Estados Unidos embarcaram em uma vigorosa expansão territorial pela América do Norte durante o século XIX[12] que resultou no deslocamento de tribos indígenas, aquisição de territórios e na anexação de novos Estados.[12] Os conflitos entre o sul agrário e o norte industrializado do país sobre os direitos dos estados e a expansão da instituição da escravatura provocaram a Guerra de Secessão, que decorreu entre 1861 e 1865. A vitória do Norte impediu a separação do país e levou ao fim da escravatura nos Estados Unidos. No final do século XIX, sua economia tornou-se a maior do mundo e o país expandiu-se para o Pacífico.[13] A Guerra Hispano-Americana e a Primeira Guerra Mundial confirmaram o estatuto do país como uma potência militar. A nação emergiu da Segunda Guerra Mundial como o primeiro país com armas nucleares e como membro permanente do Conselho de Segurança das Nações Unidas. O fim da Guerra Fria e a dissolução da União Soviética deixaram-no como a única superpotência restante.',
                'bandeira' => 'paises/bandeira-estados-unidos1614039270.jpg',
                'imagem' => 'paises/topo-sao-francisco-estados-unidos1614039359.jpg',
                'populacao' => 325719178,
                'pib' => 19.390,
                'idh' => 0.920,
            ],
        ];

        DB::table('paises')->insert($paises);
    }
}
