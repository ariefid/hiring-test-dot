@extends('layouts.authentication')

@section('title', $title)

@section('content')
    <form action="{{ route('web.dashboard.todos.update', ['id' => $todo->uuid]) }}" method="POST"
        class="mx-auto space-y-8 divide-y divide-gray-200 max-w-7xl sm:px-6 lg:px-8">
        @csrf
        @method('put')
        <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div
                class="px-3 py-2 max-w-sm border {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 sm:col-span-6">
                <label for="name" class="block text-xs font-medium text-gray-900">
                    Name
                </label>
                <div class="mt-1">
                    <input type="text" name="name" id="name" value="{{ $todo->name }}" autocomplete="on" required
                        class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm">
                </div>
                @error('name')
                    <div class="mt-1">
                        <span class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">
                            {{ $message }}
                        </span>
                    </div>
                @enderror
            </div>

            <div
                class="overflow-hidden px-3 py-2 max-w-7xl border {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 sm:col-span-6">
                <label for="description" class="block text-xs font-medium text-gray-900">
                    Description
                </label>
                <div class="mt-1">
                    <textarea rows="4" name="description" id="description"
                        class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 resize-none focus:ring-0 sm:text-sm">{{ $todo->description }}</textarea>
                </div>
                @error('description')
                    <div class="mt-1">
                        <span class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">
                            {{ $message }}
                        </span>
                    </div>
                @enderror
            </div>

            <div class="max-w-sm px-3 py-2 border-none sm:col-span-3">
                <fieldset class="space-y-0">
                    <legend class="sr-only">Make Private</legend>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                            <input id="is_private" name="is_private" value="1" type="checkbox"
                                class="w-4 h-4 text-green-400 border-gray-300 rounded cursor-pointer focus:ring-green-300"
                                @checked($todo->is_private)>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_private" class="font-medium text-gray-700 cursor-pointer">Private</label>
                        </div>
                        @error('is_private')
                            <div class="mt-1">
                                <span class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>
                </fieldset>
            </div>

            <div class="max-w-sm px-3 py-2 border-none sm:col-span-3">
                <select name="state" id="state"
                    class="block w-full text-sm text-gray-700 transition ease-in-out bg-white bg-no-repeat border border-gray-300 border-solid rounded-md appearance-none cursor-pointer form-select font-sm bg-clip-padding focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <option selected>Status</option>
                    @if (count($todoState))
                        @foreach ($todoState as $state)
                            <option value="{{ $state->value }}" @selected($todo->state->value === $state->value)>{{ $state->value }}</option>
                        @endforeach
                    @endif
                </select>
                @error('state')
                    <div class="mt-1">
                        <span class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">
                            {{ $message }}
                        </span>
                    </div>
                @enderror
            </div>

        </div>

        <div class="py-4">
            <div class="flex justify-end" x-data="">
                <button x-on:click="location.href = '{{ route('web.dashboard.todos.index') }}'" type="button"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </button>
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update
                </button>
            </div>
        </div>
    </form>
@endsection
