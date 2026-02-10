<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth overflow-x-hidden">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Check Price & Availability</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="icon" href="{{ asset('assets/logo/logo-fina.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
    </style>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        .ck-content table {
    width: 100%;          /* make table visible */
    border-collapse: collapse;
}

.ck-content table,
.ck-content th,
.ck-content td {
    border: 1px solid #ccc; /* visible borders */
}

.ck-content th,
.ck-content td {
    padding: 6px 12px;
}

.ck-content figure.table {
    margin: 1rem 0;
    overflow-x: auto;  /* allow horizontal scroll if wide */
}
/* ===== LIST STYLE (IMPORTANT) ===== */
.ck-content ul {
    list-style-type: disc;
    margin-left: 1.5rem;
    padding-left: 1rem;
}

.ck-content ol {
    list-style-type: decimal;
    margin-left: 1.5rem;
    padding-left: 1rem;
}

.ck-content li {
    margin-bottom: 0.4rem;
}

/* Nested lists */
.ck-content ul ul {
    list-style-type: circle;
}

.ck-content ol ol {
    list-style-type: lower-alpha;
}

.whitespace-pre-wrap {
    white-space: pre-wrap;
}

    </style>
</head>

<body>
 @php
    // Decode images if stored as JSON
    $images = is_array($projects->image_default)
        ? $projects->image_default
        : json_decode($projects->image_default ?? '[]', true);

    $currentProjectData = [
        'des' => app()->getLocale() === 'en'
            ? $projects->description_default_en
            : (app()->getLocale() === 'kh'
                ? $projects->description_default_kh
                : $projects->description_default_cn),

        // MUST be array for slider
        'img' => is_array($images) ? $images : [],
    ];
@endphp



    <div x-data='projectData(@json($categories), "{{ app()->getLocale() === 'km' ? 'kh' : (app()->getLocale() === 'cn' ? 'ch' : app()->getLocale()) }}", @json($currentProjectData))'
     class="relative w-full min-h-screen">

        <!-- Background -->
<div class="absolute inset-0 -z-10">

    <!-- TYPE BANNER (highest priority) -->
    <template
        x-if="
            activeCategory !== null &&
            activeType !== null &&
            categories[activeCategory]?.cat_type?.[activeType]?.banner_type
        "
    >
        <img
            :src="`/storage/${categories[activeCategory].cat_type[activeType].banner_type}`"
            class="w-full h-full object-cover"
        >
    </template>

    <!-- CATEGORY BANNER -->
    <template
        x-if="
            (activeType === null || !categories[activeCategory]?.cat_type?.[activeType]?.banner_type) &&
            activeCategory !== null &&
            categories[activeCategory]?.banner_cate
        "
    >
        <img
            :src="`/storage/${categories[activeCategory].banner_cate}`"
            class="w-full h-full object-cover"
        >
    </template>

    <!-- PROJECT BANNER (default / initial) -->
    <template
        x-if="
            activeCategory === null &&
            {{ $projects->banner ? 'true' : 'false' }}
        "
    >
        <img
            src="{{ asset('storage/' . $projects->banner) }}"
            class="w-full h-full object-cover"
        >
    </template>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-white/60"></div>
</div>



        <!-- Header -->
        <div class="flex justify-between items-center px-8 md:px-14 py-4">
            <a href="{{ route('home') }}#real-project" class="flex items-center gap-3">
                <img src="{{ asset('assets/logo/logo-fina.png') }}" alt="Logo" class="w-14 h-auto">
                <div class="hidden xl:flex items-center text-[#03254B] text-lg leading-none">
                    <span class="font-semibold">
                        {{ app()->getLocale() === 'en'
                            ? 'Pov Bopheak'
                            : (app()->getLocale() === 'kh'
                                ? 'ក្រុមហ៊ុនពៅបូភ័ក្ត្រ'
                                : 'Pov Bopheak')
                        }}
                    </span>
                    <span class="font-normal ml-1">
                        {{ app()->getLocale() === 'en'
                            ? 'Land & Home Co., Ltd'
                            : (app()->getLocale() === 'kh'
                                ? 'លែន&ហូមឯ.ក'
                                : 'Land & Home 有限公司')
                        }}
                    </span>
                </div>
            </a>
            <div class="flex items-center gap-3 text-[#03254B] text-md md:text-lg">
                <p>
                    {{ app()->getLocale() === 'en'
                        ? 'Real Estate Projects'
                        : (app()->getLocale() === 'kh'
                            ? 'គម្រោងអចលទ្រព្យ'
                            : '房地产项目')
                    }}
                </p>
            </div>
        </div>

        <!-- Main Content -->
        <div
             x-data="{
                ...projectData(...),
                showImage: false,
                activeImage: null
            }"
            class="max-w-7xl mx-auto w-full
            flex lg:flex-row flex-col
            justify-between
            px-2 md:px-12 lg:px-4 xl:px-12
            mt-12">

            <!-- Left Column -->
            <div class="w-full md:w-1/2 flex flex-col space-y-8 mt-4">
                <!-- Title -->
                <button type="button" onclick="window.location.reload(true);" class="cursor-pointer text-left">
                    <h1 class="font-kantumruy max-w-md text-[#03254B] text-2xl md:text-4xl font-medium lg:px-0 px-4">
                        {{ app()->getLocale() === 'en'
                            ? $projects->name_en
                            : (app()->getLocale() === 'kh'
                                ? $projects->name_kh
                                : $projects->name_ch)
                        }}
                    </h1>
                </button>
                {{-- Category --}}
                <div class="flex flex-wrap justify-start items-center gap-2 w-full px-2 cursor-pointer">
                    <template x-for="(cat, index) in categories" :key="index">
                        <div
                            class="inline-flex rounded-full transition-all duration-200"
                            :class="{
                                'bg-gradient-to-r from-yellow-400 to-yellow-200': activeCategory === index,
                                'border border-[#03254B]': activeCategory === null && index === 0
                            }"
                        >
                            <button
                                class="px-4 py-1 md:px-6 md:py-4
                                    text-md md:text-lg
                                    text-center whitespace-nowrap rounded-full"
                                @click="setActiveCategory(index)"
                                x-text="cat?.name?.[lang] ?? ''">
                            </button>
                        </div>
                    </template>
                </div>


                <!-- Type Buttons -->
                <div class="flex md:space-y-0 space-y-3 space-x-1 md:space-x-3 mt-2 cursor-pointer"
                    x-show="categories[activeCategory] && Array.isArray(categories[activeCategory].cat_type) && categories[activeCategory].cat_type.length">
                    <template x-for="(type, tIndex) in categories[activeCategory].cat_type" :key="tIndex">
                        <div x-show="type?.title?.[lang]" class="flex justify-center md:items-center rounded-full"
                            :class="activeType === tIndex ? 'bg-[#03254B] py-2 text-white' : ''">
                            <button class="cursor-pointer w-[100px] h-6 md:w-32 md:h-8 text-xs md:text-md"
                                @click="setActiveType(tIndex)" x-text="type.title?.[lang]">
                            </button>
                        </div>
                    </template>
                </div>

                <!-- Description -->

                <div class="text-[#03254B] text-sm md:text-lg mt-2 lg:px-0 px-4">
                    <template x-for="item in displayedItems()" :key="item.slug">
                        <div class="mb-4">
                           <p
                                x-html="item.des"
                                class="ck-content leading-10 whitespace-pre-wrap"
                            ></p>

                        </div>
                    </template>
                </div>

                <!-- Download PDF -->
                @if ($projects->pdf)
                <h1 class="font-kantumruy text-[#03254B] md:text-lg text-sm">
                    {{ app()->getLocale() === 'en'
                ? 'Download to check its price and availability now'
                : (app()->getLocale() === 'kh'
                    ? 'ទាញយកឯកសារខាងក្រោមដើម្បីពិនិត្យតម្លៃនិងលំនៅដ្ឋានដែលនៅទំនេរ'
                    : '现在下载以查看其价格和库存情况下载')
            }}
                </h1>
                <div class="flex justify-center items-center font-medium bg-[#03254B] rounded-full w-40 h-12 lg:ml-0 ml-4">
                    <a href="{{ asset('storage/' . $projects->pdf) }}" download
                        class="flex justify-center items-center font-medium bg-[#03254B] rounded-full w-40 h-12">
                        <span
                            class="bg-gradient-to-r from-yellow-400 to-yellow-200 bg-clip-text text-transparent">
                            {{ app()->getLocale() === 'en'
                ? 'Download PDF'
                : (app()->getLocale() === 'kh'
                    ? 'ទាញយកឥឡូវនេះ'
                    : '下载')
            }}
                        </span>
                    </a>
                </div>



            @endif
                    <!-- Slider version mobile -->
        <div
    class="md:hidden flex max-w-7xl mx-auto mt-2 px-3"
    x-show="currentImages().length > 0"
    x-data="projectDataM(@json($categories), '{{ app()->getLocale() }}', true)"
    @touchstart="touchStart($event)"
    @touchend="touchEnd($event)"
>
    <div class="relative w-full overflow-hidden rounded-xl">
        <div
            id="sliderMobile"
            class="flex transition-transform duration-500 ease-in-out"
        >
            <template x-for="img in currentImages()" :key="img">
                <img
                    :src="'{{ asset('storage') }}/' + img"
                    class="w-full h-56 object-cover flex-shrink-0"
                />
            </template>
        </div>

        <button @click="prev()" class="absolute left-2 top-1/2 -translate-y-1/2 z-10 bg-black/60 rounded-full p-2 text-white">◀</button>
        <button @click="next()" class="absolute right-2 top-1/2 -translate-y-1/2 z-10 bg-black/60 rounded-full p-2 text-white">▶</button>
    </div>
</div>
            </div>

            <!-- Right Column -->
            <div class="md:w-1/2 w-full flex flex-col items-center space-y-4 mt-4 md:ml-0 lg:ml-6 xl:ml-0 px-3">
                <iframe
                    src="{{ $projects->locate_link }}"
                    class="w-full max-w-full h-72 rounded-xl"
                    style="border:0;"
                    loading="lazy">
                </iframe>

                {{-- <p class="text-[#03254B] text-lg px-2 md:px-8 text-left">
                    Located on Sna Techo, Balang Commune, Prasat Bakong District, Siem Reap Province
                </p> --}}

                <!-- Social Icons -->
                <div class="flex md:flex-row flex-wrap md:gap-4 py-5">
                    @php
                        $socialLinks = [
                            'fb' => 'https://www.facebook.com/PovBopheakGroup',
                            'te' => 'https://t.me/+85516222809',
                            'whatsapp' => 'https://wa.me/087446277',
                            'youtube' => 'https://www.youtube.com/@povbopheaklandhome3948',
                            'tiktok' => 'https://www.tiktok.com/@povbopheaklandandhome?_r=1&_t=ZS-92yM8DJyKCW',
                            'wechat' => 'https://www.wechat.com/',
                            'in' => 'https://www.linkedin.com/company/pov-bopheak-land-home-co-ltd/?viewAsMember=tru',
                        ];
                    @endphp

                    @foreach ($socialLinks as $icon => $link)
                        <a href="{{ $link }}" target="_blank" rel="noopener noreferrer"
                            class="w-10 h-10 md:w-12 md:h-12 rounded-full cursor-pointer hover:scale-110 transition">
                            <img src="{{ asset('assets/icon/' . $icon . '.png') }}" alt="{{ $icon }}"
                                class="w-full h-full object-cover">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Slider version dasktop-->
        <div
            class="hidden max-w-[92%] mx-auto md:flex items-center gap-6 py-6"
            x-show="currentImages().length > 0"
            x-data="projectData(@json($categories), '{{ app()->getLocale() }}')"
            @mouseenter="pauseAutoPlay"
            @mouseleave="resumeAutoPlay"
        >

            <!-- PREV -->
            <button
                @click="prev()" class="px-3 py-2">
                <svg width="42" height="42" viewBox="0 0 42 42" fill="none">
                    <circle cx="21" cy="21" r="21" transform="rotate(-180 21 21)" fill="#1E1E1E" />
                    <path
                        d="M10 22.7321C8.66667 21.9623 8.66667 20.0378 10 19.268L25 10.6077C26.3333 9.8379 28 10.8002 28 12.3398L28 29.6603C28 31.1999 26.3333 32.1621 25 31.3923L10 22.7321Z"
                        fill="white" />
                </svg>
            </button>

            <!-- SLIDER -->
            <div class="overflow-hidden">

                <div id="slider" class="flex items-center gap-2 transition-transform duration-500 ease-in-out">
                    <template x-for="img in currentImages()" :key="img">
                        <img :src="'{{ asset('storage') }}/' + img"
                            class="w-[300px] h-[200px] rounded-lg flex-shrink-0 object-cover" />

                    </template>
                </div>
            </div>

            <!-- NEXT -->
            <button
                @click="next()" class="px-3 py-2">
                <svg width="42" height="42" viewBox="0 0 42 42" fill="none">
                    <circle cx="21" cy="21" r="21" fill="#1E1E1E" />
                    <path
                        d="M32 19.2679C33.3333 20.0377 33.3333 21.9623 32 22.7321L17 31.3923C15.6667 32.1621 14 31.1999 14 29.6603L14 12.3397C14 10.8001 15.6667 9.83789 17 10.6077L32 19.2679Z"
                        fill="white" />
                </svg>
            </button>
        </div>

    </div>

  <script>
function projectData(categoriesData = [], defaultLang = 'en', initialStatic = {}) {

    return {
        categories: Array.isArray(categoriesData) ? categoriesData : [],
        activeCategory: null,
        activeType: null,
        lang: defaultLang,
        initialStatic: initialStatic,

        autoPlayInterval: null,
        autoPlayDelay: 2500, // 3.5 seconds
        isPaused: false,


        sliderIndex: 0,
        visibleCount: 1,
        gap: 16,
        startX: 0,
        endX: 0,

        setActiveCategory(index) {
    this.activeCategory = index;
    this.activeType = 0;
    this.sliderIndex = 0;
    this.resetSlider();
    this.startAutoPlay();
},

setActiveType(index) {
    this.activeType = index;
    this.sliderIndex = 0;
    this.resetSlider();
    this.startAutoPlay();
},

        displayedItems() {
            if (this.activeCategory !== null) {
                const cat = this.categories[this.activeCategory];
                if (cat?.cat_type?.length) {
                    const type = cat.cat_type[this.activeType] || {};
                    return [{
                        des: type.des?.[this.lang] || '',
                        img: Array.isArray(type.img) ? type.img : []
                    }];
                }
            }
            return [this.initialStatic];
        },

        currentImages() {
            const items = this.displayedItems();
            return items[0]?.img ?? [];
        },

        /* =====================
            SLIDER CONTROLS
        ===================== */
next() {
    const total = this.currentImages().length;
    if (total <= 1) return;

    this.sliderIndex = (this.sliderIndex + 1) % total;
    this.updateSlider();
},

prev() {
    const total = this.currentImages().length;
    if (total <= 1) return;

    this.sliderIndex =
        (this.sliderIndex - 1 + total) % total;
    this.updateSlider();
},







 updateSlider() {
    const container = document.getElementById('slider');
    if (!container || !container.children.length) return;

    const slide = container.children[0];
    const slideWidth = slide.offsetWidth;
    const step = slideWidth + this.gap;

    container.style.willChange = 'transform';
    container.style.transform =
        `translateX(-${220 * this.sliderIndex}px)`;

    // Mobile slider
    const containerMobile = document.getElementById('sliderMobile');
    if (containerMobile) {
        containerMobile.style.willChange = 'transform';
        containerMobile.style.transform =
            `translateX(-${100 * this.sliderIndex}%)`;
    }
},




        resetSlider() {
    this.sliderIndex = 0;

    const container = document.getElementById('slider');
    if (container) {
        container.style.transition = 'none';
        container.style.transform = 'translateX(0)';
        requestAnimationFrame(() => {
            container.style.transition = '';
        });
    }
},


        /* =====================
            SWIPE (MOBILE)
        ===================== */
        touchStart(e) {
            this.startX = e.touches[0].clientX;
        },

        touchEnd(e) {
            this.endX = e.changedTouches[0].clientX;
            this.handleSwipe();
        },

        handleSwipe() {
            if (this.startX - this.endX > 50) {
                this.next(); // swipe left
            } else if (this.endX - this.startX > 50) {
                this.prev(); // swipe right
            }
        },

   startAutoPlay() {
    this.stopAutoPlay();

    this.autoPlayInterval = setInterval(() => {
        if (this.isPaused) return;
        this.next(); // infinite loop handled here
    }, this.autoPlayDelay);
},


stopAutoPlay() {
    if (this.autoPlayInterval) {
        clearInterval(this.autoPlayInterval);
        this.autoPlayInterval = null;
    }
},

pauseAutoPlay() {
    this.isPaused = true;
},

resumeAutoPlay() {
    this.isPaused = false;
},
init() {
    this.startAutoPlay();
},


    }
}
</script>



</body>

</html>

