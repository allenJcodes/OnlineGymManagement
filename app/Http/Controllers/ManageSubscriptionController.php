<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageSubscription\ManageSubscriptionStoreRequest;
use App\Models\SubscriptionType;
use App\Models\SubscriptionTypeInclusion;
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
        $subscriptions = SubscriptionType::with('inclusions')->paginate(10);
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
        $inclusions = collect($request->inclusions)->map(function($inclusion) {
            return (new SubscriptionTypeInclusion(['name' => $inclusion]));
        });

        SubscriptionType::create($request->validated())->inclusions()->saveMany($inclusions);

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
        $_subscription = SubscriptionType::find($subscription->id)->with('inclusions')->first();
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

        SubscriptionTypeInclusion::where('subscription_type_id', $subscription->id)->delete();
        $subscription->update($request->validated());

        $inclusions = collect($request->inclusions)->map(function($inclusion) {
            return (new SubscriptionTypeInclusion(['name' => $inclusion]));
        });

        $subscription->inclusions()->saveMany($inclusions);

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
