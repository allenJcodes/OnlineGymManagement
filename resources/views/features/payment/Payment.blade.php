@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">
        {{-- @dd(session('toast')) --}}
        <div class="flex items-start w-full justify-between">
            <h1 class="text-2xl font-bold">Payments</h1>
            @if (Auth::user()->user_role == '1')
                <a href="{{ route('manage.payment_modes.index') }}" class="primary-button">
                    Manage Payment Modes</a>
            @endif
        </div>

        <div class="flex flex-col gap-2">

            <div class="card">
                <div class="flex w-full justify-between">
                    <h2 class="text-xl font-medium">Payments List</h2>
                    {{-- form actions here --}}

                    <div class="flex gap-2 self-end">
                        <a target="_blank" href="{{ route('payments.print') }}" class="primary-button">Print Reports</a>
                        <x-table-search model="Payment" />
                    </div>
                </div>

                <div class="flex w-full justify-end">
                    <form action="" id="date_filter_form" class="flex gap-2 h-fit w-fit items-end">
                        <div class="form-field-container mt-3">
                            <label for="date" class="form-label">Date Filter</label>
                            <input id="date" type="date" name="date" class="form-input rounded-lg" value="{{request()->date ?? ''}}">
                        </div>
                    </form>
                </div>
                
                <table class="table">
                    <thead>
                        <tr class="table-row">
                            <td class="py-2">
                                Date Paid
                            </td>
                            <td class="py-2">
                                Customer
                            </td>
                            <td class="py-2">
                                Subscription Type
                            </td>
                            <td class="py-2">
                                Amount Paid
                            </td>
                            <td class="py-2">
                                Mode of Payment
                            </td>
                            <td class="py-2">
                                Reference Number
                            </td>
                            <td class="py-2">
                                Status
                            </td>
                            @if (Auth::user()->user_role == '1')
                                <td class="py-2">
                                    Action
                                </td>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payments as $payment)
                            <tr class="table-row">
                                <td class="py-2">
                                    {{ $payment->created_at->format('Y-m-d h:i A') }}
                                </td>
                                <td class="py-2">
                                    {{ $payment->subscriptions->user->full_name }}
                                </td>
                                <td class="py-2">
                                    {{ $payment->subscriptions->subscriptionTypes->name }}
                                </td>
                                <td class="py-2">
                                    ₱{{ $payment->amount_paid }}
                                </td>
                                <td class="py-2">
                                    {{ $payment->mode_of_payment }}
                                </td>
                                <td class="py-2">
                                    {{ $payment->reference_number ?? '--' }}
                                </td>
                                <td class="py-2">
                                    {{ $payment->status }}
                                </td>
                                @if (Auth::user()->user_role == '1')
                                    <td class="py-2">
                                        <div class="flex items-center w-full">
                                            <div class="text-left">
                                                <button id="dropdownButton" data-dropdown-toggle="toggle{{ $payment->id }}"
                                                    class="" type="button">
                                                    <span class="sr-only">Open dropdown</span>
                                                    <svg class="h-4 w-4" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 16 3">
                                                        <path
                                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                    </svg>
                                                </button>
                                            </div>

                                            <div id="toggle{{ $payment->id }}"
                                                class="z-10 hidden bg-white border border-light-gray-background text-background rounded-md !min-w-[8vw]">

                                                <div class="flex flex-col gap-2 divide-y divide-light-gray-background">

                                                    <p class="text-background/70 text-sm pt-2 px-4 text-center">Actions</p>

                                                    <div class="flex flex-col divide-y divide-light-gray-background"
                                                        aria-labelledby="dropdownButton">

                                                        <button data-modal-target="popup-modal"
                                                            data-modal-toggle="popup-modal"
                                                            class="py-2 px-4 hover:bg-off-white transition-all edit-button
                                                            "
                                                            data-payment="{{ json_encode($payment) }}"
                                                            @if ($payment->status == 'Paid') disabled @endif>
                                                            Edit
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-screen w-screen bg-black/20 backdrop-blur-sm">
        <div
            class='flex flex-col bg-off-white p-5 h-fit rounded-lg min-w-[30vw] min-h-[30vh] max-h-[90vh] max-w-[60vw] gap-5'>
            <h2 class="text-lg font-bold">Update Payment Status</h2>
            <form action="{{ route('payments.updateStatus') }}" method="POST" class="w-full flex flex-col gap-3">
                {{-- @method('PUT') --}}
                @csrf

                <input id="payment_id" type="hidden" name="payment_id" value="">

                <div class="form-field-container">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-input">
                        <option value="Paid">Paid</option>
                        <option value="Verifying">Verifying</option>
                        <option value="Failed">Failed</option>
                    </select>
                </div>

                <div class="self-end flex gap-2">
                    <button type="button" class="outline-button" data-modal-hide="popup-modal">
                        Cancel
                    </button>
                    <button type="submit" class="primary-button">
                        Update Status
                    </button>
                </div>
            </form>


        </div>
    </div>

    <script>
        const editButtons = document.querySelectorAll('.edit-button');
        const paymentIdField = document.querySelector('#payment_id');
        const statusField = document.querySelector('#status');
        const filterForm = document.querySelector('#date_filter_form');
        const filterInputForm = document.querySelector('input#date');
        
        editButtons.forEach(button => {
            const payment = JSON.parse(button.dataset.payment);
            
            button.addEventListener('click', () => {
                paymentIdField.value = payment.id;
                statusField.value = payment.status;

                // statusField.querySelectorAll('option').forEach(option => {
                //     option.selected = option.value == payment.status
                // })
            });
        });

        filterInputForm.addEventListener('change', () => {
            filterForm.submit();
        })

    </script>
@endsection
