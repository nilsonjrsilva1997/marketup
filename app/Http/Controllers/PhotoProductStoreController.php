<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PhotoProductStore;
use App\Helpers\Helper;

class PhotoProductStoreController extends Controller
{
    public function index()
    {
        return PhotoProductStore::all();
    }

    public function show($id)
    {
        $photoProductStore = PhotoProductStore::findOrFail($id);
        return $photoProductStore;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|mimes:jpeg,png',
            'virtual_store_id' => 'required|integer'
        ]);

        $response = Helper::uploadImage($request, 'image');

        if($response['status']) {
            $validatedData['image'] = url('/') . '/storage/images/' . $response['file_name_to_storage'];
        } else {
            return response(['message' => 'Erro ao salvar imagem'], 422);
        }

        return PhotoProductStore::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'string|max:255',
            'virtual_store_id' => 'integer'
        ]);

        $photoProductStore = PhotoProductStore::findOrFail($id);
        $photoProductStore->fill($validatedData);
        $photoProductStore->save();
        return $photoProductStore;
    }

    public function destroy($id)
    {
        $photoProductStore = PhotoProductStore::findOrFail($id);
        $photoProductStore->delete();
    }
}
