<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Origin;

class OriginController extends Controller
{
    public function index()
    {
        $origins =  Origin::all();
        return $origins;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'index' => 'required|integer',
        ]);

        return Origin::create($validatedData);
    }

    public function show($id)
    {
        $origin =  Origin::findOrFail($id);
        return $origin;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'index' => 'integer',
        ]);

        $origin = Origin::findOrFail($id);
        $origin->fill($validatedData);
        $origin->save();
        return $origin;
    }

    public function destroy($id)
    {
        $origin = Origin::findOrFail($id);

        if ($taxType->delete()) {
            return response(['message' => 'Origem excluida com sucesso'], 200);
        }
    }
}
