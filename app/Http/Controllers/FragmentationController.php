<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fragmentation;

class FragmentationController extends Controller
{
    public function index()
    {
        return Fragmentation::all();
    }

    public function show($id)
    {
        $fragmentation = Fragmentation::findOrFail($id);
        return $fragmentation;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer',
            'product_id' => 'required|integer|exists:products,id',
            'unity_id' => 'required|integer|exists:fragmentation_unities,id',
            'sale_value' => 'required|numeric',
        ]);

        return Fragmentation::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'quantity' => 'integer',
            'product_id' => 'integer|exists:products,id',
            'unity_id' => 'integer|exists:fragmentation_unities,id',
            'sale_value' => 'numeric',
        ]);

        $fragmentation = Fragmentation::findOrFail($id);
        $fragmentation->fill($validatedData);
        $fragmentation->save();
        return $fragmentation;
    }

    public function destroy($id)
    {
        $fragmentation = Fragmentation::findOrFail($id);
        $fragmentation->delete();
    }
}
