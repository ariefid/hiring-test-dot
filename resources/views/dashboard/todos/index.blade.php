@extends('layouts.authentication')

@section('title', $title)

@section('content')
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Your Todo's</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all todo's.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <button x-on:click="location.href = '{{ route('web.dashboard.todos.create') }}'" type="button"
                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                todo</button>
        </div>
    </div>
    <div class="flex flex-col mt-8">
        <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-300">

                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    Title
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Description
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Status
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Private?
                                </th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">

                            @if (count($todos))
                                @foreach ($todos as $index => $todo)
                                    <tr class="{{ $index % 2 === 0 ? '' : 'bg-gray-50' }}"
                                        x-description="{{ $index % 2 === 0 ? 'Odd' : 'Even' }} row">
                                        <td
                                            class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                            <p class="w-64 overflow-hidden truncate">
                                                {{ $todo->name }}
                                            </p>
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            <p class="w-64 overflow-hidden truncate">
                                                {{ $todo->description }}
                                            </p>
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            <p>
                                                {{ $todo->state->value }}
                                            </p>
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            @if ($todo->is_private)
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-5 h-5 text-green-400">
                                                    <path fill-rule="evenodd"
                                                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-5 h-5 text-red-900">
                                                    <path fill-rule="evenodd"
                                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm3 10.5a.75.75 0 000-1.5H9a.75.75 0 000 1.5h6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            <div class="relative inline-flex rounded-md shadow-sm">
                                                <div x-data="{ open: false }" x-init="open = false"
                                                    @keydown.escape.stop="open = false" @click.away="open = false"
                                                    class="relative block -ml-px">
                                                    <button type="button"
                                                        class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                                                        id="option-menu-button" x-ref="button" @click="open = ! open"
                                                        @keyup.space.prevent="open = false"
                                                        @keydown.enter.prevent="open = false" aria-expanded="true"
                                                        aria-haspopup="true" x-bind:aria-expanded="open.toString()">
                                                        <span class="sr-only">Open options</span>
                                                        <svg class="w-5 h-5"
                                                            x-description="Heroicon name: solid/chevron-down"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>

                                                    <div x-show="open"
                                                        x-transition:enter="transition ease-out duration-100"
                                                        x-transition:enter-start="transform opacity-0 scale-95"
                                                        x-transition:enter-end="transform opacity-100 scale-100"
                                                        x-transition:leave="transition ease-in duration-75"
                                                        x-transition:leave-start="transform opacity-100 scale-100"
                                                        x-transition:leave-end="transform opacity-0 scale-95"
                                                        class="absolute right-0 z-40 w-56 mt-2 -mr-1 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                        x-ref="menu-items"
                                                        x-description="Dropdown menu, show/hide based on menu state."
                                                        role="menu" aria-orientation="vertical"
                                                        aria-labelledby="option-menu-button" tabindex="-1"
                                                        @keydown.tab="open = false" @keydown.enter.prevent="open = false"
                                                        @keyup.space.prevent="open = false">
                                                        <div class="py-1" role="none">

                                                            <a href="{{ route('web.dashboard.todos.show', ['id' => $todo->uuid]) }}"
                                                                class="block px-4 py-2 text-sm text-gray-700"
                                                                x-data="{ activeIndex: -1 }"
                                                                :class="{
                                                                    'bg-gray-100 text-gray-900': activeIndex ===
                                                                        0,
                                                                    'text-gray-700': !(activeIndex === 0)
                                                                }"
                                                                role="menuitem" tabindex="-1" id="option-menu-item-0"
                                                                @mouseenter="activeIndex = 0"
                                                                @mouseleave="activeIndex = -1" @click="open = false">
                                                                View
                                                            </a>

                                                            <a href="{{ route('web.dashboard.todos.edit', ['id' => $todo->uuid]) }}"
                                                                class="block px-4 py-2 text-sm text-gray-700"
                                                                x-data="{ activeIndex: -1 }"
                                                                :class="{
                                                                    'bg-gray-100 text-gray-900': activeIndex ===
                                                                        1,
                                                                    'text-gray-700': !(activeIndex === 1)
                                                                }"
                                                                role="menuitem" tabindex="-1" id="option-menu-item-1"
                                                                @mouseenter="activeIndex = 1"
                                                                @mouseleave="activeIndex = -1" @click="open = false">
                                                                Edit
                                                            </a>

                                                            <form
                                                                action="{{ route('web.dashboard.todos.destroy', ['id' => $todo->uuid]) }}"
                                                                method="POST" class="block">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    class="flex justify-start w-full px-4 py-2 text-sm text-gray-700"
                                                                    x-data="{ activeIndex: -1 }"
                                                                    :class="{
                                                                        'bg-gray-100 text-gray-900': activeIndex ===
                                                                            2,
                                                                        'text-gray-700': !(activeIndex === 2)
                                                                    }"
                                                                    role="menuitem" tabindex="-1"
                                                                    id="option-menu-item-2" @mouseenter="activeIndex = 2"
                                                                    @mouseleave="activeIndex = -1" @click="open = false">
                                                                    Delete
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>

                                                </div>
                                                </d>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5"
                                        class="py-4 pl-4 pr-3 text-sm font-medium text-center text-gray-900 whitespace-nowrap sm:pl-6">
                                        List empty
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>

                </div>
                <div class="mt-4">
                    @if (count($todos))
                        {{ $todos->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
