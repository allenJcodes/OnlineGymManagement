<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GymSession\GymSessionStoreRequest;
use App\Models\GymSession;
use Illuminate\Http\Request;

class GymSessionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(GymSession::class, 'gym_session');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gym_sessions = GymSession::search()->paginate(10);

        return view('features.contents.gym_session.gymSession', compact('gym_sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.contents.gym_session.addGymSession');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GymSessionStoreRequest $gym_session)
    {
        GymSession::create($gym_session->validated());

        return redirect()->route('contents.gym_session.index')->with('toast', [
            'status' => 'success',
            'message' => 'Successfully added a gym session.'
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
    public function edit(GymSession $gym_session)
    {
        return view('features.contents.gym_session.editGymSession', compact('gym_session'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GymSessionStoreRequest $request, GymSession $gym_session)
    {
        $gym_session->update($request->validated());

        return redirect()->route('contents.gym_session.index')->with('toast', [
            'status' => 'success',
            'message' => 'Gym session updated successfully.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GymSession $gym_session)
    {
        $gym_session->delete();

        return back()->with('toast', [
            'status' => 'success',
            'message' => 'Gym session deleted successfully.',
        ]);
    }

    public function restore()
    {
        GymSession::withTrashed()->find(request()->gym_session_id)->restore();

        return back()->with('toast', [
            'status' => 'success',
            'message' => 'Gym session restored successfully.',
        ]);
    }
}
