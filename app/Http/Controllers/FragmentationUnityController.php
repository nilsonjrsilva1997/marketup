<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FragmentationUnity;

class FragmentationUnityController extends Controller
{
    public function index()
    {
        return FragmentationUnity::all();
    }

    public function show($id)
    {
        $fragmentationUnity = FragmentationUnity::findOrFail($id);
        return $fragmentationUnity;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return FragmentationUnity::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $fragmentationUnity = FragmentationUnity::findOrFail($id);
        $fragmentationUnity->fill($validatedData);
        $fragmentationUnity->save();
        return $fragmentationUnity;
    }

    public function destroy($id)
    {
        $fragmentationUnity = FragmentationUnity::findOrFail($id);
        $fragmentationUnity->delete();
    }
}
