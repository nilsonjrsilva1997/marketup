<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    public function index()
    {
        return Bank::all();
    }

    public function show($id)
    {
        $bank = Bank::findOrFail($id);
        return $bank;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return Bank::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $bank = Bank::findOrFail($id);
        $bank->fill($validatedData);
        $bank->save();
        return $bank;
    }

    public function destroy($id)
    {
        $bank = Bank::findOrFail($id);
        $bank->delete();
    }
}
