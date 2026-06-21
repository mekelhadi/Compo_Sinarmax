<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Products') }}
            </h2>
            <a href="{{ route('admin.products.create') }}"
               class="font-bold py-3 px-6 bg-indigo-700 hover:bg-indigo-800 text-white rounded-full transition">
               + Add New
            </a>
        </div>
    </x-slot>

    {{-- MAIN CONTENT --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- ALERT SUCCESS --}}
            @if(session('success'))
                <div class="mb-5 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            {{-- PRODUCT LIST CONTAINER --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col gap-y-5">
                
                @forelse($products as $product)
                    <div class="flex flex-col md:flex-row justify-between md:items-center border-b pb-5 gap-5">

                        {{-- LEFT SIDE: IMAGE & INFO --}}
                        <div class="flex flex-row items-center gap-x-4">
                            {{-- THUMBNAIL --}}
                            <img src="{{ $product->thumbnail ? Storage::url($product->thumbnail) . '?v=' . time() : asset('assets/Images/Team.png') }}"
                                 alt="{{ $product->name }}"
                                 class="rounded-xl object-cover w-[90px] h-[90px] border">

                            {{-- PRODUCT TEXT --}}
                            <div>
                                <h3 class="text-indigo-950 text-lg font-bold">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-gray-500 text-sm">
                                    {{ $product->tagline }}
                                </h3>
                            </div>
                        </div>

                        {{-- MIDDLE SIDE: DATE --}}
                        <div class="hidden md:block text-center">
                            <p class="text-slate-500 text-sm">Date</p>
                            <h3 class="text-indigo-950 text-md font-bold">
                                {{ $product->created_at->format('d M Y') }}
                            </h3>
                        </div>

                        {{-- RIGHT SIDE: ACTIONS (EDIT & DELETE) --}}
                        <div class="flex flex-row items-center gap-x-2">
                            {{-- EDIT BUTTON --}}
                            <a href="{{ route('admin.products.edit', $product->id) }}#thumbnail"
                               class="font-bold py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">
                               Edit
                            </a>

                            {{-- DELETE BUTTON --}}
                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin mau hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit"
                                        class="font-bold py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded-lg transition">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </div>
                @empty
                    {{-- EMPTY STATE --}}
                    <p class="text-center text-gray-500">
                        No products found.
                    </p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>