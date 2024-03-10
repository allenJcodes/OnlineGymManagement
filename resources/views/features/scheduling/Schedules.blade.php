@extends('layouts.app')

@section('content')
    <div id="schedule" data-user_role='{{ Auth::user()->user_role }}' data-user_id='{{ Auth::user()->id }}'>
    </div>
@endsection
