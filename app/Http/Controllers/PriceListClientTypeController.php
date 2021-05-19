<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PriceListClientType;

class PriceListClientTypeController extends Controller
{
    public function index()
    {
        return PriceListClientType::all();
    }

    public function show($id)
    {
        $priceListClientType = PriceListClientType::findOrFail($id);
        return $priceListClientType;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'discount_retail' => 'required|numeric',
            'discount_wholesale' => 'required|numeric',
        ]);

        return PriceListClientType::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description' => 'string|max:255',
            'discount_retail' => 'numeric',
            'discount_wholesale' => 'numeric',
        ]);

        $priceListClientType = PriceListClientType::findOrFail($id);
        $priceListClientType->fill($validatedData);
        $priceListClientType->save();
        return $priceListClientType;
    }

    public function destroy($id)
    {
        $priceListClientType = PriceListClientType::findOrFail($id);
        $priceListClientType->delete();
    }
}
