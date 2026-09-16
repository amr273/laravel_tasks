<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- Left Side -->
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">

                    <a href="{{ route('categories.index') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>

                </div>


                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <!-- Dashboard - Admin Only -->
                    @if (Auth::check() && Auth::user()->is_admin)

                        <x-nav-link
                            href="{{ route('dashboard') }}"
                            :active="request()->routeIs('dashboard')">

                            {{ __('Dashboard') }}

                        </x-nav-link>

                    @endif


                    <!-- Categories -->
                    <x-nav-link
                        href="{{ route('categories.index') }}"
                        :active="request()->routeIs('categories.*')">

                        {{ __('Categories') }}

                    </x-nav-link>


                    <!-- Products -->
                    <x-nav-link
                        href="{{ route('products.index') }}"
                        :active="request()->routeIs('products.*')">

                        {{ __('Products') }}

                    </x-nav-link>

                </div>

            </div>


            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                @if (Auth::check())

                    <!-- User Dropdown -->
                    <div class="ms-3 relative">

                        <x-dropdown align="right" width="48">

                            <!-- Trigger -->
                            <x-slot name="trigger">

                                <span class="inline-flex rounded-md">

                                    <button
                                        type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">

                                        {{ Auth::user()->name }}

                                        <svg
                                            class="ms-2 -me-0.5 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />

                                        </svg>

                                    </button>

                                </span>

                            </x-slot>


                            <!-- Dropdown Content -->
                            <x-slot name="content">

                                <!-- Profile -->
                                <x-dropdown-link href="{{ route('profile.show') }}">

                                    {{ __('Profile') }}

                                </x-dropdown-link>


                                <!-- Logout -->
                                <div class="border-t border-gray-200"></div>

                                <form method="POST" action="{{ route('logout') }}">

                                    @csrf

                                    <x-dropdown-link
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">

                                        {{ __('Log Out') }}

                                    </x-dropdown-link>

                                </form>

                            </x-slot>

                        </x-dropdown>

                    </div>

                @else

                    <!-- Guest -->
                    <div class="flex items-center space-x-4">

                        <a
                            href="{{ route('login') }}"
                            class="text-sm text-gray-600 hover:text-gray-900">

                            Login

                        </a>


                        <a
                            href="{{ route('register') }}"
                            class="text-sm text-gray-600 hover:text-gray-900">

                            Register

                        </a>

                    </div>

                @endif

            </div>


            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">

                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24">

                        <!-- Menu Icon -->
                        <path
                            :class="{ 'hidden': open, 'inline-flex': !open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <!-- Close Icon -->
                        <path
                            :class="{ 'hidden': !open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </button>

            </div>

        </div>

    </div>


    <!-- Responsive Navigation Menu -->
    <div
        :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden">

        <!-- Navigation Links -->
        <div class="pt-2 pb-3 space-y-1">

            <!-- Dashboard - Admin Only -->
            @if (Auth::check() && Auth::user()->is_admin)

                <x-responsive-nav-link
                    href="{{ route('dashboard') }}"
                    :active="request()->routeIs('dashboard')">

                    {{ __('Dashboard') }}

                </x-responsive-nav-link>

            @endif


            <!-- Categories -->
            <x-responsive-nav-link
                href="{{ route('categories.index') }}"
                :active="request()->routeIs('categories.*')">

                {{ __('Categories') }}

            </x-responsive-nav-link>


            <!-- Products -->
            <x-responsive-nav-link
                href="{{ route('products.index') }}"
                :active="request()->routeIs('products.*')">

                {{ __('Products') }}

            </x-responsive-nav-link>

        </div>


        <!-- User Section -->
        @if (Auth::check())

            <div class="pt-4 pb-1 border-t border-gray-200">

                <!-- User Info -->
                <div class="px-4">

                    <div class="font-medium text-base text-gray-800">

                        {{ Auth::user()->name }}

                    </div>

                    <div class="font-medium text-sm text-gray-500">

                        {{ Auth::user()->email }}

                    </div>

                </div>


                <!-- User Links -->
                <div class="mt-3 space-y-1">

                    <!-- Profile -->
                    <x-responsive-nav-link
                        href="{{ route('profile.show') }}"
                        :active="request()->routeIs('profile.show')">

                        {{ __('Profile') }}

                    </x-responsive-nav-link>


                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <x-responsive-nav-link
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">

                            {{ __('Log Out') }}

                        </x-responsive-nav-link>

                    </form>

                </div>

            </div>

        @else

            <!-- Guest -->
            <div class="pt-4 pb-4 border-t border-gray-200">

                <x-responsive-nav-link href="{{ route('login') }}">

                    Login

                </x-responsive-nav-link>


                <x-responsive-nav-link href="{{ route('register') }}">

                    Register

                </x-responsive-nav-link>

            </div>

        @endif

    </div>

</nav>