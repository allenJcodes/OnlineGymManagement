@extends('layouts.app')

@section('content')

    <div class="flex flex-col pt-16 gap-5 text-background">
        <div class="flex items-start w-full justify-between">

            <h1 class="text-2xl font-bold">Scheduling</h1>

            @if (auth()->user()->user_role != 3 )
                <a href="{{ route('scheduling.create') }}" class="primary-button">
                    Add Schedule +
                </a>
            @endif
                
        </div>

        <div id="schedule" data-user_role='{{ Auth::user()->user_role }}' data-user_id='{{ Auth::user()->id }}'>
        </div>

    </div>
@endsection
