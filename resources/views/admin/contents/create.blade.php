<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Content') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="py-3 w-full rounded-xl bg-red-500 text-white px-4 mb-3">{{ $error }}</div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.contents.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="key" class="block text-sm font-medium text-gray-700 mb-2">Content Key</label>
                        <input id="key" name="key" type="text" value="{{ old('key') }}" required
                               class="w-full border-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-4 text-gray-700"
                               placeholder="e.g. hero_heading, about_title, etc.">
                        <p class="text-xs text-gray-400 mt-1">Use snake_case format. This key will be used in the content() helper function.</p>
                    </div>

                    <div class="mb-4">
                        <label for="value" class="block text-sm font-medium text-gray-700 mb-2">Value</label>
                        <textarea id="value" name="value" rows="6"
                                  class="w-full border-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-4 text-gray-700"
                                  placeholder="Enter text value">{{ old('value') }}</textarea>
                    </div>

                    <div class="flex items-center gap-3">
                        <button type="submit" class="font-bold py-3 px-6 bg-indigo-700 text-white rounded-lg hover:bg-indigo-800 transition">
                            Create Content
                        </button>
                        <a href="{{ route('admin.contents.index') }}" class="font-bold py-3 px-6 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
