@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">

        <h1 class="text-2xl font-bold">Subscriptions</h1>

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
                                End Date
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
                                    {{ $sub->start_date->format('Y-m-d') }}
                                </td>
                                <td class="py-2">
                                    {{ $sub->end_date->format('Y-m-d') }}
                                </td>
                                <td class="py-2">
                                    ₱{{ $sub->subscriptionTypes->price }}
                                </td>
                                <td class="py-2">

                                    @if ($sub->endingSoon())
                                        <div
                                            class="py-1 px-3 text-sm w-min text-nowrap bg-orange-100 ring-1 ring-orange-500 text-orange-500 rounded-full">
                                            Subscription ending soon</div>
                                    @elseif ($user->subscriptions[0]->end_date < now()->format('Y-m-d'))
                                        <div
                                            class="py-1 px-3 text-sm w-min text-nowrap bg-red-100 ring-1 ring-red-500 text-red-500 rounded-full">
                                            Subscription ended</div>
                                    @else
                                        <div
                                            class="py-1 px-3 text-sm w-min text-nowrap bg-green-100 ring-1 ring-green-500 text-green-500 rounded-full">
                                            Subscribed</div>
                                    @endif
                                </td>

                                <td>
                                    <div class="flex gap-2 items-center w-full">
                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                            class="primary-button subscribe-button" type="button"
                                            data-id="{{ json_encode($sub) }}">
                                            View QR
                                        </button>

                                        <button 
                                            class="primary-button subscribe-button" type="button"
                                            data-id="{{ json_encode($sub) }}">
                                            Renew Subscription
                                        </button>
                                    </div>
                                </td>
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


    <div id="popup-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-screen w-screen bg-black/20 backdrop-blur-sm">

        <div
            class='flex flex-col bg-off-white p-5 h-fit rounded-lg min-w-[30vw] min-h-[30vh] max-h-[90vh] max-w-[60vw] gap-5'>

            <div class="flex justify-center "> <img src="{{ asset($sub->qr_code ?? 'No QR Code') }}" alt=""> </div>

            <div class="flex flex-col gap-5">
                <div class="self-end flex gap-2">
                    <button type="button" class="outline-button" data-modal-hide="popup-modal">
                        Close
                    </button>

                    <a href="{{ asset($sub->qr_code) }}" download="qr_code.png" class="primary-button">
                        Download</a>
                </div>
            </div>

        </div>
    </div>
@endsection
