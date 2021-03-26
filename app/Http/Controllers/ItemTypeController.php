<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemType;

class ItemTypeController extends Controller
{
    public function index()
    {
        $itemTypes =  ItemType::all();
        return $itemTypes;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return ItemType::create($validatedData);
    }

    public function show($id)
    {
        $itemType =  ItemType::find($id);

        if (!empty($itemType)) {
            return $itemType;
        } else {
            return response(['message' => 'Tipo de item não encontrado'], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $itemType = ItemType::find($id);

        if (!empty($itemType)) {
            $itemType->fill($validatedData);
            $itemType->save();
            return $itemType;
        } else {
            return response(['message' => 'Tipo de item não encontrado'], 422);
        }
    }

    public function destroy($id)
    {
        $itemType = ItemType::find($id);

        if (!empty($itemType)) {
            if ($itemType->delete()) {
                return response(['message' => 'Tipo de item excluido com sucesso'], 200);
            }
        } else {
            return response(['message' => 'Tipo de item não encontrado'], 422);
        }
    }
}
