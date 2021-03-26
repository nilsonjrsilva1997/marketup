<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyAddress;

class CompanyAddressController extends Controller
{
    public function index()
    {
        $companyAddress =  CompanyAddress::all();
        return $companyAddress;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'zip_code' => 'required|formato_cep',
            'road' => 'required|string|max:255',
            'number' => 'required|integer',
            'complement' => 'required|string|max:255',
            'district' => 'required|string|max:255',
        ]);

        return CompanyAddress::create($validatedData);
    }

    public function show($id)
    {
        $companyAddress =  CompanyAddress::find($id);

        if (!empty($companyAddress)) {
            return $companyAddress;
        } else {
            return response(['message' => 'Endereço da empresa não encontrado'], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'zip_code' => 'cep',
            'road' => 'string|max:255',
            'number' => 'integer',
            'complement' => 'string|max:255',
            'district' => 'string|max:255',
        ]);

        $companyAddress = CompanyAddress::find($id);

        if (!empty($companyAddress)) {
            $companyAddress->fill($validatedData);
            $companyAddress->save();
            return $companyAddress;
        } else {
            return response(['message' => 'Endereço da empresa não encontrada'], 422);
        }
    }

    public function destroy($id)
    {
        $companyAddress = CompanyAddress::find($id);

        if (!empty($companyAddress)) {
            if ($companyAddress->delete()) {
                return response(['message' => 'Endereço da empresa excluida com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Endereço da empresa não encontrada'], 422);
        }
    }
}
