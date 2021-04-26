<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CompositionUnity;
use Auth;

class CompositionUnityController extends Controller
{
    public function index()
    {
        return Auth::user()->compositon_unity;
    }

    public function show($id)
    {
        $compositionUnity = CompositionUnity::findOrFail($id);
        return $compositionUnity;
    }

    public function create(Request $request)
    {
        $request['user_id'] = Auth::id();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        return CompositionUnity::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $compositionUnity = CompositionUnity::findOrFail($id);
        $compositionUnity->fill($validatedData);
        $compositionUnity->save();
        return $compositionUnity;
    }

    public function destroy($id)
    {
        $compositionUnity = CompositionUnity::findOrFail($id);
        $compositionUnity->delete();
    }
}
