@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">

        
        <div class="flex items-start w-full justify-between ">
            <h1 class="text-2xl font-bold">Subscriptions Archives</h1>
        </div>

        <div class="flex flex-col gap-2">

            <div class="card">
                <div class="flex w-full justify-between">
                    <h2 class="text-xl font-medium">Subscriptions Archives List</h2>
                    {{-- form actions here --}}
                    <x-table-search model="Subscription"/>
                </div>

                <table class="table">
                    <thead >
                        <tr class="table-row">
                            <td class="py-2">
                                Subscription Name
                            </td>
                            <td class="py-2">
                                Price
                            </td>
                            <td class="py-2">
                                Duration
                            </td>
                            <td class="py-2">
                                Description
                            </td>
                            <td class="py-2">
                                Inclusions
                            </td>
                            <td class="py-2">
                                Action
                            </td>
                        </tr>
                    </thead>
        
                    <tbody>
                        
                        @if(count($subscriptions))
                            @foreach($subscriptions as $subscription) 

                                <tr class="table-row">
                                    <td class="py-2">{{$subscription->name}}</td>
                                    <td class="py-2">{{$subscription->price}}</td>
                                    <td class="py-2">{{ $subscription->duration }} {{$subscription->duration_type}}{{ $subscription->duration > 1 ? 's' : '' }}</td>
                                    <td class="my-2 max-w-[25vw] line-clamp-1" title="{{$subscription->description}}">{{$subscription->description}}</td>
                                    <td class="py-2" title="{{implode(', ', $subscription->inclusions->map(fn($inclusion) => $inclusion->name)->toArray()) }}">{{$subscription->inclusions_string}}</td>
                                    <td>
                                        <div class="flex items-center w-full">
                                            <div class="text-left">
                                                <button id="dropdownButton" data-dropdown-toggle="toggle{{ $subscription->id }}" class="" type="button">
                                                    <span class="sr-only">Open dropdown</span>
                                                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 16 3">
                                                        <path
                                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                    </svg>
                                                </button>
                                            </div>
    
                                            <div id="toggle{{ $subscription->id }}" class="z-10 hidden bg-white border border-light-gray-background text-background rounded-md !min-w-[8vw]">

                                                <div class="flex flex-col gap-2 divide-y divide-light-gray-background">

                                                    <p class="text-background/70 text-sm pt-2 px-4">Actions - {{$subscription->name}}</p>

                                                    <div class="flex flex-col divide-y divide-light-gray-background" aria-labelledby="dropdownButton">
                                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                            class="restore-button w-full text-left py-2 px-4 hover:bg-off-white hover:text-green-600 transition-all m-0" type="button"
                                                            data-manage_subscription="{{ json_encode($subscription) }}"
                                                            data-url="{{ route('archive.manage_subscriptions.restore', ['subscription' => $subscription]) }}">
                                                            Restore
                                                        </button>
                                                    </div>
                                                </div>
        
                                            </div>
                                        </div>

                                    </td>
                                </tr>

                            @endforeach
                        @else
                            <tr>
                                <td colspan="100%" class="text-center h-[10vh] bg-gray-100">
                                    No archived subscriptions
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>

            </div>

            @if($subscriptions->hasPages())
                <div class="card">
                    {{$subscriptions->links()}}
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
                <input type="hidden" id="modal_id" name="manage_subscription_id">
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
            const subscription = JSON.parse(button.dataset.manage_subscription);
            button.addEventListener('click', () => {
                modalText.innerText = "Are you sure you want to restore subscription \"" + subscription.name + "\" ?";
                modalIdField.value = subscription.id

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
