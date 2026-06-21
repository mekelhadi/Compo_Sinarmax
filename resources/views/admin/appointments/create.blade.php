<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Appointment
        </h2>

    </x-slot>

    <div class="py-6">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                <form action="{{ route('admin.appointments.store') }}" method="POST">

                    @csrf

                    {{-- NAME --}}
                    <div class="mb-4">

                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Nama
                        </label>

                        <input type="text"
                               name="name"
                               class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200"
                               required>

                    </div>

                    {{-- EMAIL --}}
                    <div class="mb-4">

                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200"
                               required>

                    </div>

                    {{-- PHONE --}}
                    <div class="mb-4">

                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Nomor Telepon
                        </label>

                        <input type="text"
                               name="phone_number"
                               class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200"
                               required>

                    </div>

                    {{-- PRODUCT --}}
                    <div class="mb-4">

                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Produk
                        </label>

                        <select name="product_id"
                                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200">

                            <option value="">Pilih Produk</option>

                            @foreach($products as $product)

                                <option value="{{ $product->id }}">

                                    {{ $product->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- DATE --}}
                    <div class="mb-4">

                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Tanggal Meeting
                        </label>

                        <input type="date"
                               name="meeting_at"
                               class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200">

                    </div>

                    {{-- BRIEF --}}
                    <div class="mb-4">

                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Brief
                        </label>

                        <textarea name="brief"
                                  rows="5"
                                  class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200"></textarea>

                    </div>

                    {{-- BUTTON --}}
                    <div class="flex items-center gap-3">

                        <button type="submit"
                                class="px-5 py-2 bg-indigo-700 hover:bg-indigo-800 text-white font-semibold rounded-lg">

                            Simpan

                        </button>

                        <a href="{{ route('admin.appointments.index') }}"
                           class="px-5 py-2 bg-gray-300 hover:bg-gray-400 text-black font-semibold rounded-lg">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>