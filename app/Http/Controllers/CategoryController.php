<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $category =  Category::where(['user_id' => $userId])->get();
        return $category;
    }

    public function create(Request $request)
    {
        $userId = Auth::id();
        $request['user_id'] = $userId;

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        return Category::create($validatedData);
    }

    public function show($id)
    {
        $category =  Category::find($id);

        if (!empty($category)) {
            
            return $category;
        } else {
            return response(['message' => 'Categoria não encontrada'], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $category = Category::find($id);

        if (!empty($category)) {
            $userId = Auth::id();

            if ($category->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para alterar esses dados']);
            }

            $category->fill($validatedData);
            $category->save();
            return $category;
        } else {
            return response(['message' => 'Categoria não encontrada'], 422);
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!empty($category)) {
            $userId = Auth::id();
            
            if ($category->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para deletar esses dados']);
            }

            if ($category->delete()) {
                return response(['message' => 'Categoria excluida com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Categoria não encontrada'], 422);
        }
    }
}
