<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaxType;

class TaxTypeController extends Controller
{
    public function index()
    {
        $subcategories =  TaxType::all();
        return $subcategories;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return TaxType::create($validatedData);
    }

    public function show($id)
    {
        $taxType =  TaxType::findOrFail($id);
        return $taxType;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $taxType = TaxType::findOrFail($id);
        $taxType->fill($validatedData);
        $taxType->save();
        return $taxType;
    }

    public function destroy($id)
    {
        $taxType = TaxType::findOrFail($id);

        if ($taxType->delete()) {
            return response(['message' => 'Tributo excluida com sucesso'], 200);
        }
    }
}
