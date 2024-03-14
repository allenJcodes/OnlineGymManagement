@extends('layouts.app')

@section('content')
    <div class="pt-16">
        <h1 class="text-2xl font-bold pb-5">Contents</h1>

        <div class="flex gap-4 h-full">  
            <a href="{{ route('contents.gym_session.index') }}" class="flex border bg-white shadow-sm h-20 w-full items-end p-4 hover:bg-[#e1e1e1] rounded-lg">
                <p class="text-lg font-medium">Gym Session</p>
            </a>
            <a href="{{ route('contents.learn.index') }}" class="flex border bg-white shadow-sm h-20 w-full items-end p-4 hover:bg-[#e1e1e1] rounded-lg">
                <p class="text-lg font-medium">Learn</p>
            </a>
            <a href="{{ route('contents.faq.index') }}" class="flex border bg-white shadow-sm h-20 w-full items-end p-4 hover:bg-[#e1e1e1] rounded-lg">
                <p class="text-lg font-medium">FAQ</p>
            </a>
            <a href="{{ route('contents.contact.index') }}" class="flex border bg-white shadow-sm h-20 w-full items-end p-4 hover:bg-[#e1e1e1] rounded-lg">
                <p class="text-lg font-medium">Contact</p>
            </a>      
        </div>
    </div>
@endsection