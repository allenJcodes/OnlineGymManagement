@extends('layouts.app')

@section('content')
    <div class="pt-16 flex flex-col gap-5 text-background">
        <h1 class="text-2xl font-bold">Add Learn Content</h1>

        <form enctype="multipart/form-data" action="{{route('contents.learn.store')}}" method="POST" class="flex flex-col gap-3 card">
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
                <textarea id="content" name="content" class="form-input resize-y"></textarea>
            </div>

            <div class="form-field-container">
                <label for="image" class="form-label">Image</label>
                <input id="image" type="file" name="image" class="form-input" />
            </div>

            @if ($errors->any())
                <div class="flex flex-col gap-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="self-end flex gap-2">
                <a href="{{ route('contents.learn.index') }}" class="outline-button">
                    Cancel
                </a>
                <button class="primary-button">Add Learn Content</button>
            </div>
        </form>

    </div>
@endsection
