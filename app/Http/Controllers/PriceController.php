<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Price;
use Auth;

class PriceController extends Controller
{
    public function index()
    {
        $prices =  Price::all();
        return $prices;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'cost' => 'required|numeric',
            'retail_sale' => 'required|numeric',
            'wholesale' => 'required|numeric',
            'min_qt_wholesale' => 'required|integer',
            'product_id' => 'required|integer|exists:products,id|unique:prices,product_id',
        ]);

        return Price::create($validatedData);
    }

    public function show($id)
    {
        $price =  Price::find($id);

        if (!empty($price)) {
            $userId = Auth::id();
            if($price->product->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para acessar esses dados']);
            }
            return $price;
        } else {
            return response(['message' => 'Preço não encontrado'], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cost' => 'numeric',
            'retail_sale' => 'numeric',
            'wholesale' => 'numeric',
            'min_qt_wholesale' => 'integer',
            'product_id' => 'integer|exists:products,id|unique:prices,product_id',
        ]);

        $price = Price::find($id);

        if (!empty($price)) {
            $userId = Auth::id();
            
            if($price->product->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para alterar esses dados']);
            }

            $price->fill($validatedData);
            $price->save();
            return $price;
        } else {
            return response(['message' => 'Preço não encontrado'], 422);
        }
    }

    public function destroy($id)
    {
        $price = Price::find($id);

        if (!empty($price)) {
            $userId = Auth::id();
            
            if($price->product->user_id != $userId) {
                return response(['message' => 'Usuário não tem permissão para deletar esses dados']);
            }

            if ($price->delete()) {
                return response(['message' => 'Preço excluido com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Preço não encontrado'], 422);
        }
    }
}
