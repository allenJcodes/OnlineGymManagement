<aside id="default-sidebar"
    class="fixed top-14 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 shadow-md"
    aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-white">
        <ul>
            <li>
                <a href="{{ route('home') }}"
                    class="{{ request()->is('home*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }}  flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                    <box-icon type='solid' name='dashboard'></box-icon>
                    <span class="whitespace-nowrap text-sm">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('scheduling.index') }}"
                    class=" {{ request()->is('scheduling*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }}  flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                    <box-icon name='calendar-event' type='solid' ></box-icon>
                    <span class="whitespace-nowrap text-sm">Scheduling</span>
                </a>
            </li>

            <li>
                <a href="{{ route('equipment.index') }}"
                    class=" {{ request()->is('equipment*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                    <box-icon name='dumbbell' ></box-icon>
                    <span class="whitespace-nowrap text-sm">Equipments</span>
                </a>
            </li>

            @if (Auth::user()->user_role == '1')
                <li>
                    <a href="{{ route('inventory.index') }}"
                        class="{{ request()->is('inventory*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <box-icon type='solid' name='box'></box-icon>
                        <span class="whitespace-nowrap text-sm">Inventory</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('instructor.index') }}"
                        class="{{ request()->is('instructor*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <box-icon name='user-voice' type='solid' ></box-icon>
                        <span class="whitespace-nowrap text-sm">Instructors</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('manage.subscription.index') }}"
                        class="{{ request()->is('manage/subscription*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <box-icon type='solid' name='certification'></box-icon>
                        <span class="whitespace-nowrap text-sm">Manage Subscriptions</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('membership.index') }}"
                        class="{{ request()->is('membership*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <box-icon name='id-card' type='solid' ></box-icon>
                        <span class="whitespace-nowrap text-sm">Membership</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.index') }}"
                        class="{{ request()->is('user*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <box-icon name='group' type='solid' ></box-icon>
                        <span class="whitespace-nowrap text-sm">Users</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('contents.index') }}"
                        class="{{ request()->is('contents*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <box-icon name='collection' type='solid' ></box-icon>

                        <span class="whitespace-nowrap text-sm">Contents</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('attendance.index') }}"
                        class="{{  request()->is('attendance*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <box-icon name='badge-check' type='solid' ></box-icon>
                        <span class="whitespace-nowrap text-sm">Attendance</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->user_role == '3')
                <a href="{{ route('subscription.index') }}"
                    class="{{ request()->is('subscription*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                    <box-icon name='id-card' type='solid' ></box-icon>
                    <span class="whitespace-nowrap text-sm">Subscriptions</span>
                </a>
            @endif

            @if (Auth::user()->user_role != '2')
                <li>
                    <a href="{{ route('payments.index') }}"
                        class=" {{ (request()->is('payments*') || request()->is('manage/payment_modes')) ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <box-icon name='credit-card' type='solid' ></box-icon>

                        <span class="whitespace-nowrap text-sm">Payments</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->user_role == '1')
                <li>
                    <a href="{{ route('archive.index') }}"
                        class=" {{ (request()->is('archive*') || request()->is('manage/payment_modes')) ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <box-icon name='archive' type='solid' ></box-icon>

                        <span class="whitespace-nowrap text-sm">Archives</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>


@yield('sidebar_content')
