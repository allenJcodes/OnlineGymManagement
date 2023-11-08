@extends('layouts.app')

@section('sidebar_content')
    <div id="ReservationPage" data-user_id='{{ Auth::user()->id }}'></div>
@endsection
