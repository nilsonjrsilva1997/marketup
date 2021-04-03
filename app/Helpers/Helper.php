<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Helper
{
    public static function uploadImage($request, $field)
    {
        $fileNameToStore = '';

        if ($request->hasFile($field)) {
            $filenameWithExt = $request->file($field)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file($field)->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file($field)->storeAs('public/images', $fileNameToStore);

            return ['status' => true, 'file_name_to_storage' => $fileNameToStore];
        } else {
            return ['status' => false];
        }
    }

    public static function deleteImageStorage($imageName)
    {
        unlink(storage_path('app/public/images/' . $imageName));
    }

    public static function saveUnitsDefault($userId)
    {
        DB::table('unities')->insert([
            'name' => 'Caixa',
            'abbreviation' => 'Caixa',
            'user_id' => $userId,
        ]);

        DB::table('unities')->insert([
            'name' => 'Fardo',
            'abbreviation' => 'Fardo',
            'user_id' => $userId,
        ]);

        DB::table('unities')->insert([
            'name' => 'Hora/Funcionário',
            'abbreviation' => 'Hora/Funcionário',
            'user_id' => $userId,
        ]);

        DB::table('unities')->insert([
            'name' => 'Quilograma',
            'abbreviation' => 'Quilograma',
            'user_id' => $userId,
        ]);

        DB::table('unities')->insert([
            'name' => 'Unidade',
            'abbreviation' => 'Unidade',
            'user_id' => $userId,
        ]);
    }

    public static function saveSizesDefault($userId)
    {
        DB::table('sizes')->insert([
            'name' => 'PP',
            'user_id' => $userId,
        ]);

        DB::table('sizes')->insert([
            'name' => 'P',
            'user_id' => $userId,
        ]);

        DB::table('sizes')->insert([
            'name' => 'M',
            'user_id' => $userId,
        ]);

        DB::table('sizes')->insert([
            'name' => 'GG',
            'user_id' => $userId,
        ]);

        for ($i = 25; $i < 55; $i++) {
            DB::table('sizes')->insert([
                'name' => $i,
                'user_id' => $userId,
            ]);
        }
    }

    public static function saveColorDefault($userId)
    {
        DB::table('colors')->insert([
            'name' => 'PADRÃO',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'AMARELO',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'AMARELO / BRANCO',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'AZUL',
            'user_id' => $userId,
        ]);
        DB::table('colors')->insert([
            'name' => 'AZUL / BRANCO',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'BEGE',
            'user_id' => $userId,
        ]);
        DB::table('colors')->insert([
            'name' => 'BEGE / BRANCO',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'BRANCO',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'CINZA',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'CINZA / BRANCO',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'LARANJA',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'LARANJA / BRANCO',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'MARROM',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'MARROM / BRANCO',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'ROSA',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'ROSA / BRANCO',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'ROXO / BRANCO',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'VERDE',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'VERDE / BRANCO',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'VERMELHO',
            'user_id' => $userId,
        ]);

        DB::table('colors')->insert([
            'name' => 'VERMELHO / BRANCO',
            'user_id' => $userId,
        ]);
    }
}
