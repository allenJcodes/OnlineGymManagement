@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">

        <div class="flex items-start w-full justify-between">
            <h1 class="text-2xl font-bold">Users Archives</h1>
        </div>

        <div class="flex flex-col gap-2">

            <div class="card">

                <div class="flex w-full justify-between">
                    <h2 class="text-xl font-medium">Users Archives List</h2>
                    {{-- form actions here --}}
                    <x-table-search model="User"/>
                </div>

                <table class="table">
                    <thead>
                        <tr class="table-row">
                            <td class="py-2">
                                Name
                            </td>
                            <td class="py-2">
                                Email
                            </td>
                            <td class="py-2">
                                Role
                            </td>
                            <td class="py-2">
                                Action
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="table-row">
                                <td class="py-2">
                                    {{ $user->full_name }}
                                </td>
                                <td class="py-2">
                                    {{ $user->email }}
                                </td>
                                <td class="py-2">
                                    <span @class([
                                        'flex py-1 px-2 w-fit text-xs rounded-full ring-1', 
                                        'bg-sky-100 ring-sky-500 text-sky-500' => $user->user_role == 1,
                                        'bg-orange-100 ring-orange-500 text-orange-500' => $user->user_role == 3,
                                    ])>
                                        {{$user->role->role_name}}
                                    </span>
                                    {{-- @if ($user->user_role == 1)
                                        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                                                class="flex w-2.5 h-2.5 bg-blue-600 rounded-full mr-1.5 flex-shrink-0"></span>Admin</span>
                                    @endif
                                    @if ($user->user_role == 2)
                                        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                                                class="flex w-2.5 h-2.5 bg-green-500  rounded-full mr-1.5 flex-shrink-0"></span>Staff</span>
                                    @endif
                                    @if ($user->user_role == 3)
                                        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                                                class="flex w-2.5 h-2.5 bg-yellow-300  rounded-full mr-1.5 flex-shrink-0"></span>Customer</span>
                                    @endif --}}
                                </td>
                                <td>
                                    <div class="flex items-center w-full">
                                        <div class="text-left">
                                            <button id="dropdownButton" data-dropdown-toggle="toggle{{ $user->id }}" class="" type="button">
                                                <span class="sr-only">Open dropdown</span>
                                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 16 3">
                                                    <path
                                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                </svg>
                                            </button>
                                        </div>
    
                                        <div id="toggle{{ $user->id }}" class="z-10 hidden bg-white border border-light-gray-background text-background rounded-md !min-w-[8vw]">
    
                                            <div class="flex flex-col gap-2 divide-y divide-light-gray-background">
    
                                                <p class="text-background/70 text-sm pt-2 px-4">Actions - {{$user->first_name}}</p>
    
                                                <div class="flex flex-col divide-y divide-light-gray-background" aria-labelledby="dropdownButton">
{{-- @dd($user) --}}
                                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                        class="restore-button w-full text-left py-2 px-4 hover:bg-off-white hover:text-green-600 transition-all m-0" type="button"
                                                        data-user="{{ json_encode($user) }}"
                                                        data-url="{{ route('archive.users.restore', ['user' => $user]) }}">
                                                        Restore
                                                    </button>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
    
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="100%" class="text-center h-[10vh] bg-gray-100">
                                No users
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($users->hasPages())
                <div class="card">
                    {{$users->links()}}
                </div>
            @endif
        </div>

    </div>
    
    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 md:inset-0 h-screen w-screen bg-black/20 backdrop-blur-sm">
        <div class='flex flex-col bg-off-white p-5 h-fit rounded-lg min-w-fit min-h-[10vh] max-h-[90vh] max-w-[60vw] gap-5 overflow-x-hidden overflow-y-auto'>
            <p id="modal-text"></p>
            <form method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="modal_id" name="user_id">
                <div class="w-full flex justify-end gap-2">
                    <button type="button" class="outline-button" data-modal-hide="popup-modal">
                        Cancel
                    </button>
                    <button type="submit" class="primary-button">
                        Restore
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script>
        const restoreButtons = document.querySelectorAll('.restore-button');
        const modalText = document.querySelector('#modal-text');
        const modalIdField = document.querySelector('#modal_id');

        restoreButtons.forEach(button => {
            const user = JSON.parse(button.dataset.user);
            button.addEventListener('click', () => {
                modalText.innerText = "Are you sure you want to restore user \"" + user.full_name + "\" ?";
                modalIdField.value = user.id

                const modalForm = modalIdField.parentElement;
                modalForm.action = button.dataset.url;
                
                const submitButton = modalIdField.nextElementSibling.querySelector('button[type="submit"]');
                submitButton.addEventListener('click', () => {
                    modalForm.submit();
                });
            });
        })
    </script>
@endsection
