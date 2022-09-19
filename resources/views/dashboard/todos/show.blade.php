@extends('layouts.authentication')

@section('title', $title)

@section('content')
    <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
        <div
            class="max-w-sm px-3 py-2 border border-gray-300 rounded-md shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 sm:col-span-6">
            <label for="name" class="block text-xs font-medium text-gray-900">
                Name
            </label>
            <div class="mt-1">
                <p class="text-sm">
                    {{ $todo->name }}
                </p>
            </div>
        </div>

        <div
            class="px-3 py-2 border border-gray-300 rounded-md shadow-sm max-w-7xl focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 sm:col-span-6">
            <label for="description" class="block text-xs font-medium text-gray-900">
                Description
            </label>
            <div class="mt-1">
                <p class="text-sm">
                    {{ $todo->description }}
                </p>
            </div>
        </div>

        <div
            class="max-w-sm px-3 py-2 border border-gray-300 rounded-md shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 sm:col-span-3">
            <label for="is_private" class="block text-xs font-medium text-gray-900">
                Private?
            </label>
            <div class="mt-1">
                <p class="text-sm">
                    @if ($todo->is_private)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-5 h-5 text-green-400">
                            <path fill-rule="evenodd"
                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                clip-rule="evenodd" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-5 h-5 text-red-900">
                            <path fill-rule="evenodd"
                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm3 10.5a.75.75 0 000-1.5H9a.75.75 0 000 1.5h6z"
                                clip-rule="evenodd" />
                        </svg>
                    @endif
                </p>
            </div>
        </div>

        <div
            class="max-w-sm px-3 py-2 border border-gray-300 rounded-md shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 sm:col-span-3">
            <label for="state" class="block text-xs font-medium text-gray-900">
                Status
            </label>
            <div class="mt-1">
                <p class="text-sm">
                    {{ $todo->state->value }}
                </p>
            </div>
        </div>

    </div>

    <div class="py-4">
        <div class="flex justify-end" x-data="">
            <button x-on:click="location.href = '{{ route('web.dashboard.todos.index') }}'" type="button"
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Back
            </button>
        </div>
    </div>
@endsection
