<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Content') }}
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

                @php $isImage = \Illuminate\Support\Str::startsWith($content->value, ['cms/', 'banners/', 'thumbnails/']); @endphp

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-500 mb-1">Content Key</label>
                    <code class="text-lg bg-gray-100 px-3 py-2 rounded text-indigo-600 font-mono">{{ $content->key }}</code>
                </div>

                @if($isImage)
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-500 mb-2">Current Image</label>
                    <img src="{{ Storage::url($content->value) }}" class="w-64 h-48 object-cover rounded-xl border shadow-sm">
                    <p class="text-xs text-gray-400 mt-2">Path: {{ $content->value }}</p>
                </div>

                <form method="POST" action="{{ route('admin.contents.upload-image') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="key" value="{{ $content->key }}">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Replace Image</label>
                        <input type="file" name="image" accept="image/*" required
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    </div>
                    <div class="flex items-center gap-3">
                        <button type="submit" class="font-bold py-3 px-6 bg-indigo-700 text-white rounded-lg hover:bg-indigo-800 transition">
                            Upload Image
                        </button>
                        <a href="{{ route('admin.contents.index') }}" class="font-bold py-3 px-6 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                            Cancel
                        </a>
                    </div>
                </form>
                @else
                <form method="POST" action="{{ route('admin.contents.update', $content->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="value" class="block text-sm font-medium text-gray-700 mb-2">Value</label>
                        <textarea id="value" name="value" rows="6"
                                  class="w-full border-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-4 text-gray-700"
                                  placeholder="Enter text value">{{ $content->value }}</textarea>
                        <p class="text-xs text-gray-400 mt-1">You can use HTML tags for formatting.</p>
                    </div>

                    <div class="flex items-center gap-3">
                        <button type="submit" class="font-bold py-3 px-6 bg-indigo-700 text-white rounded-lg hover:bg-indigo-800 transition">
                            Update Content
                        </button>
                        <a href="{{ route('admin.contents.index') }}" class="font-bold py-3 px-6 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                            Cancel
                        </a>
                    </div>
                </form>
                @endif

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.contents.index') }}" class="text-indigo-600 hover:underline text-sm">
                        <i class="fa-solid fa-arrow-left mr-1"></i> Back to all content
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
