<aside id="default-sidebar"
    class="fixed top-0 sm:top-14 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 shadow-md"
    aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-white">
        <ul>
            <li>
                <a href="{{ route('home') }}"
                    class="{{ request()->is('home*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }}  flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="whitespace-nowrap text-sm">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('scheduling.index') }}"
                    class=" {{ request()->is('scheduling*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }}  flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="whitespace-nowrap text-sm">Scheduling</span>
                </a>
            </li>

            <li>
                <a href="{{ route('equipment.index') }}"
                    class=" {{ request()->is('equipment*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="whitespace-nowrap text-sm">Equipments</span>
                </a>
            </li>

            @if (Auth::user()->user_role == '1')
                <li>
                    <a href="{{ route('inventory.index') }}"
                        class="{{ request()->is('inventory*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 20">
                            <path
                                d="M20 10H4v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8ZM9 13v-1h6v1c0 .6-.4 1-1 1h-4a1 1 0 0 1-1-1Z"
                                clip-rule="evenodd" />
                            <path d="M2 6c0-1.1.9-2 2-2h16a2 2 0 1 1 0 4H4a2 2 0 0 1-2-2Z" />
                        </svg>
                        <span class="whitespace-nowrap text-sm">Inventory</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('instructor.index') }}"
                        class="{{ request()->is('instructor*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 20">
                            <path
                                d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>
                        <span class="whitespace-nowrap text-sm">Instructors</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('manage.subscription.index') }}"
                        class="{{ request()->is('manage/subscription*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z" />
                        </svg>
                        <span class="whitespace-nowrap text-sm">Manage Subscriptions</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('membership.index') }}"
                        class="{{ request()->is('membership*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z" />
                        </svg>
                        <span class="whitespace-nowrap text-sm">Membership</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.index') }}"
                        class="{{ request()->is('user*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <svg class="w-5 h-5"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="whitespace-nowrap text-sm">Users</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('contents.index') }}"
                        class="{{ request()->is('contents*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M19 10H5c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-8c0-1.103-.897-2-2-2zM5 6h14v2H5zm2-4h10v2H7z">
                            </path>
                        </svg>

                        <span class="whitespace-nowrap text-sm">Contents</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('attendance.index') }}"
                        class="{{  request()->is('attendance*') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="whitespace-nowrap text-sm">Attendance</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->user_role != '2')
                <li>
                    <a href="{{ route('payments') }}"
                        class=" {{ Route::is('payments') ? 'font-medium bg-dashboard-accent-light text-dashboard-accent-base fill-dashboard-accent-base border-l-2 border-l-dashboard-accent-base' : 'text-gray-500 fill-gray-500' }} flex gap-3 items-center py-3 px-2 hover:text-dashboard-accent-base hover:bg-dashboard-accent-light transition-all">
                        <svg class="w-[22px] h-[22px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M4 5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H4Zm0 6h16v6H4v-6Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M5 14a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Zm5 0a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2h-5a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                          </svg>

                        <span class="whitespace-nowrap text-sm">Payments</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>


@yield('sidebar_content')
