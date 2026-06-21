@extends('front.layouts.app')

@section('title', 'Products')

@section('content')

<div id="header" class="bg-[#F6F7FA] relative">
    <div class="w-full bg-white shadow-sm border-b border-gray-200">
        <x-navbar/>

        {{-- Breadcrumb + Page Title --}}
        <section class="flex flex-col gap-8 items-center py-12 md:py-20">
            <nav aria-label="Breadcrumb" class="text-sm">
                <ol class="flex items-center gap-3 text-cp-light-grey">
                    <li>
                        <a href="{{ route('front.index') }}" class="hover:text-cp-dark-blue">
                            Home
                        </a>
                    </li>
                    <li class="opacity-60">/</li>
                    <li class="text-cp-black font-semibold">
                        Products
                    </li>
                </ol>
            </nav>

            <div class="container max-w-[1130px] mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
                    Produk Kami
                </h1>
                <p class="mt-3 text-base md:text-lg text-cp-light-grey max-w-2xl mx-auto">
                    Berbagai produk berkualitas yang kami tawarkan
                </p>
            </div>
        </section>
    </div>
</div>

{{-- PRODUCTS --}}
<section class="container max-w-[1130px] mx-auto px-4 py-14">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($products as $product)

        <article class="bg-white border border-[#E8EAF2] rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">

            {{-- IMAGE --}}
            <div class="aspect-square bg-white overflow-hidden flex items-center justify-center">
                <img 
                    src="{{ $product->thumbnail 
                        ? asset('storage/' . $product->thumbnail) 
                        : asset('assets/products/NMAX-RF-200-Watt.jpg') }}"
                    alt="{{ $product->name }}"
                    class="w-full h-full object-contain p-4"
                    loading="lazy"
                >
            </div>

            {{-- CONTENT --}}
            <div class="p-6">
                <h2 class="text-lg font-bold">
                    {{ $product->name }}
                </h2>

                @if($product->tagline)
                <p class="mt-2 text-cp-light-grey">
                    {{ $product->tagline }}
                </p>
                @endif

                @if($product->about)
                <p class="mt-3 text-gray-700 text-sm">
                    {{ \Illuminate\Support\Str::limit($product->about, 100) }}
                </p>
                @endif
            </div>

        </article>

        @empty

        <p class="col-span-full text-center text-cp-light-grey py-10">
            Belum ada produk.
        </p>

        @endforelse

    </div>

</section>

<x-footer/>

@endsection