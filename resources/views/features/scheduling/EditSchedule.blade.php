@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-14 gap-5">
        <h1 class="text-2xl font-bold">Edit Schedule</h1>
        <form action="{{route('scheduling.update', ['scheduling' => $schedule])}}" method="POST" class="flex flex-col gap-5 card">
            @method('PUT')
            @csrf

            <div class="form-field-container">
                <label for="class_name" class="form-label">Name of Class</label>
                <input value="{{$schedule->class_name}}" id="class_name" type="text" name="class_name" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="instructor_id" class="form-label">Instructor</label>
            
                <select name="instructor_id" id="instructor_id" class="form-input">
                    @foreach ($instructors as $instructor)
                        <option {{$instructor->id == $schedule->instructor_id ? 'selected' : ''}} value="{{$instructor->id}}">{{$instructor->user->full_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-field-container">
                <label for="date_time_start" class="form-label">Date and Time Start</label>
                <input value="{{$schedule->date_time_start}}" id="date_time_start" type="datetime-local" name="date_time_start" class="form-input">
            </div>
            
            <div class="form-field-container">
                <label for="date_time_end" class="form-label">Date and Time End</label>
                <input value="{{$schedule->date_time_end}}" id="date_time_end" type="datetime-local" name="date_time_end" class="form-input">
            </div>

            @if ($errors->any())
                <div class="flex flex-col gap-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="flex gap-2 self-end">
                <a href="{{route('scheduling.index')}}" class="w-fit outline-button">Cancel</a>
                <button type="submit" class="primary-button w-fit">Save Changes</button>
            </div>
        </form>
    </div>

    <script>
        const dateStartInput = document.querySelector('#date_time_start');
        const dateEndInput = document.querySelector('#date_time_end');

        dateStartInput.addEventListener('change', () => {
            dateEndInput.min = dateStartInput.value;
        })

    </script>
@endsection
