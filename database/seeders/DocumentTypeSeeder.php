<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DocumentType;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'CNAE', 
            'Inscrição Estadual', 
            'Inscrição Estadual ST', 
            'Inscrição Municipal', 
            'Suframa'
        ];

        foreach($data as $item) {
            DocumentType::create([
                'name' => $item
            ]);
        }
    }
}
