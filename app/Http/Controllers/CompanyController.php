<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companies =  Company::all();
        return $companies;
    }

    public function create(Request $request)
    {
        $userId = Auth::id();
        $request['user_id'] = $userId;

        $validatedData = $request->validate([
            'cnpj' => 'required|formato_cnpj|cnpj|unique:companies,cnpj',
            'telephone' => 'required|telefone_com_ddd',
            'company_address_id' => 'required|integer|exists:company_addresses,id',
            'user_id' => 'required|integer|exists:users,id',
            'segment_id' => 'required|integer|exists:segments,id'
        ]);

        return Company::create($validatedData);
    }

    public function show($id)
    {
        $company =  Company::find($id);

        if (!empty($company)) {
            $userId = Auth::id();

            if ($company->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para acessar esses dados'], 401);
            }

            return $itemType;
        } else {
            return response(['message' => 'Empresa não encontrado'], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cnpj' => 'formato_cnpj',
            'telephone' => 'telefone_com_ddd',
            'company_address_id' => 'integer|exists:company_addresses,id',
            'user_id' => 'integer|exists:users,id',
            'segment_id' => 'integer|exists:segments,id'
        ]);

        $company = Company::find($id);

        if (!empty($company)) {
            $company->fill($validatedData);
            $company->save();
            return $company;
        } else {
            return response(['message' => 'Empresa não encontrada'], 422);
        }
    }

    public function destroy($id)
    {
        $company = Company::find($id);

        if (!empty($company)) {
            if ($company->delete()) {
                return response(['message' => 'Empresa excluida com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Empresa não encontrada'], 422);
        }
    }
}
