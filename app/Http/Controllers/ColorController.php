<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $colors =  Color::where(['user_id' => $userId])->get();
        return $colors;
    }

    public function create(Request $request)
    {
        $userId = Auth::id();
        $request['user_id'] = $userId;

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $validatedData['name'] = mb_strtoupper($validatedData['name']);

        return Color::create($validatedData);
    }

    public function show($id)
    {
        $color = Color::find($id);

        if (!empty($color)) {
            $userId = Auth::id();

            if ($color->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para acessar esses dados'], 401);
            }

            return $color;
        } else {
            return response(['message' => 'Cor não encontrada'], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $color = Color::find($id);

        if (!empty($color)) {
            $userId = Auth::id();

            if ($color->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para alterar esses dados'], 401);
            }

            $color->fill($validatedData);
            $color->save();
            return $color;
        } else {
            return response(['message' => 'Cor não encontrada'], 422);
        }
    }

    public function destroy($id)
    {
        $color = Color::find($id);

        if (!empty($color)) {
            $userId = Auth::id();
            
            if ($color->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para deletar esses dados'], 401);
            }

            if ($color->delete()) {
                return response(['message' => 'Cor excluida com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Cor não encontrada'], 422);
        }
    }
}
