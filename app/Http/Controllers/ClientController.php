<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        return Client::all();
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return $client;
    }

    public function create(Request $request)
    {
        $rules = [
            'cpf_cnpj' => 'required|cpf_ou_cnpj|formato_cpf_ou_cnpj|unique:clients,cpf_cnpj',
        ];
        
        $request->validate($rules);
        
        if(strlen($request->cpf_cnpj) == 14) {
            $request['type'] = 'physical_person';
        } else {
            $request['type'] = 'legal_person';
        }

        $rules = array_merge($rules, ['type' => 'in:physical_person,legal_person']);

        switch($request['type']) {
            case 'physical_person':
                $rules = array_merge($rules, ['surname' => 'string|max:255']);
                $rules = array_merge($rules, ['rg_emitter' => 'string|max:255']);
                $rules = array_merge($rules, ['rg_uf' => 'string|max:255']);
                $rules = array_merge($rules, ['gender' => 'in:male,female']);
                $rules = array_merge($rules, ['birthday' => 'date']);
            break;

            case 'legal_person':               
                $rules = array_merge($rules, ['company_name' => 'string|max:255']);
                $rules = array_merge($rules, ['fantasy_name' => 'string|max:255']);
                $rules = array_merge($rules, ['state_registration' => 'string|max:255']);
                $rules = array_merge($rules, ['municipal_registration' => 'string|max:255']);
                $rules = array_merge($rules, ['destination_IE_tax_id' => 'integer|exists:destination_icome_taxes,id']);                
            break;

            default:

            break;
        }     

        $rules = array_merge($rules, [
            'name' => 'required|string|max:255',
            'rg_ie' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|telefone_com_ddd',
            'cellphone' => 'celular_com_ddd',
            'site' => 'url',
            'observation' => 'string|max:255',
            'credit_limit' => 'numeric'
        ]);

        $validatedData = $request->validate($rules);

        return Client::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cpf_cnpj' => 'cpf_ou_cnpj|formato_cpf_ou_cnpj|unique:clients,cpf_cnpj',
            'surname' => 'string|max:255',
            'rg_emitter' => 'string|max:255',
            'rg_uf' => 'string|max:255',
            'gender' => 'in:male,female',
            'birthday' => 'date',
            'name' => 'string|max:255',
            'rg_ie' => 'string|max:255',
            'email' => 'email',
            'phone' => 'telefone_com_ddd',
            'cellphone' => 'celular_com_ddd',
            'site' => 'url',
            'observation' => 'string|max:255',
            'credit_limit' => 'numeric',
            'type' => 'in:physical_person,legal_person',
            'company_name' => 'string|max:255',
            'fantasy_name' => 'string|max:255',
            'state_registration' => 'string|max:255',
            'municipal_registration' => 'string|max:255',
            'destination_IE_tax_id' => 'integer|exists:destination_icome_taxes,id'
        ]);

        $client = Client::findOrFail($id);
        $client->fill($validatedData);
        $client->save();
        return $client;
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
    }
}
