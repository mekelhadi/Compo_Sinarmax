<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Site Content') }}
            </h2>
            <a href="{{ route('admin.contents.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New Content
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 px-6 py-4 bg-green-100 border border-green-200 text-green-700 rounded-xl font-medium">
                    <i class="fa-solid fa-check-circle mr-2"></i> {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="mb-6">
                    <p class="text-gray-500 text-sm">Manage text and image content for the landing page. Use the key-value pairs to override default content.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="pb-3 font-bold text-gray-600 uppercase text-xs tracking-wider">Key</th>
                                <th class="pb-3 font-bold text-gray-600 uppercase text-xs tracking-wider">Value</th>
                                <th class="pb-3 font-bold text-gray-600 uppercase text-xs tracking-wider">Type</th>
                                <th class="pb-3 font-bold text-gray-600 uppercase text-xs tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contents as $content)
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                                <td class="py-4 pr-4">
                                    <code class="text-sm bg-gray-100 px-2 py-1 rounded text-indigo-600 font-mono">{{ $content->key }}</code>
                                </td>
                                <td class="py-4 pr-4 max-w-xs">
                                    @if(\Illuminate\Support\Str::startsWith($content->value, ['cms/', 'banners/', 'thumbnails/']))
                                        <div class="flex items-center gap-3">
                                            <img src="{{ Storage::url($content->value) }}" class="w-16 h-16 object-cover rounded-lg border">
                                            <span class="text-sm text-gray-500 truncate">{{ basename($content->value) }}</span>
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-700 truncate">{{ $content->value ?? '-' }}</p>
                                    @endif
                                </td>
                                <td class="py-4 pr-4">
                                    @if(\Illuminate\Support\Str::startsWith($content->value, ['cms/', 'banners/', 'thumbnails/']))
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-700">Image</span>
                                    @else
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-700">Text</span>
                                    @endif
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.contents.edit', $content->id) }}"
                                           class="font-bold py-2 px-4 bg-indigo-600 text-white rounded-lg text-sm hover:bg-indigo-700 transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.contents.destroy', $content->id) }}" method="POST"
                                              onsubmit="return confirm('Delete this content entry?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-bold py-2 px-4 bg-red-500 text-white rounded-lg text-sm hover:bg-red-600 transition">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="py-10 text-center text-gray-400">
                                    <i class="fa-solid fa-inbox text-3xl mb-3 block"></i>
                                    No content entries yet. Click "Add New Content" to get started.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $contents->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
