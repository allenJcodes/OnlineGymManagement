<?php

namespace App\Providers;

use App\Models\Attendance;
use App\Models\ContactDetail;
use App\Models\FAQ;
use App\Models\GymSession;
use App\Models\Instructor;
use App\Models\Inventory;
use App\Models\LearnContent;
use App\Models\Membership;
use App\Models\Payments;
use App\Models\Schedules;
use App\Models\Subscription;
use App\Models\SubscriptionType;
use App\Models\User;
use App\Policies\AttendancePolicy;
use App\Policies\ContactDetailPolicy;
use App\Policies\FAQPolicy;
use App\Policies\GymSessionPolicy;
use App\Policies\InstructorPolicy;
use App\Policies\InventoryPolicy;
use App\Policies\LearnContentPolicy;
use App\Policies\MembershipPolicy;
use App\Policies\PaymentsPolicy;
use App\Policies\SchedulesPolicy;
use App\Policies\SubscriptionPolicy;
use App\Policies\SubscriptionTypePolicy;
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
        SubscriptionType::class => SubscriptionTypePolicy::class,
        Inventory::class => InventoryPolicy::class,
        Schedules::class => SchedulesPolicy::class,
        Payments::class => PaymentsPolicy::class,
        Attendance::class => AttendancePolicy::class,
        LearnContent::class => LearnContentPolicy::class,
        GymSession::class => GymSessionPolicy::class,
        FAQ::class => FAQPolicy::class,
        ContactDetail::class => ContactDetailPolicy::class
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
