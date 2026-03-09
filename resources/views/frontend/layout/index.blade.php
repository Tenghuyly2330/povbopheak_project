<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth overflow-x-hidden">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Pov Bopheak Land">
    <meta property="og:description" content="website of Pov Bopheak Land">
    <meta property="og:image" content="https://www.povbopheak.com/assets/logo/logo-fina-social.png">
    <meta property="og:image:secure_url" content="https://www.povbopheak.com/assets/logo/logo-fina-social.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="https://www.povbopheak.com/">
    {{-- <meta property="og:url" content="{{ url('/') }}"> --}}
    <meta property="og:type" content="website">
    <meta name="p:domain_verify" content="59bd8ac2b2d85278447f6ad1cb0702d6"/>

    <title>Pov Bopheak Land & Home</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="icon" href="{{ asset('assets/logo/logo-fina.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    {{-- Like icon --}}
    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: "Kantumruy Pro", sans-serif;
            font-optical-sizing: auto;
        }

        .line-clamp-4-fallback {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            display: none;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1621V9L0SN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-1621V9L0SN');
    </script>
</head>

<body class="font-kantumruy overflow-x-hidden">
    {{-- Scroll To Top Button --}}
    <button id="scrollTopBtn" onclick="scrollToTop()"
        class="fixed bottom-6 right-6 z-[999] hidden cursor-pointer transition-opacity duration-300">
        <img src="{{ asset('assets/icon/button-scroll.png') }}" alt="Scroll to top"
            class="w-12 h-12 object-contain md:object-cover animate-bounce">
    </button>
    <div class="relative w-full min-h-screen">

        <!-- BACKGROUND IMAGE -->
        <img src="{{ asset('assets/background/bg-home-4.svg') }}" alt="Background"
            class="absolute inset-0 h-[60%] w-full md:h-full object-cover -z-10">

        <!-- CONTENT ON SAME IMAGE -->
        @include('components.navbar')
        @include('frontend.page.home')
        @include('frontend.page.about-us')

    </div>
    <!-- Real Estate Projects -->
    <div class="relative w-full py-0 md:py-24">
        @include('frontend.page.real-estate-projects')
        @include('frontend.page.youtube')
    </div>
    {{-- Our Team --}}
    <div class="relative w-full -mt-8">
        @include('frontend.page.our-team')
    </div>
    {{-- Why Choose Us? --}}
    <div class="relative w-full -mt-8">
        @include('frontend.page.why_choose_us')
    </div>
    {{-- Our Customer --}}
    <div class="relative w-full -mt-8">
        @include('frontend.page.our-customer')
    </div>
    <!-- Nesw -->
    <div class="relative w-full">
        @include('frontend.page.news-latest')
    </div>
    {{-- Contact Form --}}
    <div class="relative w-full -mt-8">
        @include('frontend.page.contact-form')
    </div>
    {{-- Freelancer --}}
    <div class="relative w-full -mt-8">
        @include('frontend.page.freelancers')
    </div>
    {{-- Background Footer --}}
    <div class="relative w-full md:mt-0 -mt-6">
        @include('components.footer')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
<script>
    const scrollBtn = document.getElementById('scrollTopBtn');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollBtn.classList.remove('hidden');
        } else {
            scrollBtn.classList.add('hidden');
        }
    });

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,

        autoplay: {
            delay: 2000, // ⏱ 3 seconds
            disableOnInteraction: false, // continue after swipe
        },

        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1439: {
                slidesPerView: 4,
            }
        },

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>

</html>
