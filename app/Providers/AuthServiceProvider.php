<?php

namespace App\Providers;

use App\Models\Instructor;
use App\Models\Membership;
use App\Models\Subscription;
use App\Models\User;
use App\Policies\InstructorPolicy;
use App\Policies\MembershipPolicy;
use App\Policies\SubscriptionPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Membership::class => MembershipPolicy::class,
        Instructor::class => InstructorPolicy::class,
        Subscription::class => SubscriptionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
