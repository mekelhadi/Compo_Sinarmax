@extends('front.layouts.app')

@section('title', __('home.meta_title'))
@section('meta_description', __('home.meta_description'))

@section('content')

  {{-- HERO --}}
  <section class="bg-white overflow-x-hidden">
    <div class="bg-white">
      {{-- Navbar --}}
      <x-navbar />

      <div class="container max-w-[1130px] mx-auto px-4 lg:px-0 py-10 lg:py-16">
        @forelse($hero_section as $hero)
          <div class="grid lg:grid-cols-2 gap-10 lg:gap-12 items-center">
            {{-- KIRI: Teks + CTA --}}
            <div class="order-2 lg:order-1 opacity-0 translate-x-[-50px] transition-all duration-1000 ease-out scroll-reveal">
              <input type="hidden" id="path_video" name="path_video" value="{{ $hero->path_video }}">

              <div class="inline-flex items-center bg-white px-4 py-2 gap-2 rounded-full border border-[#E8EAF2]">
                <p class="font-semibold text-sm">{{ $hero->achievement }}</p>
              </div>

              <div class="mt-4 space-y-3">
                <h1 class="font-extrabold text-[34px] leading-[42px] md:text-[44px] md:leading-[56px]">
                  {{ $hero->heading }}
                </h1>
                <p class="text-cp-light-grey leading-7 max-w-[520px]">
                  {{ $hero->subheading }}
                </p>
              </div>

              <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{ route('front.ourservice') }}"
                   class="bg-cp-dark-blue text-white px-6 py-3 rounded-xl font-bold hover:shadow-[0_12px_30px_0_#312ECB66] transition duration-300 transform hover:-translate-y-1">
                  {{ __('home.cta_services') }}
                </a>
                <a href="{{ route('front.about') }}"
                   class="px-6 py-3 rounded-xl font-bold border border-cp-dark-blue text-cp-dark-blue hover:bg-cp-dark-blue hover:text-white transition duration-300 transform hover:-translate-y-1">
                  {{ __('home.cta_explore') }}
                </a>
              </div>
            </div>

            {{-- KANAN: Banner --}}
            <figure class="order-1 lg:order-2 opacity-0 translate-x-[50px] transition-all duration-1000 ease-out scroll-reveal">
              <div class="rounded-2xl border border-[#E8EAF2] overflow-hidden bg-white shadow-sm hover:shadow-xl transition duration-500">
                <div class="aspect-[4/3] sm:aspect-[16/10] lg:aspect-[16/9] bg-[#F6F7FA]">
                  @php $bannerExists = $hero->banner && Storage::disk('public')->exists($hero->banner); @endphp
                  <img src="{{ $bannerExists ? Storage::url($hero->banner) : asset('assets/Images/Team2.png') }}"
                       alt="{{ __('home.hero_alt') }}"
                       loading="lazy"
                       sizes="(min-width:1024px) 560px, 100vw"
                       class="w-full h-full object-contain sm:object-cover object-center transform hover:scale-105 transition duration-700"/>
                </div>
              </div>
            </figure>
          </div>
        @empty
          <p class="text-center text-cp-light-grey py-10">{{ __('home.no_updates') }}</p>
        @endforelse
      </div>
    </div>
  </section>

  {{-- QUICK STATS --}}
  <section class="bg-[#F6F7FA]">
    <div class="container max-w-[1130px] mx-auto px-4 py-10 grid grid-cols-2 md:grid-cols-4 gap-6 text-center stagger-container">
      <div class="bg-white rounded-2xl p-6 border border-[#E8EAF2] opacity-0 translate-y-[30px] transition-all duration-700 scroll-reveal">
        <p class="text-3xl font-extrabold text-cp-dark-blue">
          <span class="count-up" data-target="35">0</span>+
        </p>
        <p class="text-cp-light-grey mt-1">{{ __('home.stats_machines') }}</p>
      </div>
      <div class="bg-white rounded-2xl p-6 border border-[#E8EAF2] opacity-0 translate-y-[30px] transition-all duration-700 scroll-reveal">
        <p class="text-3xl font-extrabold text-cp-dark-blue">ISO</p>
        <p class="text-cp-light-grey mt-1">9001:2015 {{ __('home.stats_certified') }}</p>
      </div>
      <div class="bg-white rounded-2xl p-6 border border-[#E8EAF2] opacity-0 translate-y-[30px] transition-all duration-700 scroll-reveal">
        <p class="text-3xl font-extrabold text-cp-dark-blue">QCD</p>
        <p class="text-cp-light-grey mt-1">{{ __('home.stats_qcd') }}</p>
      </div>
      <div class="bg-white rounded-2xl p-6 border border-[#E8EAF2] opacity-0 translate-y-[30px] transition-all duration-700 scroll-reveal">
        <p class="text-3xl font-extrabold text-cp-dark-blue">{{ __('home.stats_multi_sector_title') }}</p>
        <p class="text-cp-light-grey mt-1">{{ __('home.stats_multi_sector_desc') }}</p>
      </div>
    </div>
  </section>

  {{-- COMPANY PROFILE VIDEO --}}
  <section class="bg-[#F6F7FA]">
    <div class="container max-w-[1130px] mx-auto px-4 py-14 text-center opacity-0 scale-[0.95] transition-all duration-1000 scroll-reveal">
      <h2 class="text-3xl font-bold mb-6">{{ __('home.company_profile_title') }}</h2>
      <p class="text-cp-light-grey max-w-2xl mx-auto mb-10">
        {{ __('home.company_profile_desc') }}
      </p>
      <div class="relative w-full pb-[56.25%] h-0 overflow-hidden rounded-2xl shadow-lg group">
        <iframe class="absolute top-0 left-0 w-full h-full rounded-2xl"
                src="https://www.youtube.com/embed/rhGl6-n2yVU?rel=0&vq=hd1080&modestbranding=1&playsinline=1"
                title="{{ __('home.company_profile_iframe_title') }}"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
        </iframe>
      </div>
    </div>
  </section>

  {{-- BUSINESS PLAN --}}
  <section class="bg-[#F6F7FA]">
    <div class="container max-w-[1130px] mx-auto px-4 py-14">
      <div class="flex items-center justify-between gap-4 mb-8 opacity-0 translate-y-[20px] transition-all duration-700 scroll-reveal">
        <h2 class="text-3xl font-bold">{{ __('home.bp_title') }}</h2>
        <a href="{{ route('front.about') }}" class="text-cp-dark-blue font-semibold hover:underline flex items-center gap-1 group">
          {{ __('home.learn_more') }}
          <span class="transform group-hover:translate-x-1 transition duration-200">&rarr;</span>
        </a>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6決 stagger-container">
        <article class="bg-white border border-[#E8EAF2] rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition duration-300 opacity-0 translate-y-[40px] scroll-reveal">
          <img src="{{ asset('assets/Images/Team2.png') }}" alt="{{ __('home.bp1_img_alt') }}" loading="lazy" class="w-full h-44 object-cover">
          <div class="p-6">
            <h3 class="font-bold text-xl">{{ __('home.bp1_title') }}</h3>
            <p class="mt-2 text-cp-light-grey">{{ __('home.bp1_desc') }}</p>
          </div>
        </article>

        <article class="bg-white border border-[#E8EAF2] rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition duration-300 opacity-0 translate-y-[40px] scroll-reveal">
          <img src="{{ asset('assets/Images/Team4.png') }}" alt="{{ __('home.bp2_img_alt') }}" loading="lazy" class="w-full h-44 object-cover">
          <div class="p-6">
            <h3 class="font-bold text-xl">{{ __('home.bp2_title') }}</h3>
            <p class="mt-2 text-cp-light-grey">{{ __('home.bp2_desc') }}</p>
          </div>
        </article>

        <article class="bg-white border border-[#E8EAF2] rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition duration-300 opacity-0 translate-y-[40px] scroll-reveal">
          <img src="{{ asset('assets/Images/Team.png') }}" alt="{{ __('home.bp3_img_alt') }}" loading="lazy" class="w-full h-44 object-cover">
          <div class="p-6">
            <h3 class="font-bold text-xl">{{ __('home.bp3_title') }}</h3>
            <p class="mt-2 text-cp-light-grey">{{ __('home.bp3_desc') }}</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  {{-- FEATURED PRODUCTS --}}
  <section class="container max-w-[1130px] mx-auto px-4 py-14">
    <div class="flex items-center justify-between gap-4 mb-8 opacity-0 translate-y-[20px] transition-all duration-700 scroll-reveal">
      <h2 class="text-3xl font-bold">{{ __('home.featured_title') }}</h2>
      <a href="{{ route('front.team') }}" class="text-cp-dark-blue font-semibold hover:underline">{{ __('home.view_all') }}</a>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-6 stagger-container">
      @forelse($products as $product)
        <article class="border border-[#E8EAF2] rounded-xl overflow-hidden hover:shadow-xl transition duration-300 opacity-0 scale-[0.9] scroll-reveal" data-reveal="zoom">
          <div class="aspect-square bg-white overflow-hidden">
            @php $thumbExists = $product->thumbnail && Storage::disk('public')->exists($product->thumbnail); @endphp
            <img src="{{ $thumbExists ? Storage::url($product->thumbnail) : asset('assets/products/NMAX-RF-200-Watt.jpg') }}"
                 alt="{{ $product->name }}"
                 loading="lazy"
                 class="w-full h-full object-cover transform hover:scale-110 transition duration-500">
          </div>
          <div class="p-4 bg-white">
            <p class="font-semibold text-cp-black">{{ $product->name }}</p>
            <p class="text-xs text-cp-light-grey mt-1">{{ $product->tagline }}</p>
          </div>
        </article>
      @empty
        <p class="col-span-full text-center text-cp-light-grey py-10">No products found.</p>
      @endforelse
    </div>
  </section>

  {{-- OUR CLIENTS --}}
  <section class="bg-[#F6F7FA]">
    <div class="container max-w-[1130px] mx-auto px-4 py-16">
      <div class="text-center opacity-0 translate-y-[20px] transition-all duration-700 scroll-reveal">
        <h2 class="text-3xl font-bold leading-tight">{{ __('home.clients_title') }}</h2>
        <p class="mt-2 text-sm text-[#666A79]">{{ __('home.clients_subtitle') }}</p>
      </div>

      <div class="mt-10 grid grid-cols-2 md:grid-cols-3 gap-6決 stagger-container">
        <figure class="flex items-center justify-center h-32 md:h-36 rounded-xl border border-[#E8EAF2] bg-white p-6 opacity-0 translate-y-[30px] transition-all duration-500 scroll-reveal">
          <img src="{{ asset('assets/logo/logo1.svg') }}" alt="PT Astra Komponen Indonesia (ASKI)"
               class="h-[64px] md:h-[80px] w-auto object-contain select-none grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition duration-300" loading="lazy">
        </figure>
        <figure class="flex items-center justify-center h-32 md:h-36 rounded-xl border border-[#E8EAF2] bg-white p-6 opacity-0 translate-y-[30px] transition-all duration-500 scroll-reveal">
          <img src="{{ asset('assets/logo/logo2.svg') }}" alt="PT Autoplastik Indonesia (API)"
               class="h-[64px] md:h-[100px] w-auto object-contain select-none grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition duration-300" loading="lazy">
        </figure>
        <figure class="flex items-center justify-center h-32 md:h-36 rounded-xl border border-[#E8EAF2] bg-white p-6 opacity-0 translate-y-[30px] transition-all duration-500 scroll-reveal">
          <img src="{{ asset('assets/logo/logo3.svg') }}" alt="PT Star Cosmos"
               class="h-[64px] md:h-[100px] w-auto object-contain select-none grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition duration-300" loading="lazy">
        </figure>
      </div>
    </div>
  </section>

  {{-- SERVICES PREVIEW --}}
  <section class="container max-w-[1130px] mx-auto px-4 py-14">
    <div class="flex items-center justify-between gap-4 mb-8 opacity-0 translate-y-[20px] transition-all duration-700 scroll-reveal">
      <h2 class="text-3xl font-bold">{{ __('home.services_title') }}</h2>
      <a href="{{ route('front.ourservice') }}" class="text-cp-dark-blue font-semibold hover:underline">{{ __('home.services_explore') }}</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 stagger-container">
      <article class="bg-white border border-[#E8EAF2] rounded-2xl p-6 hover:shadow-xl transition duration-300 opacity-0 translate-y-[30px] scroll-reveal">
        <img src="{{ asset('assets/icons/automotive-components.svg') }}" alt="" class="w-12 h-12 mb-4 transform hover:scale-110 transition">
        <h3 class="text-xl font-bold">{{ __('home.s1_title') }}</h3>
        <p class="mt-2 text-cp-light-grey">{{ __('home.s1_desc') }}</p>
      </article>

      <article class="bg-white border border-[#E8EAF2] rounded-2xl p-6 hover:shadow-xl transition duration-300 opacity-0 translate-y-[30px] scroll-reveal">
        <img src="{{ asset('assets/icons/electronics-appliances.svg') }}" alt="" class="w-12 h-12 mb-4 transform hover:scale-110 transition">
        <h3 class="text-xl font-bold">{{ __('home.s2_title') }}</h3>
        <p class="mt-2 text-cp-light-grey">{{ __('home.s2_desc') }}</p>
      </article>

      <article class="bg-white border border-[#E8EAF2] rounded-2xl p-6 hover:shadow-xl transition duration-300 opacity-0 translate-y-[30px] scroll-reveal">
        <img src="{{ asset('assets/icons/supporting-services.svg') }}" alt="" class="w-12 h-12 mb-4 transform hover:scale-110 transition">
        <h3 class="text-xl font-bold">{{ __('home.s3_title') }}</h3>
        <p class="mt-2 text-cp-light-grey">{{ __('home.s3_desc') }}</p>
      </article>
    </div>
  </section>

  {{-- LATEST NEWS --}}
  <section class="container max-w-[1000px] mx-auto px-4 py-14">
    <div class="flex items-center justify-between gap-4 mb-8 opacity-0 translate-y-[20px] transition-all duration-700 scroll-reveal">
      <h2 class="text-3xl font-bold">{{ __('home.news_title') }}</h2>
      <a href="{{ route('front.news') }}" class="text-cp-dark-blue font-semibold hover:underline">{{ __('home.news_see_all') }}</a>
    </div>

    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 stagger-container">
      {{-- Card 1 --}}
      <article class="flex flex-col opacity-0 translate-y-[40px] transition-all duration-700 scroll-reveal">
        <a href="{{ route('front.news_details1') }}" class="block border border-[#E8EAF2] rounded-lg overflow-hidden group">
          <div class="aspect-[4/3] overflow-hidden rounded-lg">
            <img src="{{ asset('assets/news/news1.jpg') }}" alt="" loading="lazy" class="object-cover w-full h-full transform group-hover:scale-105 transition duration-500">
          </div>
        </a>
        <div class="mt-3 text-xs text-slate-500 flex items-center gap-3">
          <span>Khaerul Izan</span>
          <time datetime="2023-11-22">Nov 22, 2023</time>
        </div>
        <a href="{{ route('front.news_details1') }}" class="mt-2 text-lg font-semibold hover:text-cp-dark-blue transition">
          {{ __('home.news1_title') }}
        </a>
        <p class="mt-2 text-sm text-slate-600 line-clamp-2">
          {{ __('home.news1_desc') }}
        </p>
      </article>

      {{-- Card 2 --}}
      <article class="flex flex-col opacity-0 translate-y-[40px] transition-all duration-700 scroll-reveal">
        <a href="{{ route('front.news_details2') }}" class="block border border-[#E8EAF2] rounded-lg overflow-hidden group">
          <div class="aspect-[4/3] overflow-hidden rounded-lg">
            <img src="{{ asset('assets/news/news2.jpg') }}" alt="" loading="lazy" class="object-cover w-full h-full transform group-hover:scale-105 transition duration-500">
          </div>
        </a>
        <div class="mt-3 text-xs text-slate-500 flex items-center gap-3">
          <span>Astra Ventura</span>
          <time datetime="2025-04-09">Apr 09, 2025</time>
        </div>
        <a href="{{ route('front.news_details2') }}" class="mt-2 text-lg font-semibold hover:text-cp-dark-blue transition">
          {{ __('home.news2_title') }}
        </a>
        <p class="mt-2 text-sm text-slate-600 line-clamp-2">
          {{ __('home.news2_desc') }}
        </p>
      </article>

      {{-- Card 3 --}}
      <article class="flex flex-col opacity-0 translate-y-[40px] transition-all duration-700 scroll-reveal">
        <a href="{{ route('front.news_details3') }}" class="block border border-[#E8EAF2] rounded-lg overflow-hidden group">
          <div class="aspect-[4/3] overflow-hidden rounded-lg">
            <img src="{{ asset('assets/news/news3.jpg') }}" alt="" loading="lazy" class="object-cover w-full h-full transform group-hover:scale-105 transition duration-500">
          </div>
        </a>
        <div class="mt-3 text-xs text-slate-500 flex items-center gap-3">
          <span>Vicky Rachman</span>
          <time datetime="2025-04-24">Apr 24, 2025</time>
        </div>
        <a href="{{ route('front.news_details3') }}" class="mt-2 text-lg font-semibold hover:text-cp-dark-blue transition">
          {{ __('home.news3_title') }}
        </a>
        <p class="mt-2 text-sm text-slate-600 line-clamp-2">
          {{ __('home.news3_desc') }}
        </p>
      </article>
    </div>
  </section>

  {{-- CONTACT CTA --}}
  <section class="bg-cp-dark-blue text-white overflow-hidden">
    <div class="container max-w-[1130px] mx-auto px-4 py-14 text-center opacity-0 scale-95 transition-all duration-1000 scroll-reveal">
      <h2 class="text-3xl font-bold">{{ __('home.contact_cta_title') }}</h2>
      <p class="mt-2 opacity-90">{{ __('home.contact_cta_desc') }}</p>
      <a href="{{ route('front.appointment') }}" class="inline-block mt-6 bg-white text-cp-dark-blue font-bold px-6 py-3 rounded-xl hover:bg-gray-100 shadow-md hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
        {{ __('home.contact_cta_button') }}
      </a>
    </div>
  </section>

  {{-- GALLERY --}}
  <section class="bg-[#F6F7FA]">
   <div class="container max-w-[1130px] mx-auto px-4 py-12 opacity-0 translate-y-[30px] transition-all duration-1000 scroll-reveal">
     <header class="text-center mb-8">
       <h2 class="text-3xl font-bold">{{ __('home.gallery_title') }}</h2>
       <p class="text-sm text-gray-600 mt-2">{{ __('home.gallery_subtitle') }}</p>
     </header>

     @php $total = 4; @endphp

     <div id="gallery-carousel" class="relative w-full shadow-lg rounded-xl overflow-hidden" data-carousel="slide">
       <div class="relative overflow-hidden rounded-xl h-[220px] sm:h-[300px] md:h-[380px] lg:h-[520px]">
         @for ($i = 1; $i <= $total; $i++)
           <div class="{{ $i === 1 ? '' : 'hidden' }} duration-700 ease-in-out" data-carousel-item="{{ $i === 1 ? 'active' : '' }}">
             <img
               src="{{ asset('assets/gallery/'.$i.'.png') }}"
               alt="{{ __('home.gallery.items.'.$i.'.title') }}"
               loading="lazy"
               class="absolute block w-full h-full object-cover object-center top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"
             />
           </div>
         @endfor
       </div>

       <div class="absolute z-30 flex -translate-x-1/2 bottom-4 left-1/2 space-x-2">
         @for ($i = 0; $i < $total; $i++)
           <button type="button"
                   class="w-2.5 h-2.5 rounded-full bg-gray-300 aria-[current=true]:bg-cp-dark-blue transition"
                   aria-current="{{ $i === 0 ? 'true' : 'false' }}"
                   aria-label="Slide {{ $i+1 }}"
                   data-carousel-slide-to="{{ $i }}">
           </button>
         @endfor
       </div>

       <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 group" data-carousel-prev>
         <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/80 shadow group-hover:bg-white transition">
           <svg class="w-5 h-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
           </svg>
           <span class="sr-only">Previous</span>
         </span>
       </button>

       <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 group" data-carousel-next>
         <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/80 shadow group-hover:bg-white transition">
           <svg class="w-5 h-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
           </svg>
           <span class="sr-only">Next</span>
         </span>
       </button>
     </div>
   </div>
  </section>

  {{-- FAQ --}}
  <section class="bg-[#F6F7FA] w-full py-20 px-[10px] overflow-hidden">
    <div id="FAQ" class="container max-w-[1000px] mx-auto">
      <div class="flex flex-col lg:flex-row gap-[50px] sm:gap-[70px] items-center">
        
        <div class="flex flex-col gap-[30px] opacity-0 translate-x-[-30px] transition-all duration-1000 scroll-reveal">
          <div class="flex flex-col gap-[10px]">
            <h2 class="font-bold text-4xl leading-[45px]">{{ __('home.faq_title') }}</h2>
          </div>
          <a href="{{ route('front.appointment') }}" class="p-5 bg-cp-black hover:bg-cp-dark-blue rounded-xl text-white w-fit font-bold shadow transition duration-300">
            {{ __('home.faq_contact') }}
          </a>
        </div>

        <div class="flex flex-col gap-4 sm:w-[603px] shrink-0 stagger-container">
          @foreach ([
            ['q' => 'faq_q1', 'a' => 'faq_a1', 'id' => 1],
            ['q' => 'faq_q2', 'a' => 'faq_a2', 'id' => 2],
            ['q' => 'faq_q3', 'a' => 'faq_a3', 'id' => 3],
            ['q' => 'faq_q4', 'a' => 'faq_a4', 'id' => 4],
            ['q' => 'faq_q5', 'a' => 'faq_a5', 'id' => 5],
          ] as $f)
            <div class="flex flex-col p-5 rounded-2xl bg-white w-full border border-[#E8EAF2] shadow-sm opacity-0 translate-y-[20px] transition-all duration-500 scroll-reveal group">
              <button class="accordion-button flex justify-between gap-4 items-center w-full focus:outline-none" data-accordion="accordion-faq-{{ $f['id'] }}">
                <span class="font-bold text-lg leading-[27px] text-left group-hover:text-cp-dark-blue transition-colors duration-300">{{ __('home.' . $f['q']) }}</span>
                <div class="arrow w-9 h-9 flex items-center justify-center shrink-0 rounded-full bg-slate-50 transition-all duration-300">
                  {{-- Menggunakan SVG Panah Native agar rotasi translasi halus --}}
                  <svg class="w-4 h-4 text-slate-600 transition-transform duration-300 transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </div>
              </button>
              <div id="accordion-faq-{{ $f['id'] }}" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <p class="leading-[30px] text-cp-light-grey pt-4 border-t border-slate-100 mt-2">{{ __('home.' . $f['a']) }}</p>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </div>
  </section>

  {{-- Footer --}}
  <x-footer/>

