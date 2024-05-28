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
    <div class="flex flex-col gap-1">

        <div class=" flex gap-2 items-center mb-5">
            <img src="{{ asset('images/logo.png') }}"  class="size-[4rem]">
            <p class="font-bold">Japs Fitness Gym</p> 
        </div>
        <h1 class="font-bold">Payment Reports</h1>

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