<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ItemTypeSeeder;

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
    }
}
