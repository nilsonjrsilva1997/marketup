<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::all();
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return $service;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
                    'active_service' => 'required|boolean',
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'value' => 'required|numeric',
            'unity_id' => 'required|integer',
        ]);

        return Service::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
                    'active_service' => 'boolean',
            'name' => 'string|max:255',
            'cost' => 'numeric',
            'value' => 'numeric',
            'unity_id' => 'integer',
        ]);

        $service = Service::findOrFail($id);
        $service->fill($validatedData);
        $service->save();
        return $service;
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
    }
}
