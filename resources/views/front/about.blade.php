@extends('front.layouts.app')

@section('title', __('about.meta_title'))
@section('meta_description', __('about.meta_description'))

@section('content')
<main>
  {{-- HEADER --}}
  <div id="header" class="bg-[#F6F7FA] relative">
    <div class="w-full bg-white shadow-sm border-b border-gray-200">
      <x-navbar />
    </div>

    <div class="container max-w-[1130px] mx-auto px-4">
      <section class="flex flex-col gap-8 items-center py-12 md:py-20">

        {{-- Breadcrumb --}}
        <nav aria-label="Breadcrumb" class="text-sm">
          <ol class="flex items-center gap-3 text-cp-light-grey">
            <li>
              <a href="{{ route('front.index') }}" class="hover:text-cp-dark-blue">
                {{ __('about.breadcrumb_home') }}
              </a>
            </li>
            <li class="opacity-60">/</li>
            <li class="text-cp-black font-semibold">
              {{ __('about.breadcrumb_about') }}
            </li>
          </ol>
        </nav>

        {{-- Title --}}
        <section class="text-center">
          <h1 class="text-4xl md:text-5xl font-extrabold">
            {{ __('about.hero_title') }}
          </h1>
          <p class="mt-3 text-cp-light-grey max-w-2xl mx-auto">
            {{ __('about.hero_desc') }}
          </p>
        </section>

      </section>
    </div>
  </div>

  {{-- ABOUT BLOCKS --}}
  <section class="container max-w-[1130px] mx-auto px-4 flex flex-col gap-16 mt-10">

    @forelse($abouts as $about)
      <article class="flex flex-col lg:flex-row gap-8">

        <div class="w-full lg:w-1/2">
          @php $aboutThumbExists = $about->thumbnail && Storage::disk('public')->exists($about->thumbnail); @endphp
          <img src="{{ $aboutThumbExists ? Storage::url($about->thumbnail) : asset('assets/Images/Diversifikasi.png') }}" class="rounded-xl w-full">
        </div>

        <div class="w-full lg:w-1/2">
          <h2 class="text-2xl font-bold">{{ $about->name }}</h2>

          @if($about->keypoints && $about->keypoints->count())
            <ul class="mt-4 space-y-2">
              @foreach($about->keypoints as $keypoint)
                <li>{{ $keypoint->keypoint }}</li>
              @endforeach
            </ul>
          @endif

        </div>

      </article>
    @empty
      <p class="text-center text-gray-400">
        {{ __('about.empty_state') }}
      </p>
    @endforelse

  </section>

  {{-- BUSINESS PLAN --}}
  <section class="container max-w-[1130px] mx-auto px-4 mt-16">

    <h2 class="text-3xl font-bold text-center mb-10">
      {{ __('about.bp_title') }}
    </h2>

    <div class="grid md:grid-cols-3 gap-6">
      @foreach([
        ['assets/Images/Team.png', __('about.bp1_title'), __('about.bp1_desc')],
        ['assets/Images/Team2.png', __('about.bp2_title'), __('about.bp2_desc')],
        ['assets/Images/Team4.png', __('about.bp3_title'), __('about.bp3_desc')],
      ] as $bp)

      <div class="border rounded-xl overflow-hidden">
        <img src="{{ asset($bp[0]) }}" class="w-full h-40 object-cover">
        <div class="p-4">
          <h3 class="font-bold">{{ $bp[1] }}</h3>
          <p class="text-sm text-gray-500">{{ $bp[2] }}</p>
        </div>
      </div>

      @endforeach
    </div>

  </section>
</main>

<x-footer/>
@endsection


{{-- JSON STRUCTURED DATA --}}
@push('structured_data')
<script type="application/ld+json">
@php
$breadcrumbData = [
  '@context' => 'https://schema.org',
  '@type' => 'BreadcrumbList',
  'itemListElement' => [
    [
      '@type' => 'ListItem',
      'position' => 1,
      'name' => __('about.breadcrumb_home'),
      'item' => route('front.index')
    ],
    [
      '@type' => 'ListItem',
      'position' => 2,
      'name' => __('about.breadcrumb_about'),
      'item' => url()->current()
    ]
  ]
];
echo json_encode($breadcrumbData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
@endphp
</script>
@endpush

@push('structured_data')
<script type="application/ld+json">
@php
$orgData = [
  '@context' => 'https://schema.org',
  '@type' => 'Organization',
  'name' => 'PT Abadi Banua Cemerlang',
  'url' => route('front.index'),
  'logo' => asset('assets/logo/sinarmax.png'),
  'sameAs' => [
    'https://www.youtube.com/',
    'https://wa.me/',
    'https://facebook.com/',
    'https://instagram.com/'
  ]
];
echo json_encode($orgData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
@endphp
</script>
@endpush


@push('after-scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
@endpush