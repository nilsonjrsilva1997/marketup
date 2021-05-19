<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BankData;

class BankDataController extends Controller
{
    public function index()
    {
        return BankData::all();
    }

    public function show($id)
    {
        $bankData = BankData::findOrFail($id);
        return $bankData;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'bank_id' => 'required|integer|exists:banks,id',
            'agency' => 'required|string|max:255',
            'agency_digit' => 'required|string|max:255',
            'account' => 'required|string|max:255',
            'account_digit' => 'required|string|max:255',
        ]);

        return BankData::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'bank_id' => 'integer|exists:banks,id',
            'agency' => 'string|max:255',
            'agency_digit' => 'string|max:255',
            'account' => 'string|max:255',
            'account_digit' => 'string|max:255',
        ]);

        $bankData = BankData::findOrFail($id);
        $bankData->fill($validatedData);
        $bankData->save();
        return $bankData;
    }

    public function destroy($id)
    {
        $bankData = BankData::findOrFail($id);
        $bankData->delete();
    }
}
