<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UnsubscribeCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unsubscribe:customer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily checks to automatically unsubscribe customer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('user_role', 3)->get();

        foreach($users as $user) {
            if(!count($user->subscriptions)) {
                continue;
            }
            
            if(Carbon::parse($user->subscriptions[0]->end_date)->addDay() >= Carbon::parse(now()->format('Y-m-d'))) {
                $user->subscriptions[0]->update(['status' => 3]);
            }
        }
    }
}
