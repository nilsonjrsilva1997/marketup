<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PdvTag;

class PdvTagController extends Controller
{
    public function index()
    {
        return PdvTag::all();
    }

    public function show($id)
    {
        $pdvTag = PdvTag::findOrFail($id);
        return $pdvTag;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return PdvTag::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $pdvTag = PdvTag::findOrFail($id);
        $pdvTag->fill($validatedData);
        $pdvTag->save();
        return $pdvTag;
    }

    public function destroy($id)
    {
        $pdvTag = PdvTag::findOrFail($id);
        $pdvTag->delete();
    }
}
