<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unities')->insert([
            'name' => 'Caixa',
            'abbreviation' => 'Caixa',
        ]);

        DB::table('unities')->insert([
            'name' => 'Fardo',
            'abbreviation' => 'Fardo',
        ]);

        DB::table('unities')->insert([
            'name' => 'Hora/Funcionario',
            'abbreviation' => 'Hora/Funcionario',
        ]);

        DB::table('unities')->insert([
            'name' => 'Quilograma',
            'abbreviation' => 'Quilograma',
        ]);

        DB::table('unities')->insert([
            'name' => 'Unidade',
            'abbreviation' => 'Unidade',
        ]);
    }
}
