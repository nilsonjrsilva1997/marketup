<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\Helper;
use Database\Seeders\SizeSeeder;
use Illuminate\Support\Facades\Artisan;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'domain' => 'required|string|max:255|unique:users,domain',
            'terms_use' => 'required|boolean',
        ]);

        $validatedData['password'] = bcrypt($request->password);
        $user = User::create($validatedData);
        $accessToken = $user->createToken('authToken')->accessToken;

        Helper::saveUnitsDefault($user->id);
        Helper::saveSizesDefault($user->id);
        Helper::saveColorDefault($user->id);
        
        return response(['user' => $user, 'access_token' => $accessToken]);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            "email" => "email|required",
            "password" => "required",
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Dados inválidos']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email',
            'password' => 'confirmed',
            'domain' => 'string|max:255|unique:users,domain',
            'terms_use' => 'boolean',
        ]);

        $user = \Auth::user();

        if (!empty($user)) {
            $user->fill($validatedData);
            $user->save();
            return $user;
        } else {
            return response(['message' => 'Usuário não encontrado']);
        }
    }

    public function checkDomainAvailable($domain)
    {
        $count = User::where(['domain' => $domain])->count();

        if($count == 0) {
           return response(['message' => 'Domínio disponível'], 200); 
        } else {
            return response(['message' => 'Domínio em uso'], 422);
        }
    }
}
