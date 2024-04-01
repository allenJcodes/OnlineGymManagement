<?php

namespace App\View\Components;

use App\Models\UserNotification as Notifications;
use Illuminate\View\Component;

class UserNotification extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $userNotifications;
    
    public function __construct()
    {
        $this->userNotifications = Notifications::with('notification')->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-notification');
    }
}
