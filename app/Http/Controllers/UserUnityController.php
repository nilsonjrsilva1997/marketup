<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserUnity;
use Auth;

class UserUnityController extends Controller
{
    public function index()
    {
        $userUnity =  UserUnity::all();
        return $userUnity;
    }

    public function create(Request $request)
    {
        $userId = Auth::id();
        $request['user_id'] = $userId;

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'abbreviation' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id'
        ]);

        return UserUnity::create($validatedData);
    }

    public function show($id)
    {
        $userUnity =  UserUnity::find($id);
        return $userUnity;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'abbreviation' => 'string|max:255',
        ]);

        $userUnity = UserUnity::find($id);

        if (!empty($userUnity)) {
            $userUnity->fill($validatedData);
            $userUnity->save();
            return $userUnity;
        } else {
            return response(['message' => 'Unidade não encontrada'], 422);
        }
    }

    public function destroy($id)
    {
        $userUnity = UserUnity::find($id);

        if (!empty($userUnity)) {
            if ($userUnity->delete()) {
                return response(['message' => 'Unidade excluida com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Unidade não encontrada'], 422);
        }
    }
}
