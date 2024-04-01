<?php

namespace App\Http\Controllers;

use App\Http\Requests\Content\ContactMapUpdateRequest;
use App\Http\Requests\Content\ContactStoreRequest;
use App\Models\ContactDetail;
use App\Models\ContactDetailType;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ContactDetail::class, 'contact');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = ContactDetail::search()->with('ContactDetailType')->paginate(10);
        $coordinates = ContactDetail::where('label', 'Coordinates')->first();
        
        return view('features.contents.contact.contact', compact('contacts', 'coordinates'));
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
        ContactDetail::create($contact->validated());

        return redirect()->route('contents.contact.index')->with('toast', [
            'status' => 'success',
            'message' => 'Contact information added successfully.',
        ]);
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

        return redirect()->route('contents.contact.index')->with('toast', [
            'status' => 'success',
            'message' => 'Contact information updated successfully.',
        ]);
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
        return redirect()->route('contents.contact.index')->with('toast', [
            'status' => 'success',
            'message' => 'Contact information deleted successfully.',
        ]);
    }

    public function updateMap(ContactMapUpdateRequest $request)
    {
        $contact = ContactDetail::where('label', 'Coordinates')->first();
        $contact->update(['content'=> $request->content]);

        return redirect()->route('contents.contact.index')->with('toast', [
            'status' => 'success',
            'message' => 'Contact Map updated successfully.',
        ]);
    }
}
