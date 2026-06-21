<footer class="bg-cp-black w-full relative overflow-hidden mt-20">
  <div class="container max-w-[1130px] mx-auto px-4 sm:px-6">

    {{-- Top: Brand + Social --}}
    <div class="flex flex-col md:flex-row items-center md:items-start justify-between gap-8 pt-16 relative z-10">

      {{-- Brand --}}
      <div class="flex flex-col items-center md:items-start gap-6 md:gap-8">
        <div class="flex items-center gap-3">
          <div class="h-10 sm:h-12 w-auto">
            <img src="{{ asset('assets/logo/sinarmax.png') }}" alt="PT. Abadi Banua Cemerlang"
                 class="h-full w-auto object-contain">
          </div>
          <div class="hidden sm:flex flex-col">
            <p class="font-extrabold text-lg sm:text-xl text-white">
              PT. Abadi Banua Cemerlang
            </p>
            <p class="text-xs sm:text-sm text-cp-light-grey">
              LED Injection Industry
            </p>
          </div>
        </div>

        {{-- Social --}}
        <div class="flex flex-wrap items-center justify-center md:justify-start gap-4">
          <a href="#" class="opacity-90 hover:opacity-100"><img src="{{ asset('assets/icons/youtube.svg') }}" class="w-6 h-6"></a>
          <a href="#" class="opacity-90 hover:opacity-100"><img src="{{ asset('assets/icons/whatsapp.svg') }}" class="w-6 h-6"></a>
          <a href="#" class="opacity-90 hover:opacity-100"><img src="{{ asset('assets/icons/facebook.svg') }}" class="w-6 h-6"></a>
          <a href="#" class="opacity-90 hover:opacity-100"><img src="{{ asset('assets/icons/instagram.svg') }}" class="w-6 h-6"></a>
          <a href="#" class="opacity-90 hover:opacity-100"><img src="{{ asset('assets/icons/linkedin-white.svg') }}" class="w-6 h-6"></a>
        </div>
      </div>

      {{-- Links --}}
      <div class="w-full md:w-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 text-center md:text-left">

        {{-- About --}}
        <div>
          <p class="font-bold text-white text-lg mb-3">About</p>
          <ul class="space-y-2">
            <li><a href="{{ route('front.about') }}" class="text-cp-light-grey hover:text-white">Company Profile</a></li>
            <li><a href="{{ route('front.ourservice') }}" class="text-cp-light-grey hover:text-white">Awards & Certifications</a></li>
            <li><a href="{{ route('front.appointment') }}" class="text-cp-light-grey hover:text-white">Contact Us</a></li>
          </ul>
        </div>

        {{-- Services --}}
        <div>
          <p class="font-bold text-white text-lg mb-3">Our Services</p>
          <ul class="space-y-2">
            <li><a href="{{ route('front.products') }}" class="text-cp-light-grey hover:text-white">Products</a></li>
            <li><a href="{{ route('front.ourservice') }}" class="text-cp-light-grey hover:text-white">Our Services</a></li>
            <li><a href="{{ route('front.index') }}" class="text-cp-light-grey hover:text-white">Our Facilities</a></li>
          </ul>
        </div>

        {{-- News --}}
        <div>
          <p class="font-bold text-white text-lg mb-3">News & Events</p>
          <ul class="space-y-2">
            <li><a href="{{ route('front.news') }}" class="text-cp-light-grey hover:text-white">News</a></li>
            <li><a href="{{ route('front.index') }}" class="text-cp-light-grey hover:text-white">FAQ</a></li>
          </ul>
        </div>

      </div>
    </div>

    {{-- Bottom --}}
    <div class="relative z-10 mt-12 border-t border-white/10 py-6">
      <div class="flex flex-col items-center text-center gap-2">

        {{-- COPYRIGHT --}}
        <p class="text-sm text-white/70">
          © {{ date('Y') }} PT Abadi Banua Cemerlang. All rights reserved.
        </p>

        {{-- LINKS --}}
        <div class="flex items-center gap-3 text-sm text-white/70">
          <a href="#" class="hover:text-white transition">
            Privacy Policy
          </a>

          <span>•</span>

          <a href="#" class="hover:text-white transition">
            Terms of Service
          </a>
        </div>

      </div>
    </div>

  </div>

  {{-- Watermark --}}
  <div class="hidden md:block absolute inset-x-0 bottom-[-110px] pointer-events-none select-none">
    <p class="font-extrabold text-[64px] lg:text-[100px] leading-[1] text-center text-white/5">
      PT. Abadi Banua Cemerlang
    </p>
  </div>
</footer>