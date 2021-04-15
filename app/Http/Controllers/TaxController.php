<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;

class TaxController extends Controller
{
    public function index()
    {
        $taxes =  Tax::all();
        return $taxes;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'ncm' => 'required|string|max:255',
            'cest' => 'required|string|max:255',
            'tax_type_id' => 'required|integer|exists:tax_types,id',
            'origin_id' => 'required|integer|exists:origins,id',
        ]);

        return Tax::create($validatedData);
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
