<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Historic;

class HistoricController extends Controller
{
    public function index()
    {
        return Historic::all();
    }

    public function show($id)
    {
        $historic = Historic::findOrFail($id);
        return $historic;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'description' => 'required|string|max:255',
            'status' => 'required|in:pending,concluded',
            'client_id' => 'required|integer|exists:clients,id',
        ]);

        return Historic::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'date' => 'date',
            'description' => 'string|max:255',
            'status' => 'in:pending,concluded',
        ]);

        $historic = Historic::findOrFail($id);
        $historic->fill($validatedData);
        $historic->save();
        return $historic;
    }

    public function destroy($id)
    {
        $historic = Historic::findOrFail($id);
        $historic->delete();
    }
}
