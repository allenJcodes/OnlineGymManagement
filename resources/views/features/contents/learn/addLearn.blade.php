@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-14 gap-8">
        <h1 class="text-xl">Add Learn Content</h1>

        <form action="{{route('contents.learn.store')}}" method="POST" class="flex flex-col gap-5">
            @csrf

            <div class="form-field-container">
                <label for="title" class="form-label">Title</label>
                <input id="title" type="text" name="title" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="subtitle" class="form-label">Subtitle</label>
                <input id="subtitle" type="text" name="subtitle" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" name="content" class="form-input"></textarea>
            </div>

            <div class="form-field-container">
                <label for="image" class="form-label">Content</label>
                <input id="image" type="file" name="image" class="form-input" />
            </div>

            @if ($errors->any())
                <div class="flex flex-col gap-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <button type="submit">Add Learn Content</button>
        </form>

    </div>
@endsection