@endsection

@push('after-scripts')
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/carousel.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <script src="{{ asset('js/modal-video.js') }}"></script>

  {{-- SCRIPT SCROLL ANIMASI, COUNT UP, DAN ACCORDING ARROW --}}
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      
      // 1. INTERSECTION OBSERVER UNTUK SCROLL REVEAL & STAGGER
      const revealElements = document.querySelectorAll('.scroll-reveal');
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            // Jika elemen berada dalam container stagger
            const container = entry.target.closest('.stagger-container');
            if (container) {
              const children = Array.from(container.querySelectorAll('.scroll-reveal'));
              children.forEach((child, index) => {
                setTimeout(() => {
                  child.classList.remove('opacity-0', 'translate-y-[20px]', 'translate-y-[30px]', 'translate-y-[40px]', 'translate-x-[-50px]', 'translate-x-[50px]', 'scale-[0.95]', 'scale-[0.9]');
                  child.classList.add('opacity-100', 'translate-y-0', 'translate-x-0', 'scale-100');
                }, index * 100); // delay antar item 100ms
              });
            } else {
              // Animasi single element biasa
              entry.target.classList.remove('opacity-0', 'translate-y-[20px]', 'translate-y-[30px]', 'translate-y-[40px]', 'translate-x-[-50px]', 'translate-x-[30px]', 'translate-x-[-30px]', 'translate-x-[50px]', 'scale-[0.95]', 'scale-95');
              entry.target.classList.add('opacity-100', 'translate-y-0', 'translate-x-0', 'scale-100');
            }
            
            // Jalankan animasi hitung angka jika ada class .count-up didalamnya
            const countElement = entry.target.querySelector('.count-up');
            if (countElement && !countElement.classList.contains('counted')) {
              runCountUp(countElement);
            }
            
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.15 });

      revealElements.forEach(el => observer.observe(el));

      // Fungsi Math CountUp (Berjalan lancar 60fps)
      function runCountUp(el) {
        const target = +el.getAttribute('data-target');
        const duration = 1500; // 1.5 detik durasi animasi
        const startTime = performance.now();

        function updateCount(currentTime) {
          const elapsedTime = currentTime - startTime;
          if (elapsedTime < duration) {
            const progress = elapsedTime / duration;
            // EaseOutQuad formula
            const currentCount = Math.floor(progress * (2 - progress) * target);
            el.innerText = currentCount;
            requestAnimationFrame(updateCount);
          } else {
            el.innerText = target;
            el.classList.add('counted');
          }
        }
        requestAnimationFrame(updateCount);
      }

      // 2. LOGIKA NATIF ACCORDION + ROTASI PANAH (UP/DOWN)
      const accordionButtons = document.querySelectorAll('.accordion-button');
      
      accordionButtons.forEach(btn => {
        btn.addEventListener('click', function() {
          const targetId = this.getAttribute('data-accordion');
          const content = document.getElementById(targetId);
          const svgArrow = this.querySelector('svg');
          
          // Cek apakah panel sedang terbuka
          if (content.style.maxHeight) {
            // Tutup panel, balikkan panah ke bawah (0deg)
            content.style.maxHeight = null;
            svgArrow.classList.remove('rotate-180');
          } else {
            // Tutup panel lain yang sedang terbuka lebih dulu (Opsional/Sistem Tunggal)
            document.querySelectorAll('.accordion-content, [id^="accordion-faq-"]').forEach(el => {
              if (el.style.maxHeight) el.style.maxHeight = null;
            });
            document.querySelectorAll('.accordion-button svg').forEach(svg => {
              svg.classList.remove('rotate-180');
            });

            // Buka panel terpilih, putar panah ke atas (180deg)
            content.style.maxHeight = content.scrollHeight + "px";
            svgArrow.classList.add('rotate-180');
          }
        });
      });

    });
  </script>
@endpush