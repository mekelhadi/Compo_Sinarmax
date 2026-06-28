<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Appointments') }}
            </h2>
        </div>
    </x-slot>

    {{-- MAIN CONTENT --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- ALERT SUCCESS (Opsional, untuk menampilkan notifikasi setelah hapus) --}}
            @if(session('success'))
                <div class="mb-5 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                
                @forelse($appointments as $appointment)
                    <div class="item-card flex flex-col md:flex-row justify-between items-start md:items-center border-b pb-5 gap-5">
                        
                        {{-- LEFT SIDE: IMAGE & PRODUCT NAME --}}
                        <div class="flex flex-row items-center gap-x-3">
                            @if($appointment->product && $appointment->product->thumbnail)
                                <img src="{{ Storage::url($appointment->product->thumbnail) }}"
                                     alt="{{ $appointment->product->name }}"
                                     class="rounded-2xl object-cover w-[90px] h-[90px] border">
                            @else
                                <img src="{{ asset('assets/products/NMAX-RF-200-Watt.jpg') }}"
                                     alt="Custom Product"
                                     class="rounded-2xl object-cover w-[90px] h-[90px] border">
                            @endif

                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ $appointment->product->name ?? $appointment->other_product }}
                                </h3>
                                <p class="text-slate-500 text-sm">{{ $appointment->name }} &middot; {{ $appointment->email }}</p>
                            </div>
                        </div>

                        {{-- MIDDLE SIDE: DATE --}}
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Date</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{ optional($appointment->meeting_at)->format('d M Y') }}
                            </h3>
                        </div>

                        {{-- RIGHT SIDE: ACTIONS (DETAILS & DELETE) --}}
                        <div class="flex flex-row items-center gap-x-3">
                            {{-- BUTTON DETAILS --}}
                            <a href="{{ route('admin.appointments.show', $appointment) }}"
                               class="font-bold py-3 px-6 bg-indigo-700 hover:bg-indigo-800 text-white rounded-full transition">
                                Details
                            </a>

                            {{-- BUTTON EDIT --}}
                            <a href="{{ route('admin.appointments.edit', $appointment->id) }}"
                               class="font-bold py-3 px-6 bg-amber-500 hover:bg-amber-600 text-white rounded-full transition">
                                Edit
                            </a>

                            {{-- BUTTON DELETE --}}
                            <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus janji temu ini?')">
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" 
                                        class="font-bold py-3 px-6 bg-red-600 hover:bg-red-700 text-white rounded-full transition">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </div>
                @empty
                    {{-- EMPTY STATE --}}
                    <p class="text-center text-gray-500">Belum ada data terbaru</p>
                @endforelse

                {{-- PAGINATION --}}
                <div class="mt-4">
                    {{ $appointments->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>