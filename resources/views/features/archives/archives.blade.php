@extends('layouts.app')

@section('content')
    <div class="pt-16">
        <h1 class="text-2xl font-bold pb-5">General Archives</h1>

        <div class="grid lg:grid-cols-4 gap-4 h-full">  
            <a href="{{ route('archive.users.index') }}" class="flex border bg-white shadow-sm h-20 w-full items-end p-4 hover:bg-[#e1e1e1] rounded-lg">
                <p class="text-lg font-medium">Users</p>
            </a>
            <a href="{{ route('archive.instructors.index') }}" class="flex border bg-white shadow-sm h-20 w-full items-end p-4 hover:bg-[#e1e1e1] rounded-lg">
                <p class="text-lg font-medium">Instructors</p>
            </a>
            <a href="{{ route('archive.equipments.index') }}" class="flex border bg-white shadow-sm h-20 w-full items-end p-4 hover:bg-[#e1e1e1] rounded-lg">
                <p class="text-lg font-medium">Equipments</p>
            </a>
            <a href="{{ route('archive.inventory.index') }}" class="flex border bg-white shadow-sm h-20 w-full items-end p-4 hover:bg-[#e1e1e1] rounded-lg">
                <p class="text-lg font-medium">Inventory</p>
            </a>      
            <a href="{{ route('archive.manage_subscriptions.index') }}" class="flex border bg-white shadow-sm h-20 w-full items-end p-4 hover:bg-[#e1e1e1] rounded-lg">
                <p class="text-lg font-medium">Manage Subscriptions</p>
            </a>      
        </div>
    </div>
    <div class="pt-16">
        <h1 class="text-2xl font-bold pb-5">Content Archives</h1>

        <div class="grid lg:grid-cols-4 gap-4 h-full">  
            <a href="{{ route('archive.gym_session.index') }}" class="flex border bg-white shadow-sm h-20 w-full items-end p-4 hover:bg-[#e1e1e1] rounded-lg">
                <p class="text-lg font-medium">Gym Session</p>
            </a>
            <a href="{{ route('archive.learn.index') }}" class="flex border bg-white shadow-sm h-20 w-full items-end p-4 hover:bg-[#e1e1e1] rounded-lg">
                <p class="text-lg font-medium">Learn</p>
            </a>
            <a href="{{ route('archive.faq.index') }}" class="flex border bg-white shadow-sm h-20 w-full items-end p-4 hover:bg-[#e1e1e1] rounded-lg">
                <p class="text-lg font-medium">FAQ</p>
            </a>
            <a href="{{ route('archive.contact.index') }}" class="flex border bg-white shadow-sm h-20 w-full items-end p-4 hover:bg-[#e1e1e1] rounded-lg">
                <p class="text-lg font-medium">Contact</p>
            </a>      
        </div>
    </div>
@endsection