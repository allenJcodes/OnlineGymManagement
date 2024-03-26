@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">
        <div class="flex items-start w-full justify-between">

            <h1 class="text-2xl font-bold">Subscriptions</h1>
            <button class="primary-button disabled:outline-button subscribe-button" @if($isActive) disabled @endif type="button" data-modal-target="sub-popup-modal" data-modal-toggle="sub-popup-modal">
                Subscribe
            </button>
        </div>

        <div class="flex flex-col gap-2">
            <div class="card">
                <div class="flex w-full justify-between">
                    <h2 class="text-xl font-medium">Subscription List</h2>
                    {{-- form actions here --}}
                    <x-table-search />
                </div>

                <table class="table">
                    <thead>
                        <tr class="table-row">
                            <td class="py-2">
                                ID
                            </td>
                            <td class="py-2">
                                Type
                            </td>
                            <td class="py-2">
                                Start Date
                            </td>
                            <td class="py-2">
                                Next Due Date
                            </td>
                            <td class="py-2">
                                Amount
                            </td>
                            <td class="py-2">
                                Status
                            </td>
                            <td class="py-2">
                                Actions
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subs as $sub)
                            <tr class="table-row">
                                <td class="py-2">
                                    {{ $sub->id }}
                                </td>
                                <td class="py-2">
                                    {{ $sub->subscriptionTypes->name }}
                                </td>
                                <td class="py-2">
                                    {{ optional($sub->start_date)->format('Y-m-d') ?? '--' }}
                                </td>
                                <td class="py-2">
                                    {{ optional($sub->end_date)->format('Y-m-d') ?? '--' }}
                                </td>                                
                                <td class="py-2">
                                    ₱{{ $sub->subscriptionTypes->price }}
                                </td>
                                <td class="py-2">
                                    <div class="flex items-center">
                                       
                                        @if ($sub->status == 'Pending')
                                            <div class="h-2.5 w-2.5 rounded-full bg-orange-500 mr-2"></div>
                                            {{$sub->status}}
                                        @elseif (($sub->end_date < now()->format('Y-m-d')) | ($sub->status == 'Subscription Ended') || $sub->status == 'Cancelled' || $sub->status == 'Cancelled')
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                            {{$sub->status}}
                                        @elseif ($sub->endingSoon())
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
                                        class="primary-button qr-button" type="button"
                                        data-user="{{ json_encode($sub) }}"
                                        @if(!$sub->qr_code) disabled @endif
                                        >
                                        View QR
                                    </button>
                                </td>
            </div>
            </tr>
        @empty
            <tr>
                <td colspan="100%" class="text-center h-[10vh] bg-gray-100">
                    No subscriptions yet
                </td>
            </tr>
            @endforelse
            </tbody>
            </table>
        </div>

        @if ($subs->hasPages())
            <div class="card">
                {{ $subs->links() }}
            </div>
        @endif

    </div>
    </div>

            {{-- QR MODAL --}}
            <div id="qr-popup-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-screen w-screen bg-black/20 backdrop-blur-sm">

            @isset($sub)
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


        {{-- SUBSCRIBE MODAL --}}

        <div id="sub-popup-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-screen w-screen bg-black/20 backdrop-blur-sm">

            <div
                class='flex flex-col bg-off-white p-5 h-fit rounded-lg min-w-[30vw] min-h-[30vh] max-h-[90vh] max-w-[60vw] gap-5'>

                <div class="flex justify-center "><img src="{{ asset('images/logo.png') }}" alt="" width="100"
                        height="100"></div>

                <div class="flex flex-col gap-5">
                    <h2 class="text-lg font-bold">New Subscription</h2>

                    <form action="{{ route('subscription.store') }}" method="POST" class="w-full flex flex-col gap-3">
                        @csrf

                        <input id="user_id" name="user_id" value="{{ auth()->user()->id }}" type="hidden">

                        <div class="form-field-container">
                            <p class="form-label">Choose Subscription</p>
                            <div class="grid w-full gap-6 md:grid-cols-2">
                                @foreach ($subscriptions as $key => $subscription)
                                    <label for="membership{{ $key }}"
                                        class="group flex rounded-lg ring-1 ring-border py-2 px-4 gap-4 has-[:checked]:bg-dashboard-accent-light has-[:checked]:ring-dashboard-accent-base cursor-pointer group">
                                        <input type="radio" id="membership{{ $key }}" name="subscription_type_id"
                                            value="{{ $subscription->id }}" class="hidden">
                                        <div class="flex flex-col">
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
                            <label for="mode_of_payment" class="form-label">Select Mode of Payment</label>
                            <select id="mode_of_payment" name="mode_of_payment" class="form-input">
                                <option value="" selected disabled>Select mode of payment</option>
                                @foreach ($paymentModes as $paymentMode)
                                    @if($paymentMode->name == 'Cash') @continue @endif
                                    <option value="{{$paymentMode->name}}">{{$paymentMode->name}}</option>  
                                @endforeach
                            </select>
                        </div>

                        <div class="form-field-container">
                            <label for="reference_number" class="form-label">Reference Number </label>
                            <input id="reference_number" name="reference_number" type="text" class="form-input" required>
                        </div>

                        <div class="self-end flex gap-2">
                            <button type="button" class="outline-button" data-modal-hide="sub-popup-modal">
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

        <script>
            const viewQRButtons = document.querySelectorAll('.qr-button');
    
            viewQRButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const user = JSON.parse(button.dataset.user);
                    const qrImage = document.querySelector('#qr-image');
                    const qrDownloadLink = document.querySelector('#qr-download-link');
    
                    if (user.qr_code) {
                        qrImage.src = user.qr_code;
                        qrDownloadLink.href = user.qr_code;
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
