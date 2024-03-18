@extends('layouts.app')

@section('content')
    <div class="flex flex-col pt-16 gap-5 text-background">
        {{-- @dd(session('toast')) --}}
        <div class="flex items-start w-full justify-between">
            <h1 class="text-2xl font-bold">Payments</h1>
        </div>

        <div class="flex flex-col gap-2">

            <div class="card">
                <div class="flex w-full justify-between">
                    <h2 class="text-xl font-medium">Payments List</h2>
                    {{-- form actions here --}}

                    <div class="flex gap-2 self-end">
                        <a target="_blank" href="{{ route('payments.print') }}" class="primary-button">Print Reports</a>
                        <x-table-search />
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr class="table-row">
                            <td class="py-2">
                                Date
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

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payments as $payment)
                            <tr class="table-row">
                                <td class="py-2">
                                    {{ $payment->created_at->format('Y-m-d H:i A') }}
                                </td>
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

                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
