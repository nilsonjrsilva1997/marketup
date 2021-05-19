<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DocumentType;

class DocumentTypeController extends Controller
{
    public function index()
    {
        return DocumentType::all();
    }

    public function show($id)
    {
        $documentType = DocumentType::findOrFail($id);
        return $documentType;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return DocumentType::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $documentType = DocumentType::findOrFail($id);
        $documentType->fill($validatedData);
        $documentType->save();
        return $documentType;
    }

    public function destroy($id)
    {
        $documentType = DocumentType::findOrFail($id);
        $documentType->delete();
    }
}
