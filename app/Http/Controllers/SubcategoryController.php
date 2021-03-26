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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        return Subcategory::create($validatedData);
    }

    public function show($id)
    {
        $subcategory =  Subcategory::find($id);

        if (!empty($subcategory)) {
            return $subcategory;
        } else {
            return response(['message' => 'Subcategoria não encontrada'], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'category_id' => 'integer|exists:categories,id',
        ]);

        $subcategory = Subcategory::find($id);

        if (!empty($subcategory)) {
            $subcategory->fill($validatedData);
            $subcategory->save();
            return $subcategory;
        } else {
            return response(['message' => 'Subcategoria não encontrada'], 422);
        }
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);

        if (!empty($subcategory)) {
            if ($subcategory->delete()) {
                return response(['message' => 'Subcategoria excluida com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Subcategoria não encontrada'], 422);
        }
    }
}
