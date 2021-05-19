<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return Contact::all();
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return $contact;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'office' => 'required|string|max:255',
            'cellphone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'client_id' => 'required|integer',
        ]);

        return Contact::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'office' => 'string|max:255',
            'cellphone' => 'string|max:255',
            'email' => 'string|max:255',
            'client_id' => 'integer',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->fill($validatedData);
        $contact->save();
        return $contact;
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
    }
}
