<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DestinationIncomeTax;

class DestinationIncomeTaxController extends Controller
{
    public function index()
    {
        return DestinationIncomeTax::all();
    }

    public function show($id)
    {
        $destinationIncomeTax = DestinationIncomeTax::findOrFail($id);
        return $destinationIncomeTax;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return DestinationIncomeTax::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $destinationIncomeTax = DestinationIncomeTax::findOrFail($id);
        $destinationIncomeTax->fill($validatedData);
        $destinationIncomeTax->save();
        return $destinationIncomeTax;
    }

    public function destroy($id)
    {
        $destinationIncomeTax = DestinationIncomeTax::findOrFail($id);
        $destinationIncomeTax->delete();
    }
}
