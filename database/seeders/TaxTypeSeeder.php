<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Ativo Imobilizado',
            'Embalagem',
            'Material de Uso e Consumo',
            'Matéria-Prima',
            'Mercadoria para revenda',
            'Outras',
            'Outros insumos',
            'Produto Acabado',
            'Produto em Processo',
            'Produto Intermediário',
            'Serviços',
            'Subproduto',
        ];

        foreach ($data as $taxType) {
            DB::table('tax_types')->insert([
                'name' => $taxType,
            ]);
        }
    }
}
