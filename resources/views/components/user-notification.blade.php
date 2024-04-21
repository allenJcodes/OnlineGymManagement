<button type="button" data-dropdown-toggle="notification-dropdown"
    class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
    <span class="sr-only">View notifications</span>
    <!-- Bell icon -->

    <div class="relative">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
            <path
                d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z" />
        </svg>

        @if ($userNotifications->count())
            <p class="absolute  bottom-[45%] left-[45%] flex items-center justify-center text-white text-xs rounded-full size-5 bg-red-500">
                {{$userNotifications->count()}}
            </p>
        @endif

    </div>
</button>

<!-- Dropdown menu -->
<div class="hidden overflow-hidden bg-white rounded-b-md shadow-md max-w-[30vw]" id="notification-dropdown">
    <div class="flex flex-col p-2 overflow-y-auto max-h-[70vh]">
        <p class="text-base font-medium text-left w-full">
            Notifications
        </p>

        <div class="flex flex-col ">
            @forelse ($userNotifications as $userNotification)
                <div class="flex flex-col p-2">
                    <p class="text-xs text-dark-gray-800">{{ $userNotification->notification->type }}</p>
                    <p>{{ $userNotification->notification->content }}</p>
                    <p class="text-xs">{{ $userNotification->notification->created_at->format('h:i') }}</p>
                </div>
            @empty
                <p>There are no new notifications.</p>
            @endforelse



            @if (count($userNotifications))
                <a href="{{ route('clearNotifications') }}" class="outline-button text-center">Clear Notifications</a>
            @endif
        </div>
    </div>
</div>
