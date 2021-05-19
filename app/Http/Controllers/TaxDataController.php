<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TaxData;

class TaxDataController extends Controller
{
    public function index()
    {
        return TaxData::all();
    }

    public function show($id)
    {
        $taxData = TaxData::findOrFail($id);
        return $taxData;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'email_nfe' => 'required|string|email',
            'iss_withholding_tax' => 'required|boolean',
            'final_costumer' => 'required|boolean',
            'rural_producer' => 'required|boolean',
            'client_id' => 'required|integer|exists:clients,id',
        ]);

        return TaxData::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'email_nfe' => 'string|email',
            'iss_withholding_tax' => 'boolean',
            'final_costumer' => 'boolean',
            'rural_producer' => 'boolean',
        ]);

        $taxData = TaxData::findOrFail($id);
        $taxData->fill($validatedData);
        $taxData->save();
        return $taxData;
    }

    public function destroy($id)
    {
        $taxData = TaxData::findOrFail($id);
        $taxData->delete();
    }
}
