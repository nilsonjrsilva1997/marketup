<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ServiceUnity;

class ServiceUnityController extends Controller
{
    public function index()
    {
        return ServiceUnity::all();
    }

    public function show($id)
    {
        $serviceUnity = ServiceUnity::findOrFail($id);
        return $serviceUnity;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'initials' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        return ServiceUnity::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'initials' => 'string|max:255',
            'name' => 'string|max:255',
        ]);

        $serviceUnity = ServiceUnity::findOrFail($id);
        $serviceUnity->fill($validatedData);
        $serviceUnity->save();
        return $serviceUnity;
    }

    public function destroy($id)
    {
        $serviceUnity = ServiceUnity::findOrFail($id);
        $serviceUnity->delete();
    }
}
