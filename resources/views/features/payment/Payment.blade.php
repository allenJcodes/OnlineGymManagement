@extends('layouts.app')

@section('sidebar_content')
    <div id="PaymentPage" data-user_id="{{ Auth::user()->id }}"></div>
@endsection
