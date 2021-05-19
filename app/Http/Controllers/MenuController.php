<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        return Menu::all();
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return $menu;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return Menu::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->fill($validatedData);
        $menu->save();
        return $menu;
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
    }
}
