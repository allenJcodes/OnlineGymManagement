@extends('layouts.app')

@section('content')
    <div id="addSchedule" data-trainers="{{ $trainers }}"
        @isset($isEdit)
        data-isEdit='{{ $isEdit }}'
    @endisset></div>
@endsection
