@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-14 gap-5 text-background">
        <h1 class="text-2xl font-bold">Edit FAQ Content</h1>

        <form action="{{route('contents.faq.update', ['faq' => $faq])}}" method="POST" class="flex flex-col gap-3 card">
            @csrf
            @method('PUT')

            <div class="form-field-container">
                <label for="title" class="form-label">Title</label>
                <input id="title" type="text" name="title" value="{{$faq->title}}" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" name="content" class="form-input resize-y">{{$faq->content}}</textarea>
            </div>

            @if ($errors->any())
                <div class="flex flex-col gap-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="self-end flex gap-2">
                <a href="{{ route('contents.faq.index') }}" class="outline-button">
                    Cancel
                </a>
                <button class="primary-button">Save Changes</button>
            </div>
        </form>

    </div>
@endsection
