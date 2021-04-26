<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Composition;

class CompositionController extends Controller
{
    public function index()
    {
        return Composition::all();
    }

    public function show($id)
    {
        $composition = Composition::findOrFail($id);
        return $composition;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'item' => 'required|integer',
            'quantity' => 'required|integer',
            'unity_id' => 'required|integer|exists:unities,id',
            'product_id' => 'required|integer|exists:products,id',
            'unit_cost' => 'required|numeric',
            'total_cost' => 'required|numeric',
        ]);

        return Composition::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'item' => 'integer',
            'quantity' => 'integer',
            'unity_id' => 'integer|exists:unities,id',
            'product_id' => 'integer|exists:products,id',
            'unit_cost' => 'numeric',
            'total_cost' => 'numeric',
        ]);

        $composition = Composition::findOrFail($id);
        $composition->fill($validatedData);
        $composition->save();
        return $composition;
    }

    public function destroy($id)
    {
        $composition = Composition::findOrFail($id);
        $composition->delete();
    }
}
