<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PT Abadi Banua Cemerlang</title>
  <link rel="icon" type="image/png" href="{{asset('assets/logo/sinarmax.png')}}"/>
  <link href="{{asset('css/output.css')}}" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <style>
    body { font-family: 'Poppins', sans-serif; }
    .text-cp-dark-blue { color: #312ECB; }
    .bg-cp-dark-blue { background-color: #312ECB; }
    .text-cp-light-grey { color: #666A79; }
    .bg-cp-black { background-color: #1a1a1a; }
    [x-cloak] { display: none !important; }
  </style>
  @stack('head')
</head>
<body class="font-poppins text-gray-900">
  @yield('content')
  
  <script>
  (function(){
    const els = document.querySelectorAll('[data-reveal]');
    if (!('IntersectionObserver' in window) || !els.length) {
      els.forEach(el => el.classList.remove('opacity-0','translate-y-4'));
      return;
    }
    const obs = new IntersectionObserver((entries, observer) => {
      entries.forEach(({isIntersecting, target}) => {
        if (isIntersecting) {
          target.classList.remove('opacity-0','translate-y-4');
          target.classList.add('opacity-100','translate-y-0');
          observer.unobserve(target);
        }
      });
    }, { root: null, rootMargin: '0px 0px -10% 0px', threshold: 0.15 });
    els.forEach(el => {
      el.classList.add('opacity-0','translate-y-4');
      obs.observe(el);
    });
  })();
  </script>
 @stack('structured_data')
 @stack('after-scripts')
</body>
</html>