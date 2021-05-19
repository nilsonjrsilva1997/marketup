<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ItemTypeSeeder;
use Database\Seeders\DestinationIncomeTaxSeeder;
use Database\Seeders\BankSeeder;
use Database\Seeders\DocumentTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ItemTypeSeeder::class);
        $this->call(TaxTypeSeeder::class);
        $this->call(OriginSeeder::class);
        $this->call(DestinationIncomeTaxSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(DocumentTypeSeeder::class);
    }
}
