<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationIncomeTaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
            - Contribuinte do ICMS
            - Contribuinte Isento de Inscrição
            - Não Contribuinte
        */

        DB::table('destination_income_taxes')->insert([
            'name' => 'Contribuinte do ICMS',
        ]);

        DB::table('destination_income_taxes')->insert([
            'name' => 'Contribuinte Isento de Inscrição',
        ]);

        DB::table('destination_income_taxes')->insert([
            'name' => 'Não Contribuinte',
        ]);
    }
}
