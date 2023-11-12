@extends('layouts.app')

@section('content')
    <div id="PaymentPage" data-user_id="{{ Auth::user()->id }}"></div>
@endsection
