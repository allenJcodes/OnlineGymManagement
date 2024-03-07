<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageSubscriptionStoreRequest;
use App\Models\SubscriptionType;
use Illuminate\Http\Request;

class ManageSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = SubscriptionType::all();
        return view('features.manage_subscriptions.ManageSubscriptions', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.manage_subscriptions.AddSubscription');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageSubscriptionStoreRequest $request)
    {
        // dd($request->validated());
        SubscriptionType::create($request->validated());

        return redirect()->route('manage.subscription.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubscriptionType $subscription)
    {
        return view('features.manage_subscriptions.EditSubscription', compact('subscription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManageSubscriptionStoreRequest $request, SubscriptionType $subscription)
    {
        $subscription->update($request->validated());

        return redirect()->route('manage.subscription.edit', ['subscription' => $subscription]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscriptionType $subscription)
    {
        $subscription->delete();

        return redirect()->route('manage.subscription.index');
    }
}
