<?php

namespace App\Http\Controllers;

use App\Http\Requests\Content\ContactStoreRequest;
use App\Models\ContactDetail;
use App\Models\ContactDetailType;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = ContactDetail::with('ContactDetailType')->get();
        
        return view('features.contents.contact.contact', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contactDetailTypes = ContactDetailType::all();

        return view('features.contents.contact.addContact', compact('contactDetailTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactStoreRequest $contact)
    {
        // dd($contact->validated());
        ContactDetail::create($contact->validated());

        return redirect()->route('contents.contact.index')->with('success', 'Successfully added a content.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactDetail $contact)
    {
        $contactDetailTypes = ContactDetailType::all();

        return view('features.contents.contact.editContact', compact(['contact', 'contactDetailTypes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactStoreRequest $request, ContactDetail $contact)
    {
        $contact->update($request->validated());

        return redirect()->route('contents.contact.index')->with('success', 'Successfully updated contact information.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactDetail $contact)
    {
        $contact->delete();
        return redirect()->route('contents.contact.index')->with('success', 'Successfully deleted contact information.');
    }
}
