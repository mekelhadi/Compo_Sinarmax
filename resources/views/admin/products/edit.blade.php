<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Edit Product

        </h2>

    </x-slot>

    <div class="py-12">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                {{-- ERROR --}}
                @if ($errors->any())

                    <div class="mb-5 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg">

                        <ul class="list-disc ml-5">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="{{ route('admin.products.update', $product->id) }}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="space-y-5">

                    @csrf
                    @method('PUT')

                    {{-- PRODUCT NAME --}}
                    <div>

                        <label class="font-semibold">

                            Product Name

                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name', $product->name) }}"
                               class="w-full border rounded-lg px-4 py-3 mt-2">

                    </div>

                    {{-- TAGLINE --}}
                    <div>

                        <label class="font-semibold">

                            Tagline

                        </label>

                        <input type="text"
                               name="tagline"
                               value="{{ old('tagline', $product->tagline) }}"
                               class="w-full border rounded-lg px-4 py-3 mt-2">

                    </div>

                    {{-- CURRENT IMAGE --}}
                    <div>

                        <label class="font-semibold">

                            Current Image

                        </label>

                        <div class="mt-3">

                            <img src="{{ $product->thumbnail
                                ? Storage::url($product->thumbnail)
                                : asset('assets/Images/Team.png') }}"

                                class="w-[220px] h-[220px] object-cover rounded-xl border">

                        </div>

                    </div>

                    {{-- ABOUT --}}
                    <div>

                        <label class="font-semibold">

                            About

                        </label>

                        <textarea name="about"
                                  rows="5"
                                  class="w-full border rounded-lg px-4 py-3 mt-2">{{ old('about', $product->about) }}</textarea>

                    </div>

                    {{-- CHANGE IMAGE --}}
                    <div id="thumbnail">

                        <label class="font-semibold">

                            Change Product Image

                        </label>

                        <input type="file"
                               name="thumbnail"
                               class="w-full border rounded-lg px-4 py-3 mt-2">

                    </div>

                    {{-- BUTTON --}}
                    <div>

                        <button type="submit"
                                class="bg-indigo-700 hover:bg-indigo-800 text-white font-bold px-6 py-3 rounded-lg">

                            Update Product

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>