<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageSubscription\ManageSubscriptionStoreRequest;
use App\Http\Requests\ManageSubscription\ManageSubscriptionUpdateRequest;
use App\Models\Subscription;
use App\Models\SubscriptionType;
use App\Models\SubscriptionTypeInclusion;
use Illuminate\Http\Request;

class ManageSubscriptionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(SubscriptionType::class, 'subscription');    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = SubscriptionType::search()->with('inclusions')->paginate(10);
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

        SubscriptionType::create([...$request->validated(), 'best_option' => $request->best_option == 'on' ? 1 : 0])->inclusions()->saveMany($inclusions);

        return redirect()->route('manage.subscription.index')->with('toast', [
            'status' => 'success',
            'message' => 'Subscription added successfully.',
        ]);;
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
        $subscription = SubscriptionType::find($subscription->id)->with('inclusions')->first();
        return view('features.manage_subscriptions.EditSubscription', compact('subscription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManageSubscriptionUpdateRequest $request, SubscriptionType $subscription)
    {
        SubscriptionTypeInclusion::where('subscription_type_id', $subscription->id)->delete();
        $subscription->update([...$request->validated(), 'best_option' => $request->best_option == 'on' ? 1 : 0]);

        $inclusions = collect($request->inclusions)->map(function($inclusion) {
            return (new SubscriptionTypeInclusion(['name' => $inclusion]));
        });

        $subscription->inclusions()->saveMany($inclusions);

        return redirect()->route('manage.subscription.edit', ['subscription' => $subscription])->with('toast', [
            'status' => 'success',
            'message' => 'Subscription updated successfully.',
        ]);;
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

        return redirect()->route('manage.subscription.index')->with('toast', [
            'status' => 'success',
            'message' => 'Subscription deleted successfully.',
        ]);;
    }
}
