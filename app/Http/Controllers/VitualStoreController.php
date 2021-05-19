<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\VitualStore;

class VitualStoreController extends Controller
{
    public function index()
    {
        return VitualStore::all();
    }

    public function show($id)
    {
        $vitualStore = VitualStore::findOrFail($id);
        return $vitualStore;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'price_of' => 'required|numeric',
            'price_per' => 'required|numeric',
            'menu_id' => 'required|integer|exists:menus,id',
            'submenu_id' => 'required|integer|exists:submenus,id',
            'height' => 'required|numeric',
            'depth' => 'required|numeric',
            'width' => 'required|numeric',
            'weight' => 'required|numeric',
            'description' => 'required|string|max:255',
            'warranty' => 'required|string|max:255',
            'included_items' => 'required|string|max:255',
            'specification' => 'required|string|max:255',
            'featured_home' => 'required|boolean',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        return VitualStore::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'string|max:255',
            'price_of' => 'numeric',
            'price_per' => 'numeric',
            'menu_id' => 'integer|exists:menus,id',
            'submenu_id' => 'integer|exists:submenus,id',
            'height' => 'numeric',
            'depth' => 'numeric',
            'width' => 'numeric',
            'weight' => 'numeric',
            'description' => 'string|max:255',
            'warranty' => 'string|max:255',
            'included_items' => 'string|max:255',
            'specification' => 'string|max:255',
            'featured_home' => 'boolean',
            'product_id' => 'integer|exists:products,id',
        ]);

        $vitualStore = VitualStore::findOrFail($id);
        $vitualStore->fill($validatedData);
        $vitualStore->save();
        return $vitualStore;
    }

    public function destroy($id)
    {
        $vitualStore = VitualStore::findOrFail($id);
        $vitualStore->delete();
    }
}
