<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', null) @hasSection('title')
            -
        @endif {{ config('app.name') }}</title>

    @vite(['resources/css/app.css'])
</head>

<body class="h-full">
    <div class="min-h-[640px] bg-gray-100">
        <div x-data="{ open: false }" @keydown.window.escape="open = false">
            <div x-show="open" class="fixed inset-0 flex z-40 md:hidden"
                x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog"
                aria-modal="true">

                <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-linear duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-gray-600 bg-opacity-75"
                    x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state."
                    @click="open = false" aria-hidden="true">
                </div>

                <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in-out duration-300 transform"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                    x-description="Off-canvas menu, show/hide based on off-canvas menu state."
                    class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-gray-800">

                    <div x-show="open" x-transition:enter="ease-in-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        x-description="Close button, show/hide based on off-canvas menu state."
                        class="absolute top-0 right-0 -mr-12 pt-2">
                        <button type="button"
                            class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            @click="open = false">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" x-description="Heroicon name: outline/x"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex-shrink-0 flex items-center px-4">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                            alt="TailwindUI">
                    </div>
                    <div class="mt-5 flex-1 h-0 overflow-y-auto">
                        <nav class="px-2 space-y-1">
                            <a href="{{ route('web.dashboard.index') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                Dashboard
                            </a>

                            <a href="{{ route('web.dashboard.todos.index') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                Todo Application
                            </a>

                        </nav>
                    </div>
                </div>

                <div class="flex-shrink-0 w-14" aria-hidden="true">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </div>

            <!-- Static sidebar for desktop -->
            <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex-1 flex flex-col min-h-0 bg-gray-800">
                    <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                            alt="TailwindUI">
                    </div>
                    <div class="flex-1 flex flex-col overflow-y-auto">
                        <nav class="flex-1 px-2 py-4 space-y-1">

                            <a href="{{ route('web.dashboard.index') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                Dashboard
                            </a>

                            <a href="{{ route('web.dashboard.todos.index') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                Todo Application
                            </a>

                        </nav>
                    </div>
                </div>
            </div>
            <div class="md:pl-64 flex flex-col">
                <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow">
                    <button type="button"
                        class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden"
                        @click="open = true">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="h-6 w-6" x-description="Heroicon name: outline/menu-alt-2"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7"></path>
                        </svg>
                    </button>
                    <div class="flex-1 px-4 flex justify-between">
                        <div class="flex-1 flex">
                            &nbsp;
                        </div>

                        <div class="ml-4 flex items-center md:ml-6">
                            <!-- Profile dropdown -->
                            <div x-data="{ open: false }" x-init="open = false" @keydown.escape.stop="open = false"
                                @click.away="open = false" class="ml-3 relative">
                                <div>
                                    <button type="button"
                                        class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        id="user-menu-button" x-ref="button" @click="open = ! open"
                                        @keyup.space.prevent="open = false" @keydown.enter.prevent="open = false"
                                        aria-expanded="false" aria-haspopup="true"
                                        x-bind:aria-expanded="open.toString()">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                            alt="">
                                    </button>
                                </div>

                                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    x-ref="menu-items"
                                    x-description="Dropdown menu, show/hide based on menu state."role="menu"
                                    aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                                    @keydown.tab="open = false" @keydown.enter.prevent="open = false"
                                    @keyup.space.prevent="open = false">

                                    <a href="{{ route('web.user.change-password') }}"
                                        class="block px-4 py-2 text-sm text-gray-700"
                                        :class="{ 'bg-gray-100': activeIndex === 1 }" role="menuitem" tabindex="-1"
                                        id="user-menu-item-0" x-data="{ activeIndex: -1 }" @mouseenter="activeIndex = 1"
                                        @mouseleave="activeIndex = -1" @click="open = false ">Change Password</a>

                                    <a href="{{ route('web.authentication.logout') }}"
                                        class="block px-4 py-2 text-sm text-gray-700"
                                        :class="{ 'bg-gray-100': activeIndex === 1 }" role="menuitem" tabindex="-1"
                                        id="user-menu-item-1" x-data="{ activeIndex: -1 }" @mouseenter="activeIndex = 1"
                                        @mouseleave="activeIndex = -1" @click="open = false ">Sign out</a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <main class="flex-1">
                    <div class="py-6">
                        <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
                            <h1 class="text-2xl font-semibold text-gray-900">@yield('title', null)</h1>
                        </div>
                        <div class="px-4 py-4 mx-auto max-w-7xl sm:px-6 md:px-8">
                            @if ($errors->has('errorMessage'))
                                <div class="py-4">
                                    <x-alert.danger>
                                        <x-slot:title>{{ $errors->default->first('errorMessage') ?? null }}
                                        </x-slot:title>
                                        <x-slot:description>{{ $errors->default->first('errorDescription') ?? null }}
                                        </x-slot:description>
                                    </x-alert.danger>
                                </div>
                            @endif
                            @if (session('successMessage'))
                                <div class="py-4">
                                    <x-alert.success>
                                        <x-slot:title>{{ session('successMessage') ?? null }}</x-slot:title>
                                        <x-slot:description>{{ session('successDescription') ?? null }}
                                        </x-slot:description>
                                    </x-alert.success>
                                </div>
                            @endif
                            <div class="bg-white">
                                <div class="px-4 py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                    @yield('content', null)
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js'])
</body>

</html>
