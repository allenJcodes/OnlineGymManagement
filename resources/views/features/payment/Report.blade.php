<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Report</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="flex flex-col">
        <h1>Payment Reports</h1>

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
                <tr>
                    <td colspan="100%" class="text-center h-[10vh] bg-gray-100">
                        No items
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

<script>
    window.addEventListener('load', () => {
        window.print();
        setTimeout(window.close, 500); 
    });
</script>
</html>