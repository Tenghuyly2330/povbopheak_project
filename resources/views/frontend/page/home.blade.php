<div class="w-full mt-4 md:mt-24">
    <!-- CONTAINER -->
    <div class="max-w-7xl mx-auto px-6 lg:px-2 2xl:px-4 flex
                items-center lg:items-start
                justify-between gap-10">

        <!-- LEFT CONTENT -->
        <div class="space-y-6 flex-1 text-left md:h-auto h-96 flex flex-col justify-between">
            <h1
                class="
                    font-bold z-20 py-5 w-full md:max-w-[90%]
                    {{ app()->getLocale() === 'en' ? 'text-[22px] md:text-5xl lg:text-[68px] leading-tight' : '' }}
                    {{ app()->getLocale() === 'kh' ? 'text-[22px] md:text-5xl lg:text-[68px] leading-relaxed tracking-wide' : '' }}
                    {{ app()->getLocale() === 'cn' ? 'text-[18px] md:text-4xl lg:text-[58px] leading-snug md:max-w-full max-w-60' : '' }}
                "
                style="
                    background: linear-gradient(90deg, #F2A93F 0%, #FFFBA6 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                    text-fill-color: transparent;
                "
            >
                {{ app()->getLocale() === 'en'
                    ? 'Pov Bopheak Land & Home'
                    : (app()->getLocale() === 'kh'
                        ? 'ក្រុមហ៊ុនពៅបូភ័ក្ត្រលែន & ហូម'
                        : 'Pov Bopheak Land & Home')
                }}
            </h1>


            <h3 class="text-md md:text-3xl lg:text-4xl text-[#03254b] font-bold {{ app()->getLocale() === 'cn' ? 'text-md md:text-xl lg:text-[24px]' : '' }}">
            {{ app()->getLocale() === 'en'
                ? 'Building Trust, Creating Value, Shaping the Future.'
                : (app()->getLocale() === 'kh'
                    ? 'កសាងទំនុកចិត្ត បង្កើតគុណតម្លៃ បង្កើតអនាគតដ៏ប្រសើរ'
                    : '建立信任。创造价值。塑造未来。')
            }}
            </h3>

            <p class="text-md md:text-xl max-w-2xl font-semibold text-[#03254b] mx-auto lg:mx-0 text-left {{ app()->getLocale() === 'cn' ? 'text-[12px] md:text-[14px]' : '' }}">
                “ {{ app()->getLocale() === 'en'
                ? 'Mid-range villas, condos, and shophouses designed for comfortable living and long-term value in prime locations.'
                : (app()->getLocale() === 'kh'
                    ? 'គម្រោងយើងខ្ញុំមានផ្ទះវីឡា ស្សបហោសន៍ ដីឡូត៍ ខុនដូ រចនាឡើងសម្រាប់ការរស់នៅប្រកបដោយផាសុកភាព និងទទួលបានគុណតម្លៃរយៈពេលវែងក្នុងទីតាំងល្អៗ'
                    : '中档别墅、公寓和商铺，专为舒适生活和长期保值而设计，位于黄金地段。')
            }}”
            </p>

            <div class="flex justify-center lg:justify-start md:mt-0">
                <div class="bg-[#f2b34e] w-64 h-12 md:w-72 md:h-20
                            flex justify-center items-center
                            rounded-full md:mt-16">
                    <a href="#contact-form" class="text-lg md:text-xl text-[#03254b] font-bold">
                         {{ app()->getLocale() === 'en'
                                ? 'Book a Site Visit'
                                : (app()->getLocale() === 'kh'
                                    ? 'ទស្សនាគម្រោងផ្ទាល់'
                                    : '安排实地考察行程')
                            }}
                    </a>
                </div>
            </div>
        </div>

        <!-- RIGHT SOCIAL / LANGUAGE -->
        <div class="flex flex-col items-center gap-6">
            <!-- Language -->
            <div class="relative flex justify-center items-center w-16 h-16 rounded-full">
                <button id="langBtn" class="flex justify-center items-center bg-[#03244a]
                           w-10 h-10 rounded-full cursor-pointer">
                    <span class="text-white text-lg font-semibold">
                        {{ strtoupper(app()->getLocale()) }}
                    </span>
                </button>

                <div id="langDropdown" class="absolute top-14 hidden flex-col gap-2 space-y-2
                           bg-white shadow-lg rounded-full p-2 z-50">
                </div>
            </div>

            <!-- Social Icons -->
            <div class="w-16 h-96 rounded-full
                        flex flex-col justify-between items-center py-2 md:mt-0 -mt-8">

                {{-- Icon Link Social Media --}}
                <div class="w-16 h-96 rounded-full flex flex-col justify-between items-center py-2">
                     <a href="https://www.pinterest.com/PovBopheakLandandHome/?actingBusinessId=1128011175326800878" target="_blank"
                        class="flex justify-center items-center w-10 h-10 rounded-full cursor-pointer animate-bounce">
                        <img src="{{ asset('assets/icon/pinterest.svg') }}" alt="" class="w-full h-full object-cover">
                    </a>
                    <a href="https://www.facebook.com/PovBopheakGroup" target="_blank"
                        class="flex justify-center items-center w-12 h-12 rounded-full cursor-pointer animate-bounce">
                        <img src="{{ asset('assets/icon/fb.png') }}" alt="" class="w-full h-full object-cover">
                    </a>
                    <a href="https://t.me/+85516222809" target="_blank"
                        class="flex justify-center items-center w-12 h-12 rounded-full cursor-pointer animate-bounce">
                        <img src="{{ asset('assets/icon/te.png') }}" alt="" class="w-full h-full object-cover">
                    </a>
                    <a href="https://wa.me/85587446277?text=Hello%20I%20want%20more%20information"
                        target="_blank"
                        class="flex justify-center items-center w-12 h-12 rounded-full cursor-pointer animate-bounce">
                        <img src="{{ asset('assets/icon/whatsapp.png') }}" alt="" class="w-full h-full object-cover">
                    </a>
                    <a href="https://www.youtube.com/@PovBopheakLandandHomeCambodia" target="_blank"
                        class="flex justify-center items-center w-12 h-12 rounded-full cursor-pointer animate-bounce">
                        <img src="{{ asset('assets/icon/youtube.png') }}" alt="" class="w-full h-full object-cover">
                    </a>
                    <a href="https://www.tiktok.com/@povbopheaklandandhome?_r=1&_t=ZS-92yM8DJyKCW" target="_blank"
                        class="flex justify-center items-center w-12 h-12 rounded-full cursor-pointer animate-bounce">
                        <img src="{{ asset('assets/icon/tiktok.png') }}" alt="" class="w-full h-full object-cover">
                    </a>
                    <a href="" target="_blank"
                        class="flex justify-center items-center w-12 h-12 rounded-full cursor-pointer animate-bounce">
                        <img src="{{ asset('assets/icon/wechat.png') }}" alt="" class="w-full h-full object-cover">
                    </a>
                    <a href="https://www.linkedin.com/company/pov-bopheak-land-home-co-ltd/?viewAsMember=true" target="_blank"
                        class="flex justify-center items-center w-12 h-12 rounded-full cursor-pointer animate-bounce ">
                        <img src="{{ asset('assets/icon/in.png') }}" alt="" class="w-full h-full object-cover">
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
    let currentLang = "{{ strtoupper(app()->getLocale()) }}";
</script>
<script>
    const languages = ['EN', 'KH', 'CN']; // all languages
    // let currentLang = 'En';

    const langBtn = document.getElementById('langBtn');
    const currentLangText = document.getElementById('currentLangText');
    const langDropdown = document.getElementById('langDropdown');

    // Function to render dropdown dynamically
    function renderDropdown() {
        langDropdown.innerHTML = '';
        languages.forEach(lang => {
            if (lang !== currentLang) {
                const btn = document.createElement('button');
                btn.textContent = lang;
                btn.className =
                    "flex justify-center items-center bg-[#03244a] w-10 h-10 rounded-full text-white font-semibold hover:bg-[#054078]";
                btn.onclick = () => changeLang(lang);
                langDropdown.appendChild(btn);
            }
        });
    }


    // Function to change language
    function changeLang(lang) {
        // Prevent reloading same language
        if (lang.toLowerCase() === currentLang.toLowerCase()) return;

        window.location.href = `/lang/${lang.toLowerCase()}`;
    }


    // Toggle dropdown visibility
    langBtn.addEventListener('click', () => {
        langDropdown.classList.toggle('hidden');
        renderDropdown();
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function (e) {
        if (!langBtn.contains(e.target) && !langDropdown.contains(e.target)) {
            langDropdown.classList.add('hidden');
        }
    });

    // Initialize dropdown on page load
    renderDropdown();
</script>


