<?php

namespace App\Http\Controllers\API;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index', [
            'contacts' => $contacts
        ]);
    }

    // axios
    // Get all data
    public function getData()
    {
        $contacts = Contact::all();
        return response([
            'contacts' => $contacts
        ]);
    }

    // Show id data
    public function show(Contact $id)
    {
        $contact = $id;
        return response([
            'contact' => $contact
        ]);
    }

    // Insert new data
    public function store(Request $request)
    {
        // return $request->all();

        $contacts = new Contact;
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;
        $contacts->save();

        return response([]);
    }

    // Update the data
    public function update(Contact $contact, Request $request)
    {
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->update();

        return response([]);
    }

    // Delete the data
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return response([]);
    }
}
