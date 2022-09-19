<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

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
    <div class="flex flex-col justify-center min-h-full pt-16 pb-12 bg-white">
        <main class="flex flex-col justify-center flex-grow w-full px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-center flex-shrink-0">
                <a href="{{ route('web.index') }}" class="inline-flex">
                    <span class="sr-only">TailwindUI</span>
                    <img class="w-auto h-12"
                        src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600"
                        alt="TailwindUI">
                </a>
            </div>
            <div class="py-16">
                <div class="text-center">
                    <p class="mt-2 text-base text-gray-500">
                        @yield('content', null)
                    </p>
                    <div class="mt-6">
                        <a href="{{ route('web.index') }}"
                            class="text-base font-medium text-indigo-600 hover:text-indigo-500">Go back
                            home<span aria-hidden="true"> &rarr;</span></a>
                    </div>
                </div>
            </div>
        </main>
    </div>
    @vite(['resources/js/app.js'])
</body>

</html>
