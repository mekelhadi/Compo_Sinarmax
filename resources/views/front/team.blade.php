@extends('front.layouts.app')

@section('title', __('products.meta_title'))
@section('meta_description', __('products.meta_description'))

@section('content')
  {{-- Header --}}
  <div id="header" class="bg-[#F6F7FA] relative">
    <div class="w-full bg-white shadow-sm border-b border-gray-200">
      <x-navbar/>

      {{-- Breadcrumb + Title --}}
      <section class="flex flex-col gap-8 items-center py-12 md:py-20">
        <nav aria-label="Breadcrumb" class="text-sm">
          <ol class="flex items-center gap-3 text-cp-light-grey">
            <li>
              <a href="{{ route('front.index') }}" class="hover:text-cp-dark-blue">
                {{ __('products.breadcrumb_home') }}
              </a>
            </li>
            <li class="opacity-60">/</li>
            <li class="text-cp-black font-semibold">
              {{ __('products.breadcrumb_products') }}
            </li>
          </ol>
        </nav>

        {{-- PRODUCTS --}}
        <section class="container max-w-[1130px] mx-auto px-4 py-14 text-center">
          <h1 class="text-4xl md:text-5xl font-extrabold">
            {{ __('products.page_title') }}
          </h1>
          <p class="mt-3 text-base md:text-lg text-cp-light-grey max-w-2xl mx-auto">
            {{ __('products.page_subtitle') }}
          </p>
        </section>

      </section> {{-- PENUTUP SECTION YANG SEBELUMNYA HILANG --}}
    </div>
  </div>

  {{-- Our Products --}}
  <section id="OurProducts"
    x-data="{
      active: 'all',
      set(cat){ this.active = cat; },
      isShown(el){
        if(this.active === 'all') return true;
        const cat = (el.dataset.cat || '').split(',').map(s => s.trim());
        return cat.includes(this.active);
      }
    }"
    class="container max-w-[1130px] mx-auto px-4 flex flex-col gap-6 mt-10">

    {{-- Filter --}}
    @php $btn = 'rounded-full px-4 py-2 border'; @endphp
    <div class="flex justify-center flex-wrap">
      <button @click="set('all')" :class="active==='all' ? 'bg-black text-white' : ''">All</button>
      <button @click="set('motorcycle')">Motorcycle</button>
      <button @click="set('vehicle')">Vehicle</button>
      <button @click="set('home')">Home</button>
    </div>

    {{-- Grid --}}
    <ul class="grid grid-cols-2 md:grid-cols-3 gap-4">

      <li data-cat="motorcycle" x-show="isShown($el)">
        <img src="{{ asset('assets/products/NMAX-RF Series.jpg') }}">
        <p>{{ __('products.p1_name') }}</p>
      </li>

      <li data-cat="vehicle" x-show="isShown($el)">
        <img src="{{ asset('assets/products/NMAX_RF_240 _Watt.jpg') }}">
        <p>{{ __('products.p7_name') }}</p>
      </li>

    </ul>
  </section>

  <x-footer/>
@endsection

@push('structured_data')
<script type="application/ld+json">
@php
$structuredData = [
  '@context' => 'https://schema.org',
  '@type' => 'ItemList',
  'itemListElement' => [
    ['@type' => 'ListItem', 'position' => 1, 'name' => __('products.p1_name')],
    ['@type' => 'ListItem', 'position' => 2, 'name' => __('products.p2_name')],
  ]
];
echo json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
@endphp
</script>
@endpush