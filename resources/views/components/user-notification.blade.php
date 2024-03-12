<div class="flex flex-col">
    {{-- @dd($userNotifications) --}}

    @forelse ($userNotifications as $userNotification)
        <div class="flex flex-col p-2">
            <p class="text-xs text-dark-gray-800">Notification Type</p>
            <p>{{$userNotification->notification->content}}</p>
            <p class="text-xs">{{$userNotification->notification->created_at->format('h:m')}}</p>
        </div>
    @empty
        
    @endforelse
</div>