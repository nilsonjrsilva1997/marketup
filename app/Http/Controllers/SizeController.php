<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Size;

class SizeController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $sizes =  Size::where(['user_id' => $userId])->get();
        return $sizes;
    }

    public function create(Request $request)
    {
        $userId = Auth::id();
        $request['user_id'] = $userId;

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        return Size::create($validatedData);
    }

    public function show($id)
    {
        $size = Size::find($id);

        if (!empty($size)) {
            $userId = Auth::id();

            if ($size->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para acessar esses dados'], 401);
            }

            return $size;
        } else {
            return response(['message' => 'Tamanho não encontrada'], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $size = Size::find($id);

        if (!empty($size)) {
            $userId = Auth::id();

            if ($size->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para alterar esses dados'], 401);
            }

            $size->fill($validatedData);
            $size->save();
            return $size;
        } else {
            return response(['message' => 'Tamanho não encontrada'], 422);
        }
    }

    public function destroy($id)
    {
        $size = Size::find($id);

        if (!empty($size)) {
            $userId = Auth::id();
            
            if ($size->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para deletar esses dados'], 401);
            }

            if ($size->delete()) {
                return response(['message' => 'Tamanho excluida com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Tamanho não encontrada'], 422);
        }
    }
}