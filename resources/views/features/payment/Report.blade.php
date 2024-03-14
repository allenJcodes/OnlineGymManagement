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
                        User
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
                        Start Date
                    </td>
                    <td class="py-2">
                        End Date
                    </td>
                </tr>
            </thead>
            <tbody>
                @forelse ($payments as $payment)
                <tr class="table-row">
                    <td class="py-2">
                        {{ $payment->subscriptions->user->full_name }}
                    </td>
                    <td class="py-2">
                        {{ $payment->subscriptions->subscriptionTypes->name }}
                    </td>
                    <td class="py-2">
                        {{ $payment->amount_paid }}
                    </td>
                    <td class="py-2">
                        {{ $payment->mode_of_payment }}
                    </td>
                    <td class="py-2">
                        {{ $payment->reference_number }}
                    </td>
                    <td class="py-2">
                        {{ $payment->subscriptions->start_date }}
                    </td>
                    <td class="py-2">
                        {{ $payment->subscriptions->end_date }}
                    </td> 
                </tr>
                @empty
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