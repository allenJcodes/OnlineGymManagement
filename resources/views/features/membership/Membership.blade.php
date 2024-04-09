@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">

        <h1 class="text-2xl font-bold">Membership</h1>

        <div class="flex flex-col gap-2">

            <div class="card">

                <div class="flex w-full justify-between">
                    <h2 class="text-xl font-medium">Membership List</h2>
                    {{-- form actions here --}}
                    <x-table-search model="Membership" />
                </div>

                <table class="table">
                    <thead>
                        <tr class="table-row">
                            <td class="py-2">
                                Name
                            </td>
                            <td class="py-2">
                                Start Date
                            </td>
                            <td class="py-2">
                                End Date
                            </td>
                            <td class="py-2">
                                Status
                            </td>
                            <td class="py-2">
                                Image
                            </td>
                            <td class="py-2">
                                Action
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $userIndex => $user)
                            <tr class="table-row">
                                <td class="py-2">
                                    <div class="pl-3">
                                        <p class="font-semibold">{{ $user->full_name }}</p>
                                        <p class="font-normal text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </td>
                        
                                <td class="py-2">
                                    @if (!$user->active_subscription || !$user->active_subscription || ($user->active_subscription->end_date < now()->format('Y-m-d')) || ($user->active_subscription->status == 'Subscription Ended') || $user->active_subscription->status == 'Cancelled')
                                        --
                                    @else
                                        {{ $user->active_subscription->start_date->format('Y-m-d') }}
                                    @endif

                                </td>
                                <td class="py-2">
                                    @if (!$user->active_subscription || !$user->active_subscription || ($user->active_subscription->end_date < now()->format('Y-m-d')) || ($user->active_subscription->status == 'Subscription Ended') || $user->active_subscription->status == 'Cancelled')
                                        --
                                    @else
                                        {{ $user->active_subscription->end_date->format('Y-m-d') }}
                                    @endif
                                </td>
                                <td class="py-2">
                                    <div class="flex items-center">
                                        @if(!$user->active_subscription)
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                            Unsubscribed
                                        @elseif ($user->active_subscription->status == 'Pending')
                                            <div class="h-2.5 w-2.5 rounded-full bg-orange-500 mr-2"></div>
                                            {{$user->active_subscription->status}}
                                        @elseif (($user->active_subscription->end_date < now()->format('Y-m-d')) | ($user->active_subscription->status == 'Subscription Ended') || $user->active_subscription->status == 'Cancelled')
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                            {{$user->active_subscription->status}}
                                        @elseif ($user->active_subscription->endingSoon())
                                            <div class="h-2.5 w-2.5 rounded-full bg-orange-500 mr-2"></div>
                                            Subscription ending soon
                                        @else
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                            Subscribed
                                        @endif
                                    </div>
                                </td>
                                <td class="py-2">
                                    <button data-modal-target="qr-popup-modal" data-modal-toggle="qr-popup-modal"
                                        class="primary-button qr-button" type="button" data-user="{{ json_encode($user) }}"
                                        @empty($user->active_subscription->qr_code) disabled @endempty
                                        >
                                        View QR
                                    </button>
                                </td>
                                <td>
                                    @if ($user->active_subscription && $user->active_subscription->status == 'Pending')
                                        <a class="primary-button" href="{{route('payments.index')}}">Verify Payment</a>
                                    @elseif (!$user->active_subscription || ($user->active_subscription->end_date < now()->format('Y-m-d')) || ($user->active_subscription->status == 'Subscription Ended') || $user->active_subscription->status == 'Cancelled')
                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                            class="primary-button subscribe-button" type="button"
                                            data-user="{{ json_encode($user) }}">
                                            Subscribe
                                        </button>
                                    @else
                                        <form method="POST"
                                            action="{{ route('membership.cancel', ['id' => $user->active_subscription->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="outline-button">
                                                Unsubscribe
                                            </button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center h-[10vh] bg-gray-100">
                                    No Members
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        @if ($users->hasPages())
            <div class="card">
                {{ $users->links() }}
            </div>
        @endif
    </div>

    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 md:inset-0 h-screen w-screen bg-black/20 backdrop-blur-sm">

        <div class='flex flex-col bg-off-white p-5 h-fit rounded-lg min-w-[30vw] min-h-[30vh] max-h-[90vh] max-w-[60vw] gap-5 overflow-x-hidden overflow-y-auto'>

            <div class="flex justify-center ">
                <img src="{{ asset('images/logo.png') }}" alt="" width="100" height="100">
            </div>

            <div class="flex flex-col gap-5">
                <h2 class="text-lg font-bold">New Subscription</h2>

                <div class="form-field-container">
                    <p class="form-label">Subscriber's Name</p>
                    <h2 id="modal-fullname">-</h2>
                </div>

                <form action="{{ route('membership.store') }}" method="POST" class="w-full flex flex-col gap-3">
                    @csrf

                    <input id="user_id" name="user_id" type="hidden">

                    <div class="form-field-container">
                        <p class="form-label">Choose Subscription</p>
                        <div class="grid w-full gap-6 md:grid-cols-2">
                            @foreach ($subscriptions as $key => $subscription)

                                <label for="membership{{ $key }}"
                                    class="group flex rounded-lg ring-1 ring-border py-2 px-4 gap-4 has-[:checked]:bg-dashboard-accent-light has-[:checked]:ring-dashboard-accent-base cursor-pointer group">
                                    <input type="radio" id="membership{{ $key }}" name="subscription_type_id"
                                        value="{{ $subscription->id }}" class="hidden">
                                    <div class="flex flex-col">
                                        <p class="text-xs text-gray-400">{{ $subscription->name }} Subscription</p>
                                        <p class="w-full text-base font-semibold">
                                            {{ $subscription->number_of_months }}
                                            Month{{ $subscription->number_of_months > 1 ? 's' : '' }}
                                        </p>
                                        <p>P{{ $subscription->price }}</p>
                                        <p class="text-xs text-dark-gray-800">{{ $subscription->description }}</p>
                                    </div>
                                </label>

                            @endforeach
                        </div>
                    </div>

                    <div class="form-field-container">
                        <label for="mode_of_payment" class="form-label">Mode of Payment</label>
                        <select id="mode_of_payment" name="mode_of_payment" class="form-input">
                            <option value="" selected disabled>Select mode of payment</option>
                            @foreach ($paymentModes as $paymentMode)
                                <option value="{{$paymentMode->name}}">{{$paymentMode->name}}</option>  
                            @endforeach
                        </select>
                    </div>

                    <div class="form-field-container">
                        <label for="reference_number" class="form-label">Reference Number <span
                                class="text-dark-gray-800 text-xs italic ml-2">optional</span></label>
                        <input id="reference_number" name="reference_number" type="text" class="form-input">
                    </div>

                    <div class="self-end flex gap-2">
                        <button type="button" class="outline-button" data-modal-hide="popup-modal">
                            Cancel
                        </button>
                        <button type="submit" class="primary-button">
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    {{-- QR MODAL --}}
    <div id="qr-popup-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-screen w-screen bg-black/20 backdrop-blur-sm">

    @isset($user)
    <div
        class='flex flex-col bg-off-white p-5 h-fit rounded-lg min-w-[30vw] min-h-[30vh] max-h-[90vh] max-w-[60vw] gap-5'>
        <div class="flex justify-center ">
            <img id="qr-image" src="" alt="">
        </div>
        <div class="flex flex-col gap-5">
            <div class="self-end flex gap-2">
                <button type="button" class="outline-button" data-modal-hide="qr-popup-modal">
                    Close
                </button>

                <a id="qr-download-link" href="" download="qr_code.png" class="primary-button" disabled>
                    Download
                </a>
            </div>
        </div>
    </div>
    @endisset
    </div>


    <script>
        const subscribeButtons = document.querySelectorAll('.subscribe-button');

        const modalFullname = document.querySelector('#modal-fullname');
        const userIdField = document.querySelector('#user_id');

        subscribeButtons.forEach(button => {
            const user = JSON.parse(button.dataset.user);
            button.addEventListener('click', () => {
                modalFullname.innerText = user.full_name;
                userIdField.value = user.id
            });
        })

        const viewQRButtons = document.querySelectorAll('.qr-button');

        viewQRButtons.forEach(button => {
            button.addEventListener('click', () => {
                const user = JSON.parse(button.dataset.user);
                const qrImage = document.querySelector('#qr-image');
                const qrDownloadLink = document.querySelector('#qr-download-link');

                if (user.subscriptions.length > 0 && user.subscriptions[0].qr_code) {
                    qrImage.src = user.subscriptions[0].qr_code;
                    qrDownloadLink.href = user.subscriptions[0].qr_code;
                    qrDownloadLink.removeAttribute('disabled');
                } else {
                    qrImage.src = 'No QR Code';
                    qrDownloadLink.href = 'javascript:void(0);';
                    qrDownloadLink.setAttribute('disabled', 'disabled');
                }
            });
        });
    </script>
@endsection
