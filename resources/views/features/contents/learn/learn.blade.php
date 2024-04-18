@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">

        
        <div class="flex items-start w-full justify-between ">
            <h1 class="text-2xl font-bold">Learn Contents</h1>

            <a href="{{ route('contents.learn.create') }}" class="primary-button">
                Add Learn Content +
            </a>
        </div>

        <div class="flex flex-col gap-2">

            <div class="card">

                <div class="flex w-full justify-between">
                    <h2 class="text-xl font-medium">Learn Contents List</h2>
                    {{-- form actions here --}}
                    <x-table-search model="Learn Content"/>
                </div>

                <table class="table">
                    <thead>
                        <tr class="table-row">
                            <td class="py-2">
                                Title
                            </td>
                            <td class="py-2">
                                Subtitle
                            </td>
                            <td class="py-2">
                                Content
                            </td>
                            <td class="py-2">
                                Created At
                            </td>
                            <td class="py-2">
                                Updated At
                            </td>
                            <td class="py-2">
                                Actions
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($learnContents as $learnContent)
                        <tr class="table-row">
                            <td class="py-2 pr-2">
                                {{ $learnContent->title }}
                            </td>
                            <td class="py-2 pr-2">
                                {{ $learnContent->subtitle }}
                            </td>
                            <td class="py-2 pr-2">
                                {{ $learnContent->content }}
                            </td>
                            <td class="py-2 pr-2">
                                {{ $learnContent->created_at }}
                            </td>
                            <td class="py-2 pr-2">
                                {{ $learnContent->updated_at }}
                            </td> 
                            <td>
                                <div class="flex items-center w-full">
                                    <div class="text-left">
                                        <button id="dropdownButton" data-dropdown-toggle="toggle{{ $learnContent->id }}" class="" type="button">
                                            <span class="sr-only">Open dropdown</span>
                                            <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 16 3">
                                                <path
                                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div id="toggle{{ $learnContent->id }}" class="z-10 hidden bg-white border border-light-gray-background text-background rounded-md !min-w-[8vw]">

                                        <div class="flex flex-col gap-2 divide-y divide-light-gray-background">

                                            <p class="text-background/70 text-sm pt-2 px-4">Actions - {{ $learnContent->title }}</p>

                                            <div class="flex flex-col divide-y divide-light-gray-background" aria-labelledby="dropdownButton">
                                                <a href="{{route('contents.learn.edit', ['learn' => $learnContent])}}" class="py-2 px-4 hover:bg-off-white transition-all">Edit</a>
                                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                    class="delete-button w-full text-left py-2 px-4 hover:bg-off-white hover:text-red-500 transition-all m-0" type="button"
                                                    data-learn_content="{{ json_encode($learnContent) }}"
                                                    data-url="{{ route('contents.learn.destroy', ['learn' => $learnContent]) }}">
                                                    Delete
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
                                No instructors
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
            @if($learnContents->hasPages())
                <div class="card">
                    {{$learnContents->links()}}
                </div>
            @endif
        </div>
    </div>

    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 md:inset-0 h-screen w-screen bg-black/20 backdrop-blur-sm">
        <div class='flex flex-col bg-off-white p-5 h-fit rounded-lg min-w-[40vw] min-h-[10vh] max-h-[90vh] max-w-[60vw] gap-5 overflow-x-hidden overflow-y-auto'>
            <p id="modal-text"></p>
            <form method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" id="modal_id" name="learn_content_id">
                <div class="w-full flex justify-end gap-2">
                    <button type="button" class="outline-button" data-modal-hide="popup-modal">
                        Cancel
                    </button>
                    <button type="submit" class="primary-button">
                        Delete
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const deleteButtons = document.querySelectorAll('.delete-button');
        const modalText = document.querySelector('#modal-text');
        const modalIdField = document.querySelector('#modal_id');
        
        deleteButtons.forEach(button => {
            const learn_content = JSON.parse(button.dataset.learn_content);
            button.addEventListener('click', () => {
                modalText.innerText = "Are you sure you want to delete content \"" + learn_content.title + "\" ?";
                modalIdField.value = learn_content.id;

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