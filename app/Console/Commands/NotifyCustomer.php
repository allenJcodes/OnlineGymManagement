<?php

namespace App\Console\Commands;

use App\Models\FAQ;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NotifyCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifyCustomer:weekly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notifies the customer 1 week before subscription due date';

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
            
            if(Carbon::parse($user->subscriptions[0]->end_date)->subWeek() == Carbon::parse(now()->format('Y-m-d'))) {
                Notification::create([
                    'content' => 'Your subscription will end next week.'
                ])->users()->attach($user->id);
            }
        }
    }
}
