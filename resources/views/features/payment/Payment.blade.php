@extends('layouts.app')

@section('sidebar_content')
    <div class="ml-20">
        <div id="PaymentPage" data-user_id="{{ Auth::user()->id }}"></div>
    </div>
@endsection
