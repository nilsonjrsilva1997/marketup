<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SubMenu;

class SubMenuController extends Controller
{
    public function index()
    {
        return SubMenu::all();
    }

    public function show($id)
    {
        $subMenu = SubMenu::findOrFail($id);
        return $subMenu;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return SubMenu::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $subMenu = SubMenu::findOrFail($id);
        $subMenu->fill($validatedData);
        $subMenu->save();
        return $subMenu;
    }

    public function destroy($id)
    {
        $subMenu = SubMenu::findOrFail($id);
        $subMenu->delete();
    }
}
