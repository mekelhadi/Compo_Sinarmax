<div x-data="{ open:false }"
     x-init="$watch('open', v => document.body.classList.toggle('overflow-hidden', v))"
     @keydown.escape.window="open=false"
     class="sticky top-0 z-50 bg-white/90 backdrop-blur">

  <nav class="container mx-auto max-w-7xl px-4 py-3">
    <div class="flex items-center justify-between gap-3 bg-white p-[20px_30px] rounded-[20px] shadow-sm">

      {{-- LOGO --}}
      <div class="flex items-center gap-3 min-w-0">
        <div class="flex shrink-0 h-[43px] w-auto overflow-hidden">
          <img src="{{ asset('assets/img/logo_sinarmax.jpg') }}"
               class="object-contain w-full h-full" alt="logo">
        </div>
      </div>

      {{-- MENU DESKTOP --}}
      @php
        $liBase = 'font-semibold transition-all duration-300 hover:text-cp-dark-blue';
      @endphp

      <ul class="hidden md:flex flex-wrap items-center gap-[30px] ml-auto">

        <li class="{{ request()->routeIs('front.index') ? 'text-cp-dark-blue ' : '' }}{{ $liBase }}">
          <a href="{{ route('front.index') }}">{{ __('messages.home') }}</a>
        </li>

        <li class="{{ request()->routeIs('front.about') ? 'text-cp-dark-blue ' : '' }}{{ $liBase }}">
          <a href="{{ route('front.about') }}">{{ __('messages.about') }}</a>
        </li>

        {{-- ✅ FIX PRODUK --}}
        <li class="{{ request()->routeIs('front.products') ? 'text-cp-dark-blue ' : '' }}{{ $liBase }}">
          <a href="{{ route('front.products') }}">{{ __('messages.products') }}</a>
        </li>

        <li class="{{ request()->routeIs('front.ourservice') ? 'text-cp-dark-blue ' : '' }}{{ $liBase }}">
          <a href="{{ route('front.ourservice') }}">{{ __('messages.services') }}</a>
        </li>

        <li class="{{ request()->routeIs('front.news') ? 'text-cp-dark-blue ' : '' }}{{ $liBase }}">
          <a href="{{ route('front.news') }}">{{ __('messages.news') }}</a>
        </li>

      </ul>

      {{-- RIGHT SIDE --}}
      @php $cur = app()->getLocale(); @endphp

      <div class="hidden md:flex items-center gap-3">

        {{-- LANGUAGE --}}
        <div x-data="{ langOpen: false }" class="relative">
          <button @click="langOpen = !langOpen"
                  class="flex items-center gap-2 px-2 py-2 border border-[#E8EAF2] rounded-lg hover:bg-gray-50">
            
            <img src="{{ asset($cur === 'id' ? 'assets/flags/id.png' : 'assets/flags/en.png') }}"
                 class="w-6 h-4 rounded-sm">

            <span class="text-sm font-semibold">{{ strtoupper($cur) }}</span>
          </button>

          <div x-show="langOpen"
               @click.outside="langOpen = false"
               class="absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg">

            <a href="{{ route('lang.switch','id') }}"
               class="block px-3 py-2 hover:bg-gray-100 {{ $cur === 'id' ? 'font-bold' : '' }}">Bahasa Indonesia</a>

            <a href="{{ route('lang.switch','en') }}"
               class="block px-3 py-2 hover:bg-gray-100 {{ $cur === 'en' ? 'font-bold' : '' }}">English</a>
          </div>
        </div>

        {{-- CTA --}}
        <a href="https://wa.me/62882019079653?text=Halo%20kak%2Csaya%20ingin%20menanyakan%20tentang%20produk%20dari%20PT.Sinarmax"
           target="_blank" rel="noopener noreferrer"
           class="bg-cp-dark-blue text-white font-bold rounded-xl px-5 py-3 hover:shadow-lg">
          {{ __('messages.contact') }}
        </a>

      </div>

      {{-- HAMBURGER --}}
      <button @click="open = !open"
              class="md:hidden p-2 border rounded-lg">

        <svg x-show="!open" class="h-6 w-6" viewBox="0 0 24 24">
          <path d="M4 6h16M4 12h16M4 18h16"
                stroke="currentColor" stroke-width="2"/>
        </svg>

        <svg x-show="open" x-cloak class="h-6 w-6" viewBox="0 0 24 24">
          <path d="M6 6l12 12M18 6l-12 12"
                stroke="currentColor" stroke-width="2"/>
        </svg>

      </button>
    </div>

    {{-- MOBILE --}}
    <div x-show="open" x-cloak
         class="md:hidden mt-3 bg-white rounded-2xl shadow p-4">

      <ul class="flex flex-col divide-y">

        <li>
          <a href="{{ route('front.index') }}" class="block py-3">Home</a>
        </li>

        <li>
          <a href="{{ route('front.about') }}" class="block py-3">About</a>
        </li>

        {{-- ✅ FIX PRODUK --}}
        <li>
          <a href="{{ route('front.products') }}" class="block py-3">Products</a>
        </li>

        <li>
          <a href="{{ route('front.ourservice') }}" class="block py-3">Services</a>
        </li>

        <li>
          <a href="{{ route('front.news') }}" class="block py-3">News</a>
        </li>

      </ul>

      <div class="mt-4 flex gap-2">
        <a href="https://wa.me/62882019079653?text=Halo%20kak%2Csaya%20ingin%20menanyakan%20tentang%20produk%20dari%20PT.Sinarmax"
           target="_blank" rel="noopener noreferrer"
           class="block flex-1 text-center bg-cp-dark-blue text-white py-3 rounded-xl">
          {{ __('messages.contact') }}
        </a>
      </div>

      <div class="mt-3 flex gap-2 border-t pt-3">
        <a href="{{ route('lang.switch','id') }}"
           class="flex-1 text-center py-2 rounded-lg border {{ $cur === 'id' ? 'bg-cp-dark-blue text-white font-bold' : 'text-gray-600' }}">Bahasa Indonesia</a>
        <a href="{{ route('lang.switch','en') }}"
           class="flex-1 text-center py-2 rounded-lg border {{ $cur === 'en' ? 'bg-cp-dark-blue text-white font-bold' : 'text-gray-600' }}">English</a>
      </div>

    </div>
  </nav>
</div>