<?php

namespace App\Http\Controllers;

use App\Http\Requests\Content\LearnStoreRequest;
use App\Models\LearnContent;
use Illuminate\Http\Request;

class LearnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $learnContents = LearnContent::all();
        
        return view('features.contents.learn.learn', compact('learnContents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.contents.learn.addLearn');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LearnStoreRequest $request)
    {   
        $image = $request->image;
 
        if (isset($image)) {
            $extension = $image->extension();
            $newImage = $request->image->storeAs('images/content/learn', "$request->title.$extension", 'public');
        }

        LearnContent::create([...$request->validated(), 'image' => $newImage ?? '']);

        return redirect()->route('contents.learn.index')->with('success', 'Successfully added learn content.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LearnContent $learn)
    {
        return view('features.contents.learn.editLearn', compact('learn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LearnStoreRequest $request, LearnContent $learn)
    {   
        $image = $request->image;

        if (isset($image)) {
            $extension = $image->extension();
            $newImage = $request->image->storeAs('images/content/learn', "$request->title.$extension", 'public');
        }

        $learn->update([...$request->validated(), 'image' => $newImage ?? '']);
        
        return redirect()->route('contents.learn.index')->with('success', 'Successfully updated learn content.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LearnContent $learn)
    {
        $learn->delete();

        return redirect()->route('contents.learn.index')->with('success', 'Successfully deleted learn content.');
    }
}
