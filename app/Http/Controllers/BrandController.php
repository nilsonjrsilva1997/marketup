<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Auth;

class BrandController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $brands =  Brand::where(['user_id' => $userId])->get();
        return $brands;
    }

    public function create(Request $request)
    {
        $userId = Auth::id();
        $request['user_id'] = $userId;

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        return Brand::create($validatedData);
    }

    public function show($id)
    {
        $brand =  Brand::find($id);

        if (!empty($brand)) {
            $userId = Auth::id();

            if ($brand->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para vizualizar esses dados']);
            }

            return $brand;
        } else {
            return response(['message' => 'Marca não encontrada'], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $brand = Brand::find($id);

        if (!empty($brand)) {
            $userId = Auth::id();

            if ($brand->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para alterar esses dados']);
            }

            $brand->fill($validatedData);
            $brand->save();
            return $brand;
        } else {
            return response(['message' => 'Marca não encontrada'], 422);
        }
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);

        if (!empty($brand)) {
            $userId = Auth::id();

            if ($brand->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para deletar esses dados']);
            }

            if ($brand->delete()) {
                return response(['message' => 'Marca excluida com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Marca não encontrada'], 422);
        }
    }
}
