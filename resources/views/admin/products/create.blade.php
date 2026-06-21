<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                {{-- ERROR --}}
                @if ($errors->any())
                    <div class="mb-4">
                        @foreach ($errors->all() as $error)
                            <div class="py-2 px-4 mb-2 rounded-lg bg-red-500 text-white">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- NAME --}}
                    <div>
                        <x-input-label for="name" value="Name" />
                        <x-text-input id="name" name="name" type="text"
                            class="block mt-1 w-full"
                            value="{{ old('name') }}"
                            required autofocus />
                    </div>

                    {{-- TAGLINE --}}
                    <div class="mt-4">
                        <x-input-label for="tagline" value="Tagline" />
                        <x-text-input id="tagline" name="tagline" type="text"
                            class="block mt-1 w-full"
                            value="{{ old('tagline') }}" />
                    </div>

                    {{-- THUMBNAIL --}}
                    <div class="mt-4">
                        <x-input-label for="thumbnail" value="Thumbnail" />
                        <input id="thumbnail" type="file" name="thumbnail"
                            class="block mt-1 w-full border border-gray-300 rounded-lg p-2 bg-white"
                            accept="image/*" required>
                    </div>

                    {{-- ABOUT --}}
                    <div class="mt-4">
                        <x-input-label for="about" value="About" />
                        <textarea id="about" name="about" rows="5"
                            class="block mt-1 w-full border border-gray-300 rounded-xl p-3"
                            placeholder="Masukkan deskripsi produk..."></textarea>
                    </div>

                    {{-- SUBMIT --}}
                    <div class="flex items-center justify-end mt-6">
                        <x-primary-button>
                            Add New Product
                        </x-primary-button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>