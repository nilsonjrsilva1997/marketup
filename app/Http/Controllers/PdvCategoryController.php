<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\PdvCategory;

class PdvCategoryController extends Controller
{
    public function index()
    {
        $pdvCategories =  PdvCategory::all();
        return $pdvCategories;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $userId = Auth::id();

        $validatedData['user_id'] = $userId;

        return PdvCategory::create($validatedData);
    }

    public function show($id)
    {
        $pdvCategory =  PdvCategory::findOrFail($id);

        return $pdvCategory;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $pdvCategory = PdvCategory::findOrFail($id);

        $pdvCategory->fill($validatedData);
        $pdvCategory->save();
        return $pdvCategory;
    }

    public function destroy($id)
    {
        $pdvCategory = PdvCategory::findOrFail($id);

        if ($pdvCategory->delete()) {
            return response(['message' => 'Categoria excluida com sucesso'], 200);
        }
    }
}
