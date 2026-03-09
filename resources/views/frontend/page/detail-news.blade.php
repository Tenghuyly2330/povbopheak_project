<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth overflow-x-hidden">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="Pov Bopheak Land">
        <meta property="og:description" content="website of Pov Bopheak Land">
        <meta property="og:image" content="https://povbopheak.com/assets/logo/logo-fina-social.png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:url" content="{{ url('/') }}">
        <meta property="og:type" content="website">

        <title>Pov Bopheak Land</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link rel="icon" href="{{ asset('assets/logo/logo-fina.png') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

        {{-- Like icon --}}
    <link rel="stylesheet" href="{{asset('vendor/fonts/boxicons.css')}}" />
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

        [x-cloak] { display: none !important; }
.ck-content ul {
    padding-left: 1.25rem;
    list-style-type: disc;
}

.ck-content ol {
    padding-left: 1.25rem;
    list-style-type: decimal;
}

.ck-content li {
    margin-bottom: 0.25rem;
}

.ck-content p {
    margin-bottom: 0.5rem;
}


    </style>
    </head>
    <body class="font-kantumruy overflow-x-hidden">
        {{-- Scroll To Top Button --}}
        <button
            id="scrollTopBtn"
            onclick="scrollToTop()"
            class="fixed bottom-6 right-6 z-[999] hidden cursor-pointer transition-opacity duration-300"
        >
            <img
                src="{{ asset('assets/icon/button-scroll.png') }}"
                alt="Scroll to top"
                class="w-12 h-12 object-contain md:object-cover animate-bounce"
            >
        </button>
        <div class="relative w-full min-h-screen bg-white/90">

            <!-- BACKGROUND IMAGE -->
            <img
                src="{{ asset('assets/background/bg-home-3.png') }}"
                alt="Background"
                class="absolute inset-0 h-[60%] w-full md:h-full object-cover -z-10"
            >

            <!-- CONTENT ON SAME IMAGE -->
            @include('components.navbar')

            <section class="py-16">
                <div class="max-w-7xl mx-auto px-6">

                    <h1 class="text-3xl font-bold text-[#03244a] mb-2">
                        {{ app()->getLocale() === 'en'
                            ? $item->title_en
                            : (app()->getLocale() === 'kh'
                                ? $item->title_kh
                                : $item->title_cn)
                        }}
                    </h1>

                    <p class="text-sm text-[#03244a] mb-6">
                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                    </p>

                    <!-- Up to 2 Images -->
                    @if (is_array($item->images) && count($item->images) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 mb-8">
                            @foreach ($item->images as $img)
                                <img
                                    src="{{ asset($img) }}"
                                    alt="{{ $item->title_en }}"
                                    class="aspect-3/2 object-cover rounded-xl"
                                >
                            @endforeach
                        </div>
                    @endif


                    <p class="ck-content text-[#03244a] font-semibold leading-relaxed">
                        {!! app()->getLocale() === 'en'
                            ? $item->description_en
                            : (app()->getLocale() === 'kh'
                                ? $item->description_kh
                                : $item->description_cn)
                        !!}
                        </p>

                    <div class="w-40 h-12 rounded-full bg-[#03244a] flex items-center justify-center mt-4">
                            <a href="{{ url('/') }}#news" class="cursor-pointer bg-linear-to-r from-[#f2ad46] via-[#f7ca68] to-[#fce88d]
                            bg-clip-text text-transparent font-semibold text-md">
                                ← {{ app()->getLocale() === 'en'
                            ? 'Back to News'
                            : (app()->getLocale() === 'kh'
                                ? 'ត្រឡប់ទៅព្រឹត្តិការណ៍'
                                : '← Back to News')
                            }}
                            </a>
                        </div>

                </div>
            </section>

        </div>
        {{-- Background Footer --}}
        <div class="relative w-full md:mt-0 -mt-8">
            @include('components.footer')
        </div>
    </body>
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
</script>

</html>


