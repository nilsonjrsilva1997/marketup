<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use Auth;

class StockController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $stocks =  Stock::where(['user_id' => $userId])->get();
        return $stocks;
    }

    public function create(Request $request)
    {
        $userId = Auth::id();
        $request['user_id'] = $userId;

        $validatedData = $request->validate([
            'type' => 'required|in:UNIQUE,LARGE',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        return Stock::create($validatedData);
    }

    public function show($id)
    {
        $stock = Stock::find($id);

        if (!empty($stock)) {
            $userId = Auth::id();

            if ($stock->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para acessar esses dados'], 401);
            }

            return $stock;
        } else {
            return response(['message' => 'Estoque não encontrada'], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'type' => 'in:UNIQUE,LARGE',
            'product_id' => 'integer|exists:products,id',
        ]);

        $stock = Stock::find($id);

        if (!empty($stock)) {
            $userId = Auth::id();

            if ($stock->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para alterar esses dados'], 401);
            }

            $stock->fill($validatedData);
            $stock->save();
            return $stock;
        } else {
            return response(['message' => 'Estoque não encontrada'], 422);
        }
    }

    public function destroy($id)
    {
        $stock = Stock::find($id);

        if (!empty($stock)) {
            $userId = Auth::id();
            
            if ($stock->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para deletar esses dados'], 401);
            }

            if ($stock->delete()) {
                return response(['message' => 'Estoque excluida com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Estoque não encontrada'], 422);
        }
    }
}
