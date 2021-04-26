<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pdv;

class PdvController extends Controller
{
    public function index()
    {
        return Pdv::all();
    }

    public function show($id)
    {
        $pdv = Pdv::findOrFail($id);
        return $pdv;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|integer',
            'label' => 'required|string|max:255',
            'product_id' => 'required|integer',
        ]);

        return Pdv::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'integer',
            'label' => 'string|max:255',
            'product_id' => 'integer',
        ]);

        $pdv = Pdv::findOrFail($id);
        $pdv->fill($validatedData);
        $pdv->save();
        return $pdv;
    }

    public function destroy($id)
    {
        $pdv = Pdv::findOrFail($id);
        $pdv->delete();
    }
}
