@extends('layouts.authentication')

@section('title', $title)

@section('content')
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Todo's</h1>
            <p class="mt-2 text-sm text-gray-700">A list of public todo's.</p>
        </div>
    </div>
    <div class="flex flex-col mt-8">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">

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
                                    by user
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
                                            <p class="w-64 overflow-hidden truncate">
                                                {{ $todo->user->username }}
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3"
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
