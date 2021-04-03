<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PivotStockSize;

class PivotStockSizeController extends Controller
{
    public function associar(Request $request)
    {
        $validatedData = $request->validate([
            'stock_id' => 'required|integer|exists:stocks,id',
            'size_id' => 'required|integer|exists:sizes,id',
        ]);

        $stockSize = PivotStockSize::where(['size_id' => $request->size_id, 'stock_id' => $request->stock_id])->first();

        if(!empty($stockSize)) {
            return PivotStockSize::create($validatedData);
        } else {
            return response(['message' => 'Estoque já está associado ao tamanho']);
        }

    }

    public function desassociar($stock_id, $size_id)
    {
        $stockSize = PivotStockSize::where(['size_id' => $size_id, 'stock_id' => $stock_id])->first();

        if (!empty($stockSize)) {
            if ($stockSize->delete()) {
                return response(['message' => 'Tipo de item excluido com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Tipo de item não encontrado'], 422);
        }
    }
}
