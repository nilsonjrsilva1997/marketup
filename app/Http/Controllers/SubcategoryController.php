<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories =  Subcategory::all();
        return $subcategories;
    }

    public function create(Request $request)
    {
        $userId = Auth::id();
        $request['user_id'] = $userId;

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'abbreviation' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        return Unity::create($validatedData);
    }

    public function show($id)
    {
        $unity =  Unity::find($id);

        if (!empty($unity)) {
            $userId = Auth::id();

            if ($unity->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para acessar esses dados'], 401);
            }

            return $unity;
        } else {
            return response(['message' => 'Unidade não encontrada'], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'abbreviation' => 'string|max:255',
        ]);

        $unity = Unity::find($id);

        if (!empty($unity)) {
            $userId = Auth::id();

            if ($unity->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para alterar esses dados'], 401);
            }

            $unity->fill($validatedData);
            $unity->save();
            return $unity;
        } else {
            return response(['message' => 'Unidade não encontrada'], 422);
        }
    }

    public function destroy($id)
    {
        $unity = Unity::find($id);

        if (!empty($unity)) {
            $userId = Auth::id();
            
            if ($unity->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para deletar esses dados'], 401);
            }

            if ($unity->delete()) {
                return response(['message' => 'Unidade excluida com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Unidade não encontrada'], 422);
        }
    }
}
