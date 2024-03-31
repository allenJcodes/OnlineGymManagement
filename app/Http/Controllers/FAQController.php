<?php

namespace App\Http\Controllers;

use App\Http\Requests\Content\FAQStoreRequest;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(FAQ::class, 'content');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = FAQ::search()->paginate(10);
        
        return view('features.contents.faq.faq', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.contents.faq.addFaq');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FAQStoreRequest $faq)
    {
        FAQ::create($faq->validated());

        return redirect()->route('contents.faq.index')->with('toast', [
            'status' => 'success',
            'message' => 'FAQ added successfully.',
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
    public function edit(FAQ $faq)
    {
        return view('features.contents.faq.editFaq', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FAQStoreRequest $request, FAQ $faq)
    {
        $faq->update($request->validated());

        return redirect()->route('contents.faq.index')->with('toast', [
            'status' => 'success',
            'message' => 'FAQ updated successfully.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQ $faq)
    {
            $faq->delete();

            return redirect()->route('contents.faq.index')->with('toast', [
                'status' => 'success',
                'message' => 'FAQ deleted successfully.',
            ]);
    }
}
