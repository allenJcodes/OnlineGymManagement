@extends('layouts.app')

@section('content')
    <div class="fpt-16 flex flex-col gap-5 text-background">
        <h1 class="text-2xl font-bold">Add Learn Content</h1>

        <form enctype="multipart/form-data" action="{{route('contents.learn.update', ['learn' => $learn])}}" method="POST" class="flex flex-col gap-3 card">
            @csrf
            @method('PUT')

            <div class="form-field-container">
                <label for="title" class="form-label">Title</label>
                <input id="title" type="text" name="title" value="{{$learn->title}}" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="subtitle" class="form-label">Subtitle</label>
                <input id="subtitle" type="text" name="subtitle" value="{{$learn->subtitle}}" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" name="content" class="form-input resize-y">{{$learn->content}}</textarea>
            </div>

            <div class="form-field-container">
                <label for="image" class="form-label">Image</label>
                <input id="image" type="file" name="image" value="{{$learn->image}}" class="form-input" />
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
                    Back
                </a>
                <button class="primary-button">Save Changes</button>
            </div>
        </form>

    </div>
@endsection
