<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">

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
    <div class="flex min-h-full">
        <div class="relative flex-1 hidden w-0 lg:block">
            <img class="absolute inset-0 object-cover w-full h-full"
                src="https://images.unsplash.com/photo-1610360655260-decd32e267aa?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                alt="Unsplash Photo" />
        </div>
        <div class="flex flex-col justify-center flex-1 px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="w-full max-w-sm mx-auto lg:w-96">
                <div>
                    <img class="w-auto h-12" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                        alt="TailwindUI">
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">@yield('tagline', null)</h2>
                </div>

                @if ($errors->has('errorMessage'))
                    <div class="mt-8">
                        <x-alert.danger>
                            <x-slot:title>{{ $errors->default->first('errorMessage') ?? null }}</x-slot:title>
                            <x-slot:description>{{ $errors->default->first('errorDescription') ?? null }}
                            </x-slot:description>
                        </x-alert.danger>
                    </div>
                @endif
                @if (session('successMessage'))
                    <div class="mt-8">
                        <x-alert.success>
                            <x-slot:title>{{ session('successMessage') ?? null }}</x-slot:title>
                            <x-slot:description>{{ session('successDescription') ?? null }}</x-slot:description>
                        </x-alert.success>
                    </div>
                @endif
                <div class="mt-2">
                    @yield('content', null)
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js'])
</body>

</html>
