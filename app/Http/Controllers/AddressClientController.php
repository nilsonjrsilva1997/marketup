<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AddressClient;

class AddressClientController extends Controller
{
    public function index()
    {
        return AddressClient::all();
    }

    public function show($id)
    {
        $addressClient = AddressClient::findOrFail($id);
        return $addressClient;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|integer|exists:clients,id',
            'zip_code' => 'required|formato_cep',
            'road' => 'required|string|max:255',
            'number' => 'required|integer',
            'complement' => 'string|max:255',
            'district' => 'required|string|max:255',
        ]);

        return AddressClient::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'zip_code' => 'formato_cep',
            'road' => 'string|max:255',
            'number' => 'integer',
            'complement' => 'max:255',
            'district' => 'string|max:255',
        ]);

        $addressClient = AddressClient::findOrFail($id);
        $addressClient->fill($validatedData);
        $addressClient->save();
        return $addressClient;
    }

    public function destroy($id)
    {
        $addressClient = AddressClient::findOrFail($id);
        $addressClient->delete();
    }
}
