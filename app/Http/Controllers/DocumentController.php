<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        return Document::all();
    }

    public function show($id)
    {
        $document = Document::findOrFail($id);
        return $document;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'document_type_id' => 'required|integer|exists:document_types,id',
            'name' => 'required|string|max:255',
            'file' => 'required|string|max:255',
            'client_id' => 'required|integer|exists:clients,id',
        ]);

        return Document::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'document_type_id' => 'integer|exists:document_types,id',
            'name' => 'string|max:255',
            'file' => 'string|max:255',
        ]);

        $document = Document::findOrFail($id);
        $document->fill($validatedData);
        $document->save();
        return $document;
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();
    }
}
