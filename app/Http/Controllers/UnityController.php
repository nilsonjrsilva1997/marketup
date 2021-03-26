<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unity;
use Auth;

class UnityController extends Controller
{
    public function index()
    {
        $unity =  Unity::all();
        return $unity;
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
        return $unity;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'abbreviation' => 'string|max:255',
        ]);

        $unity = Unity::find($id);

        if (!empty($unity)) {
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
            if ($unity->delete()) {
                return response(['message' => 'Unidade excluida com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Unidade não encontrada'], 422);
        }
    }
}
