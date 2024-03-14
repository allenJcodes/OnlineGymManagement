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
                    <form class="w-[30%]">
                        <input id="search" type="text" class="form-input text-sm w-full h-fit p-1.5" placeholder="Search something">
                    </form>
                </div>

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
        </div>
    </div>
@endsection