<div class="flex flex-col">
    @forelse ($userNotifications as $userNotification)
        <div class="flex flex-col p-2">
            <p class="text-xs text-dark-gray-800">{{$userNotification->notification->type}}</p>
            <p>{{$userNotification->notification->content}}</p>
            <p class="text-xs">{{$userNotification->notification->created_at->format('h:i')}}</p>
        </div>
    @empty
        <p>There are no new notifications.</p>
    @endforelse

    
    
    @if(count($userNotifications))
        <a href="{{route('clearNotifications')}}" class="outline-button text-center">Clear Notifications</a>
    @endif
</div>