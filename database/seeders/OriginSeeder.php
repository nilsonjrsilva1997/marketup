<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Nacional, exceto as indicadas nos códigos 3 a 5', 'index' => 0],
            ['name' => 'Estrangeira – Importação direta, exceto a indicada no código 6', 'index' => 1],
            ['name' => 'Estrangeira – Adquirida no mercado interno, exceto a indicada no código 7', 'index' => 2],
            ['name' => 'Nacional, mercadoria ou bem com conteúdo de importação superior a 40%', 'index' => 3],
            ['name' => 'Nacional, cuja produção tenha sido feita em conformidade com os processos produtivos básicos', 'index' => 4],
            ['name' => 'Nacional, mercadoria ou bem com Conteúdo de Importação inferior ou igual a 40%', 'index' => 5],
            ['name' => 'Estrangeira - Importação direta, sem similar nacional, constante em lista de Resolução CAMEX', 'index' => 6],
            ['name' => 'Estrangeira - Adquirida no mercado interno, sem similar nacional, constante em lista de Resolução CAMEX', 'index' => 7],
            ['name' => 'Nacional, Conteúdo de Importação superior a 70%', 'index' => 8],
        ];

        foreach ($data as $origin) {
            DB::table('origins')->insert([
                'name' => $origin['name'],
                'index' => $origin['index']
            ]);
        }
    }
}
