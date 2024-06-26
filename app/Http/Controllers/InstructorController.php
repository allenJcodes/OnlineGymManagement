<?php

namespace App\Http\Controllers;

use App\Http\Requests\Instructor\InstructorStoreRequest;
use App\Http\Requests\Instructor\InstructorUpdateRequest;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Instructor::class, 'instructor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::search()->with('user')->paginate(10);
        return view('features.instructor.Instructor', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.instructor.AddInstructor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstructorStoreRequest $request)
    {
        $user = User::create([
            ...$request->safe()->except('description'),
            'password' => bcrypt($request->password),
            'user_role' => 2
        ]);
        
        
        $instructor = Instructor::create([
            'user_id' => $user->id,
            'description' => $request->description,
        ]);

        return redirect()->route('instructor.index')->with('toast', [
            'status' => 'success',
            'message' => 'Instructor created successfully.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {   
        $instructor = $instructor->with('user')->where('user_id', '=' , $instructor->user_id)->first();
        return view('features.instructor.EditInstructor', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(InstructorUpdateRequest $request, Instructor $instructor)
    {
        $user = User::where('id', $instructor->user_id);

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        $user->update([
            ...$request->safe()->except(['description', 'password']),
            'user_role' => 2
        ]);

        Instructor::where('id', $instructor->id)->update(['description' => $request->description]);

        return redirect()->route('instructor.edit', ['instructor' => $instructor])->with('toast', [
            'status' => 'success',
            'message' => 'Instructor details updated.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return back()->with('toast', [
            'status' => 'success',
            'message' => 'Instructor archived successfully.',
        ]);
    }

    public function restore() {
        $instructor = Instructor::withTrashed()->find(request()->instructor_id);
        $user = User::withTrashed()->find($instructor->user_id)->restore();
        $instructor->restore();
        
        return redirect()->route('archive.instructors.index')->with('toast', [
            'status' => 'success',
            'message' => 'Instructor restored successfully.',
        ]);
    }
}
