@extends('layouts.app')

@section('content')
    <div id="schedule" class="pt-10" data-user_role='{{ Auth::user()->user_role }}' data-user_id='{{ Auth::user()->id }}'>
    </div>
@endsection
