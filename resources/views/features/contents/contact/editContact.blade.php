@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-14 gap-8">
        <h1 class="text-xl">Add Contact Detail</h1>

        <form action="{{route('contents.contact.update', ['contact' => $contact])}}" method="POST" class="flex flex-col gap-5">
            @csrf
            @method('PUT')

            <div class="form-field-container">
                <label for="contact_detail_type_id" class="form-label">Contact Detail Type</label>
                <select id="contact_detail_type_id" name="contact_detail_type_id" class="form-input"> 
                    <option value="" disabled>Select type</option>
                    @foreach ($contactDetailTypes as $contactDetailType)
                        <option value="{{$contactDetailType->id}}" {{$contactDetailType->id == $contact->contact_detail_type_id ? 'selected' : ''}}>{{Str::ucfirst(Str::replace('_', ' ', $contactDetailType->name))}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-field-container">
                <label for="label" class="form-label">Label</label>
                <input id="label" type="text" name="label" value="{{$contact->label}}" class="form-input">
            </div>

            <div class="form-field-container">
                <label for="content" class="form-label">Content</label>
                <input id="content" name="content" value="{{$contact->content}}" class="form-input" />
            </div>

            @if ($errors->any())
                <div class="flex flex-col gap-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <button type="submit">Save Changes</button>
        </form>

    </div>
@endsection
