<div class="relative w-full mt-14">
    <img src="{{ asset('assets/background/bg-footer.png') }}" alt="" class="w-full h-full object-cover">
    <div class="absolute inset-0 flex flex-col justify-center items-center">
        <h1 class="text-2xl md:text-5xl lg:text-6xl font-bold py-4 lg:py-6"
            style="background: linear-gradient(90deg, #F2A93F 0%, #FFFBA6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;">
            {{ app()->getLocale() === 'en'
                ? 'Pov Bopheak Land & Home'
                : (app()->getLocale() === 'kh'
                    ? 'ក្រុមហ៊ុនពៅបូភ័ក្ត្រលែន & ហូម'
                    : 'Pov Bopheak Land & Home') }}
        </h1>
        <p class="text-white text-md sm:text-lg md:text-xl lg:text-2xl py-0 lg:py-4">
            {{ app()->getLocale() === 'en'
                ? 'Building Trust, Creating Value, Shaping the Future.'
                : (app()->getLocale() === 'kh'
                    ? 'កសាងទំនុកចិត្ត បង្កើតតម្លៃ បង្កើតអនាគតដ៏ប្រសើរ'
                    : '建立信任。创造价值。塑造未来。') }}
        </p>
    </div>
</div>

<div>
    <svg viewBox="0 0 1432 11" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="1442" height="11" fill="url(#paint0_linear_85_1339)" />
        <defs>
            <linearGradient id="paint0_linear_85_1339" x1="0" y1="5.5" x2="1442" y2="5.5"
                gradientUnits="userSpaceOnUse">
                <stop stop-color="#F2A93F" />
                <stop offset="1" stop-color="#FFFBA6" />
            </linearGradient>
        </defs>
    </svg>
</div>

<div id="contact-us"
    class="mx-auto flex md:flex-row flex-col justify-center items-start md:items-center relative w-full h-auto bg-[#03254B] md:px-14 md:py-8 px-4 py-4 space-y-0 md:space-y-4">
    <div class="lg:px-6 px-2">
        {{-- Logo --}}
        <div class="flex items-center gap-3">
            <!-- Logo -->
            <img src="{{ asset('assets/logo/logo-fina.png') }}" alt="Logo" class="w-14 h-auto">

            <!-- Text -->
            <div class="flex items-center text-[#ffffff] text-sm md:text-lg">
                <span class="font-semibold">
                    {{ app()->getLocale() === 'en'
                        ? 'Pov Bopheak'
                        : (app()->getLocale() === 'kh'
                            ? 'ក្រុមហ៊ុនពៅបូភ័ក្ត្រ'
                            : 'Pov Bopheak ') }}
                </span>
                <span class="font-normal ml-1">
                    {{ app()->getLocale() === 'en'
                        ? 'Land & Home Co., Ltd'
                        : (app()->getLocale() === 'kh'
                            ? 'លែន&ហូមឯ.ក'
                            : 'Land & Home 有限公司') }}
                </span>
            </div>
        </div>
        {{-- Buuton Back --}}
        <div class="absolute top-6 right-6 z-50 hidden" id="btn-back">
            <button onclick="closePrivacy()" class="text-[#ffffff] font-medium hover:underline cursor-pointer">
                <svg width="46" height="46" viewBox="0 0 46 46" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M14 18L22.4194 27L32 18" stroke="white" stroke-width="5" stroke-linecap="round" />
                    <circle cx="23" cy="23" r="22" stroke="white" stroke-width="2" />
                </svg>
            </button>
        </div>

        <div class="py-4" id="get-in-touch">
            <h1 class="text-sm md:text-lg font-semibold text-white py-4">
                {{ app()->getLocale() === 'en'
                    ? 'Our Social Media Channels'
                    : (app()->getLocale() === 'kh'
                        ? 'បណ្តាញសង្គមរបស់យើងខ្ញ៉ំ'
                        : ' 我们的社交媒体频道') }}
            </h1>
            {{-- Icon Link Social Media --}}
            <div class="flex md:flex-row flex-wrap justify-start items-center space-x-0 md:space-x-4">
                <a href="https://www.pinterest.com/PovBopheakLandandHome/?actingBusinessId=1128011175326800878" target="_blank"
                        class="flex justify-center items-center w-10 h-10 rounded-full cursor-pointer">
                        <img src="{{ asset('assets/icon/pinterest.svg') }}" alt="" class="w-full h-full object-cover">
                </a>
                <a href="https://www.facebook.com/PovBopheakGroup"
                    class="flex justify-center items-center w-12 h-12 rounded-full cursor-pointer">
                    <img src="{{ asset('assets/icon/fb.png') }}" alt="" class="w-full h-full object-cover">
                </a>
                 <a href="https://www.instagram.com/povbopheak.landandhome?igsh=eW9iajY0bzU1d3Ex"
                    class="flex justify-center items-center w-12 h-12 rounded-full cursor-pointer">
                    <img src="{{ asset('assets/icon/instagram-application-logo.png') }}" alt="" class="w-full h-full object-cover">
                </a>
                <a href="https://t.me/+85516222809"
                    class="flex justify-center items-center w-12 h-12 rounded-full cursor-pointer">
                    <img src="{{ asset('assets/icon/te.png') }}" alt="" class="w-full h-full object-cover">
                </a>
                <a href="https://wa.me/85587446277?text=Hello%20I%20want%20more%20information"
                    class="flex justify-center items-center w-12 h-12 rounded-full cursor-pointer">
                    <img src="{{ asset('assets/icon/whatsapp.png') }}" alt=""
                        class="w-full h-full object-cover">
                </a>
                <a href="https://www.youtube.com/@povbopheaklandhome3948"
                    class="flex justify-center items-center w-12 h-12 rounded-full cursor-pointer">
                    <img src="{{ asset('assets/icon/youtube.png') }}" alt=""
                        class="w-full h-full object-cover">
                </a>
                <a href="https://www.tiktok.com/@povbopheaklandandhome?_r=1&_t=ZS-92yM8DJyKCW"
                    class="flex justify-center items-center w-12 h-12 rounded-full cursor-pointer">
                    <img src="{{ asset('assets/icon/tiktok.png') }}" alt="" class="w-full h-full object-cover">
                </a>
                <a href="" class="flex justify-center items-center w-12 h-12 rounded-full cursor-pointer">
                    <img src="{{ asset('assets/icon/wechat.png') }}" alt="" class="w-full h-full object-cover">
                </a>
                <a href="https://www.linkedin.com/company/pov-bopheak-land-home-co-ltd/?viewAsMember=true"
                    class="flex justify-center items-center w-12 h-12 rounded-full cursor-pointer">
                    <img src="{{ asset('assets/icon/in.png') }}" alt="" class="w-full h-full object-cover">
                </a>
            </div>
        </div>

        {{-- Section bottom full width --}}
        <div class="flex lg:flex-row flex-col text-white py-8 -mt-4 md:-mt-10">
            {{-- Contact us --}}
            <div class="lg:w-[45%]">
                <div>
                    <h1 class="text-sm md:text-lg font-semibold"
                        style="background: linear-gradient(90deg, #F2A93F 0%, #FFFBA6 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                    text-fill-color: transparent;">
                        {{ app()->getLocale() === 'en' ? 'Contact Us' : (app()->getLocale() === 'kh' ? 'ការទំនាក់ទំនង' : '联系方法') }}
                    </h1>
                </div>
                <div class="space-y-2 md:text-md text-sm">
                    <p class="max-w-7xl py-4">
                        {{ app()->getLocale() === 'en'
                            ? 'Pov Bopheak Land & Home.'
                            : (app()->getLocale() === 'kh'
                                ? 'ក្រុមហ៊ុន ពៅបូភ័ក្ត្រ លែន & ហូម ឯ.ក'
                                : 'Pov Bopheak Land & Home.') }}
                    </p>
                    <p>info@povbopheak.com</p>
                    <p>www.pblandandhome.com.kh</p>
                    <p>www.povbopheak.com</p>
                </div>

            </div>
        </div>
    </div>

    {{-- Map of Location --}}
    <div
        class="h-auto flex xl:flex-row flex-col justify-between px-2 lg:px-10 space-y-4 text-white -mt-6 md:mt-8 py-4 md:py-8">
        <div class="space-y-2 lg:px-2 lg:mt-0 mt-0 md:mt-6">
            <h1 class="text-sm md:text-lg font-semibold"
                style="background: linear-gradient(90deg, #F2A93F 0%, #FFFBA6 100%);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        background-clip: text;
                        text-fill-color: transparent;">
                {{ app()->getLocale() === 'en'
                    ? 'Phnom Penh Office'
                    : (app()->getLocale() === 'kh'
                        ? 'ការិយាល័យកណ្តាលនៅក្រុងភ្នំពេញ'
                        : '金边办事处') }}
            </h1>
            <p class="xl:h-24 max-w-[300px] md:text-md text-sm py-2">
                {{ app()->getLocale() === 'en'
                    ? '#67D, St. 777, Borey Vimean Phnom Penh 598, Village 4, Sangkat Chrang Chamres, Khan Russey Keo, Phnom Penh, Cambodia'
                    : (app()->getLocale() === 'kh'
                        ? 'ផ្ទះលេខ67D, ផ្លូវ 777, បុរីវិមានភ្នំពេញភ្នំពេញ 598, ភូមិ 4, សង្កាត់ច្រាំងចំរេះ, ខណ្ឌឬស្សីកែវ, ក្រុងភ្នំពេញ, ប្រទេសកម្ពុជា'
                        : '柬埔寨 金边市 克朗查姆雷区 鲁西耶科县 第 4 村 博雷维梅安 街 777 号 67D 号。') }}
            </p>
            {{-- Map --}}
            <div class="w-full xl:w-72 h-32 rounded-lg flex justify-center items-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3740.070016297376!2d104.88439477480213!3d11.623954042990075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310953002172e7a9%3A0x1c5e614ac11878b6!2sPov%20Bopheak%20Land%20%26%20Home!5e1!3m2!1skm!2skh!4v1768798033272!5m2!1skm!2skh"
                    class="rounded-lg w-full" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="space-y-2 lg:px-2 lg:mt-0 mt-6">
            <h1 class="text-sm md:text-lg font-semibold"
                style="background: linear-gradient(90deg, #F2A93F 0%, #FFFBA6 100%);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        background-clip: text;
                        text-fill-color: transparent;">
                {{ app()->getLocale() === 'en'
                    ? 'Siem Reap Office'
                    : (app()->getLocale() === 'kh'
                        ? 'ការិយាល័យនៅខេត្តសៀមរាប'
                        : '暹粒办事处') }}
            </h1>
            <p class="xl:h-24 max-w-md md:text-md text-sm">
                {{ app()->getLocale() === 'en'
                    ? 'Sna Techo Village, Balang Commune, Prasat Bakong District, Siem Reap Province, Cambodia.'
                    : (app()->getLocale() === 'kh'
                        ? 'ភូមិស្នាតេជោ ឃុំបាឡាំង ស្រុកប្រាសាទបាគង ខេត្តសៀមរាប ្របទេសកម្ពុជា'
                        : '柬埔寨 暹粒省 巴朗公社斯 纳特科村 普萨特巴孔区。') }}
            </p>
            {{-- Map --}}
            <div class="w-full xl:w-72 h-32 rounded-lg flex justify-center items-center md:mt-0 mt-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14792.75472708665!2d104.09799600000001!3d13.469979!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3110390043ac3b81%3A0xda10418112d97440!2sPov%20Bopheak%20Kulen%20Home!5e1!3m2!1sen!2skh!4v1768809798264!5m2!1sen!2skh"
                    class="rounded-lg w-full" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>

<div class="relative w-full h-auto flex flex-col items-center py-4"
    style="background: linear-gradient(90deg, #F2A93F 0%, #FFFBA6 100%);">

    <!-- Logo / Title -->
    <div class="flex items-center py-2 text-lg space-x-2">
        <p class="text-[#03254B] font-semibold">
            {{ app()->getLocale() === 'en'
                ? 'Pov Bopheak'
                : (app()->getLocale() === 'kh'
                    ? 'ក្រុមហ៊ុនពៅបូភ័ក្ត្រ'
                    : 'Pov Bopheak') }}
        </p>
        <span class="text-[#03254B] font-normal">
            {{ app()->getLocale() === 'en'
                ? 'Land & Home Co., Ltd.'
                : (app()->getLocale() === 'kh'
                    ? 'លែន&ហូមឯ.ក'
                    : 'Land & Home 有限公司') }}
        </span>
    </div>

    <!-- Menu -->
    <div x-data="{ showPrivacyModal: false }">

        <!-- Navigation -->
        <ul
            class="flex lg:flex-row flex-wrap justify-center space-y-2 px-4 py-3 lg:space-x-6 text-[#03254b] lg:text-lg text-[12px] space-x-3 font-normal">
            <li><a
                    href="{{ route('home') }}">{{ app()->getLocale() === 'en' ? 'Home' : (app()->getLocale() === 'kh' ? 'ទំព័រដើម' : '住宅') }}</a>
            </li>
            <li><a
                    href="{{ route('home') }}#about-us">{{ app()->getLocale() === 'en' ? 'About Us' : (app()->getLocale() === 'kh' ? 'អំពីក្រុមហ៊ុន' : '关于公司') }}</a>
            </li>
            <li><a href="{{ route('home') }}#real-project">
                    {{ app()->getLocale() === 'en'
                        ? 'Real Estate Projects'
                        : (app()->getLocale() === 'kh'
                            ? 'គម្រោងអចលទ្រព្យ'
                            : '房地产项目') }}</a>
            </li>
            <li><a href="{{ route('home') }}#our-customer">
                    {{ app()->getLocale() === 'en' ? 'Our Customers' : (app()->getLocale() === 'kh' ? 'អតិថិជន' : '我们的团队') }}</a>
            </li>
            <li><a
                    href="{{ route('home') }}#freelancer">{{ app()->getLocale() === 'en'
                        ? 'Freelancers'
                        : (app()->getLocale() === 'kh'
                            ? 'អ្នកធ្វើការឯករាជ្យ'
                            : '自由工作者') }}</a>
            </li>
            <li><a href="{{ route('home') }}#application-form">
                    {{ app()->getLocale() === 'en' ? 'Contact Us' : (app()->getLocale() === 'kh' ? 'ការទំនាក់ទំនង' : '联系方法') }}</a>
            </li>
            <li class="font-medium">
                <button @click="showPrivacyModal = true" class="cursor-pointer">
                    {{ app()->getLocale() === 'en'
                        ? 'Privacy Policy'
                        : (app()->getLocale() === 'kh'
                            ? 'គោលការណ៍ឯកជនភាព'
                            : 'Privacy Policy') }}</button>
            </li>
        </ul>

        <!-- Privacy Policy Modal -->
        <div x-show="showPrivacyModal" x-transition.opacity
            class="fixed inset-0 bg-black/20 flex items-center justify-center z-50 px-4" style="display: none;">

            <div @click.away="showPrivacyModal = false"
                class="bg-white max-w-7xl w-full px-4 py-8 lg:p-8 relative overflow-y-auto max-h-[80vh]">

                <!-- Close Button -->
                <button @click="showPrivacyModal = false"
                    class="fixed top-16 right-8 md:top-20 z-50 xl:text-white text-black hover:text-gray-700 md:text-4xl text-2xl font-bold">&times;</button>

                <!-- Modal Content -->
                <h2 class="text-2xl font-semibold mb-4 text-[#03254b]">
                    {{ app()->getLocale() === 'en'
                        ? 'Privacy Policy'
                        : (app()->getLocale() === 'kh'
                            ? 'គោលការណ៍ឯកជនភាព'
                            : 'Privacy Policy') }}
                </h2>
                <div class="text-[#03254b] grid grid-cols-1 lg:grid-cols-2 gap-6 text-[12px] lg:text-[14px]">
                    {{-- Section left --}}
                    <div class="w-full text-[#03254b] text-md py-2">

                        <h1 class="text-lg font-semibold">
                            {{ app()->getLocale() === 'en'
                                ? 'Introduction'
                                : (app()->getLocale() === 'kh'
                                    ? 'សេចក្តីផ្តើម'
                                    : 'Introduction') }}
                        </h1>
                        <h1 class="text-lg font-semibold mt-4">
                            {{ app()->getLocale() === 'en'
                                ? 'Pov Bopheak Land & Home Co., Ltd.'
                                : (app()->getLocale() === 'kh'
                                    ? 'ក្រុមហ៊ុនពៅបូភ័ក្ត្រលែន&ហូមឯ.ក'
                                    : 'Pov Bopheak Land & Home Co., Ltd.') }}
                        </h1>
                        <div class="font-normal space-y-4">
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? '(referred to as “we”, “our” or “us” in this Privacy Policy)
                                                                operates the websites located at www.pblandandhome.com.kh and www.povbopheak.com,
                                                                including any subdomains, mobile versions, and any related digital platforms
                                                                (collectively referred to as the “Websites”).'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ក្រុមហ៊ុនពៅបូភ័ក្ត្រលែន&ហូមឯ.ក  (ហៅកាត់ថា "យើង" "របស់យើង" ឬ "ពួកយើង" នៅក្នុងគោលការណ៍ឯកជនភាពនេះ) ដំណើរការគេហទំព័រដែលមានអាសយដ្ឋានគេហទំព័រ www.pblandandhome.com.kh និង www.povbopheak.com រួមទាំងដែនរងណាមួយ កំណែទូរស័ព្ទ និងវេទិកាឌីជីថលពាក់ព័ន្ធណាមួយ (ហៅរួមគ្នាថា "គេហទំព័រ")។'
                                        : '(referred to as “we”, “our” or “us” in this Privacy Policy)
                                                                operates the websites located at www.pblandandhome.com.kh and www.povbopheak.com,
                                                                including any subdomains, mobile versions, and any related digital platforms
                                                                (collectively referred to as the “Websites”).') }}
                            </p>
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'This Privacy Policy sets out how we collect, use, disclose,
                                                                store, and protect personal information obtained through our Websites and related
                                                                services.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'គោលការណ៍ឯកជនភាពនេះកំណត់ពីរបៀបដែលយើងខ្ញ៉ំប្រមូល ប្រើប្រាស់ បង្ហាញ រក្សាទុក និងការពារព័ត៌មានផ្ទាល់ខ្លួនដែលទទួលបានតាមរយៈគេហទំព័រ និងសេវាកម្មពាក់ព័ន្ធ។'
                                        : 'This Privacy Policy sets out how we collect, use, disclose,
                                                                store, and protect personal information obtained through our Websites and related
                                                                services.') }}
                            </p>
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'By accessing or using our Websites, or by engaging with us through our online services,
                                                                you acknowledge that you have read, understood, and agreed to the collection and
                                                                handling of
                                                                your personal information in accordance with this Privacy Policy.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ដោយការចូលប្រើ ឬប្រើប្រាស់គេហទំព័ររបស់យើង ខ្ញំ​ឬដោយការចូលរួមជាមួយយើងខ្ញ៉ំតាមរយៈសេវាកម្មអនឡាញ អ្នកទទួលស្គាល់ថាអ្នកបានអាន យល់ និងយល់ព្រមចំពោះការប្រមូល និងដោះស្រាយព័ត៌មានផ្ទាល់ខ្លួនរបស់អ្នកស្របតាមគោលការណ៍ឯកជនភាពនេះ។'
                                        : 'By accessing or using our Websites, or by engaging with us through our online services,
                                                                you acknowledge that you have read, understood, and agreed to the collection and
                                                                handling of
                                                                your personal information in accordance with this Privacy Policy.') }}
                            </p>
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? ' We reserve the right to update or amend this Privacy Policy at any time at our
                                                                discretion. Any
                                                                changes will be effective
                                                                immediately upon publication on our Websites. We encourage you to review this Privacy
                                                                Policy
                                                                periodically.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'យើងខ្ញុំរក្សាសិទ្ធិក្នុងការធ្វើបច្ចុប្បន្នភាពឬកែប្រែគោលការណ៍ឯកជនភាពនេះនៅពេលណាក៏បានតាមការសំរេចចិត្តរបស់ក្រុមហ៊ុន។ ការផ្លាស់ប្តូរណាមួយនឹងមានប្រសិទ្ធភាពភ្លាមៗនៅពេលបោះពុម្ពផ្សាយនៅលើគេហទំព័រ។ យើងខ្ញ៉ំសូមលើកទឹកចិត្តអ្នកឱ្យពិនិត្យមើលគោលការណ៍ឯកជនភាពនេះជាប្រចាំ។'
                                        : ' We reserve the right to update or amend this Privacy Policy at any time at our
                                                                discretion. Any
                                                                changes will be effective
                                                                immediately upon publication on our Websites. We encourage you to review this Privacy
                                                                Policy
                                                                periodically.') }}
                            </p>
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'If you have questions, feedback, or concerns, you may contact us at:'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ប្រសិនបើអ្នកមានសំណួរ មតិកែលម្អ ឬកង្វល់ អ្នកអាចទាក់ទងមកយើងខ្ញុំតាមរយៈ៖'
                                        : 'If you have questions, feedback, or concerns, you may contact us at:') }}
                            </p>
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'Email: info@povbopheak.com'
                                    : (app()->getLocale() === 'kh'
                                        ? 'អ៊ីមែល៖ info@povbopheak.com'
                                        : 'Email: info@povbopheak.com') }}
                            </p>
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'Company: Pov Bopheak Land & Home Co., Ltd.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ក្រុមហ៊ុនពៅបូភ័ក្ត្រលែន&ហូមឯ.ក'
                                        : 'Company: Pov Bopheak Land & Home Co., Ltd.') }}
                            </p>
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'Jurisdiction: Kingdom of Cambodia'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ដែនសមត្ថកិច្ច៖ ព្រះរាជាណាចក្រកម្ពុជា'
                                        : 'Jurisdiction: Kingdom of Cambodia') }}
                            </p>
                        </div>

                        <h1 class="text-lg font-semibold py-4">
                            {{ app()->getLocale() === 'en'
                                ? 'Respecting Information Privacy'
                                : (app()->getLocale() === 'kh'
                                    ? 'ការគោរពភាពឯកជននៃព័ត៌មាន'
                                    : 'Respecting Information Privacy') }}
                        </h1>
                        <div class="font-normal space-y-4">
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'We recognise the importance of protecting your personal information and are committed to handling it responsibly.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'យើងខ្ញុំទទួលស្គាល់ពីសារៈសំខាន់នៃការការពារព័ត៌មានផ្ទាល់ខ្លួនរបស់អ្នក ហើយប្តេជ្ញាដោះស្រាយវាដោយការទទួលខុសត្រូវ។'
                                        : 'We recognise the importance of protecting your personal information and are committed to handling it responsibly.') }}
                            </p>
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'We do not intentionally collect sensitive personal data such as information relating to
                                                                ethnicity,
                                                                religion, political opinions, criminal records, health data, or biometric data.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'យើងខ្ញុំមិនប្រមូលទិន្នន័យផ្ទាល់ខ្លួនដែលងាយរងគ្រោះដោយចេតនា ដូចជាព័ត៌មានទាក់ទងនឹងជនជាតិភាគតិច សាសនា មតិនយោបាយ កំណត់ត្រាព្រហ្មទណ្ឌ ទិន្នន័យសុខភាព ឬទិន្នន័យជីវមាត្រឡើយ។'
                                        : 'We do not intentionally collect sensitive personal data such as information relating to
                                                                ethnicity,
                                                                religion, political opinions, criminal records, health data, or biometric data.') }}
                            </p>
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'In collecting and processing personal information,
                                                                we comply with applicable laws and regulations of
                                                                the Kingdom of Cambodia and relevant data protection principles.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ក្នុងការប្រមូល និងដំណើរការព័ត៌មានផ្ទាល់ខ្លួន យើងខ្ញុំអនុវត្តតាមច្បាប់ និងបទប្បញ្ញត្តិជាធរមាននៃព្រះរាជាណាចក្រកម្ពុជា និងគោលការណ៍ការពារទិន្នន័យពាក់ព័ន្ធ។'
                                        : 'In collecting and processing personal information,
                                                                we comply with applicable laws and regulations of
                                                                the Kingdom of Cambodia and relevant data protection principles.') }}
                            </p>
                        </div>

                        <h1 class="text-lg font-semibold py-4">
                            {{ app()->getLocale() === 'en'
                                ? 'Problems or Questions'
                                : (app()->getLocale() === 'kh'
                                    ? 'បញ្ហា ឬសំណួរ'
                                    : 'Problems or Questions') }}
                        </h1>
                        <div class="font-normal space-y-4">
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'If we become aware of any issues or concerns relating to privacy or data protection on
                                                                our Websites,
                                                                we take them seriously and work to resolve them promptly.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ប្រសិនបើយើងខ្ញុំដឹងពីបញ្ហា ឬកង្វល់ណាមួយទាក់ទងនឹងភាពឯកជន ឬការការពារទិន្នន័យនៅលើគេហទំព័ររបស់យើងខ្ញុំ យើងខ្ញុំយកចិត្តទុកដាក់យ៉ាងខ្លាំង ហើយខិតខំដោះស្រាយវាឱ្យបានឆាប់រហ័ស។'
                                        : 'If we become aware of any issues or concerns relating to privacy or data protection on
                                                                our Websites,
                                                                we take them seriously and work to resolve them promptly.') }}
                            </p>
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? ' If you have any questions, requests, or complaints regarding this Privacy Policy or the
                                                                way your
                                                                personal information is handled, please contact us using the details provided above.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ប្រសិនបើអ្នកមានសំណួរ សំណើ ឬពាក្យបណ្តឹងណាមួយទាក់ទងនឹងគោលការណ៍ឯកជនភាពនេះ ឬវិធីដែលព័ត៌មានផ្ទាល់ខ្លួនរបស់អ្នកត្រូវបានដោះស្រាយ សូមទាក់ទងមកយើងខ្ញុំដោយប្រើប្រាស់ព័ត៌មានលម្អិតដែលបានផ្តល់ជូនខាងលើ។'
                                        : ' If you have any questions, requests, or complaints regarding this Privacy Policy or the
                                                                way your
                                                                personal information is handled, please contact us using the details provided above.') }}
                            </p>
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'Collection of Personal Information'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ការប្រមូលព័ត៌មានផ្ទាល់ខ្លួន'
                                        : 'Collection of Personal Information') }}
                            </p>
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'We may collect personal information directly from you or indirectly through your
                                                                use of our Websites, including but not limited to:'
                                    : (app()->getLocale() === 'kh'
                                        ? 'យើងខ្ញុំអាចប្រមូលព័ត៌មានផ្ទាល់ខ្លួនដោយផ្ទាល់ពីអ្នក ឬដោយប្រយោលតាមរយៈការប្រើប្រាស់គេហទំព័ររួមមានប៉ុន្តែមិនកំណត់ចំពោះ៖'
                                        : 'We may collect personal information directly from you or indirectly through your
                                                                use of our Websites, including but not limited to:') }}
                            </p>
                            <ul class="list-disc pl-6 space-y-3">
                                <li>
                                    {{ app()->getLocale() === 'en'
                                        ? 'Your name, email address, telephone number, postal address,
                                                                        and other contact details'
                                        : (app()->getLocale() === 'kh'
                                            ? 'ឈ្មោះ អាសយដ្ឋានអ៊ីមែល លេខទូរស័ព្ទ អាសយដ្ឋានប្រៃសណីយ៍ និងព័ត៌មានទំនាក់ទំនងផ្សេងទៀតរបស់អ្នក'
                                            : 'Your name, email address, telephone number, postal address,
                                                                        and other contact details') }}
                                </li>

                                <li>
                                    {{ app()->getLocale() === 'en'
                                        ? 'Information provided when you:'
                                        : (app()->getLocale() === 'kh'
                                            ? 'ព័ត៌មានដែលផ្តល់ជូននៅពេលអ្នក៖'
                                            : 'Information provided when you:') }}
                                    <ul class="list-disc pl-6 mt-2 space-y-2">
                                        <li>
                                            {{ app()->getLocale() === 'en'
                                                ? 'Register or enquire through our Websites'
                                                : (app()->getLocale() === 'kh'
                                                    ? 'ចុះឈ្មោះ ឬសាកសួរតាមរយៈគេហទំព័ររបស់យើង'
                                                    : 'Register or enquire through our Websites') }}
                                        </li>
                                        <li>
                                            {{ app()->getLocale() === 'en'
                                                ? 'Fill in forms or submit property enquiries'
                                                : (app()->getLocale() === 'kh'
                                                    ? 'បំពេញទម្រង់បែបបទ ឬដាក់ស្នើសំណួរអំពីអចលនទ្រព្យ'
                                                    : 'Fill in forms or submit property enquiries') }}
                                        </li>
                                        <li>
                                            {{ app()->getLocale() === 'en'
                                                ? 'Contact us for support, services, or information'
                                                : (app()->getLocale() === 'kh'
                                                    ? 'ទាក់ទងមកយើងសម្រាប់ការគាំទ្រ សេវាកម្ម ឬព័ត៌មាន'
                                                    : 'Contact us for support, services, or information') }}
                                        </li>
                                        <li>
                                            {{ app()->getLocale() === 'en'
                                                ? 'Participate in surveys, promotions, or feedback requests'
                                                : (app()->getLocale() === 'kh'
                                                    ? 'ចូលរួមក្នុងការស្ទង់មតិ ការផ្សព្វផ្សាយ ឬសំណើមតិកែលម្អ'
                                                    : 'Participate in surveys, promotions, or feedback requests') }}
                                        </li>
                                        <li>
                                            {{ app()->getLocale() === 'en'
                                                ? 'Communicate with us via email or other channels'
                                                : (app()->getLocale() === 'kh'
                                                    ? 'ទំនាក់ទំនងជាមួយយើងតាមរយៈអ៊ីមែល ឬបណ្តាញផ្សេងទៀត'
                                                    : 'Communicate with us via email or other channels') }}
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    {{ app()->getLocale() === 'en'
                                        ? 'Details of property enquiries, transactions, or expressions of interest'
                                        : (app()->getLocale() === 'kh'
                                            ? 'ព័ត៌មានលម្អិតនៃការសាកសួរអំពីអចលនទ្រព្យ ប្រតិបត្តិការ ឬការបង្ហាញចំណាប់អារម្មណ៍'
                                            : 'Details of property enquiries, transactions, or expressions of interest') }}
                                </li>

                                <li>
                                    {{ app()->getLocale() === 'en'
                                        ? 'Information about your visits to our Websites, including:'
                                        : (app()->getLocale() === 'kh'
                                            ? 'ព័ត៌មានរបស់អ្នកអំពីការចូលមើលគេហទំព័ររបស់យើង រួមមាន៖'
                                            : 'Information about your visits to our Websites, including:') }}
                                    <ul class="list-disc pl-6 mt-2 space-y-2">
                                        <li>{{ app()->getLocale() === 'en' ? 'IP address' : (app()->getLocale() === 'kh' ? 'អាសយដ្ឋាន IP' : 'IP address') }}
                                        </li>
                                        <li>{{ app()->getLocale() === 'en'
                                            ? 'Browser type and device information'
                                            : (app()->getLocale() === 'kh'
                                                ? 'ប្រភេទកម្មវិធីរុករក និងព័ត៌មានឧបករណ៍'
                                                : 'Browser type and device information') }}
                                        </li>
                                        <li>
                                            {{ app()->getLocale() === 'en'
                                                ? 'Pages visited, time spent, and interaction data'
                                                : (app()->getLocale() === 'kh'
                                                    ? 'ទំព័រដែលបានចូលមើល ពេលវេលាដែលបានចំណាយ និងទិន្នន័យអន្តរកម្ម'
                                                    : 'Pages visited, time spent, and interaction data') }}
                                        </li>
                                        <li>{{ app()->getLocale() === 'en'
                                            ? 'Cookies and similar tracking technologies'
                                            : (app()->getLocale() === 'kh'
                                                ? 'ខូគី និងបច្ចេកវិទ្យាតាមដានស្រដៀងគ្នា'
                                                : 'Cookies and similar tracking technologies') }}
                                        </li>
                                    </ul>
                                </li>

                                <li class="md:max-w-lg">
                                    {{ app()->getLocale() === 'en'
                                        ? 'Information received from third parties or service providers,
                                                                        where permitted by law'
                                        : (app()->getLocale() === 'kh'
                                            ? 'ព័ត៌មានដែលទទួលបានពីភាគីទីបី ឬអ្នកផ្តល់សេវាកម្ម ដែលត្រូវបានអនុញ្ញាតដោយច្បាប់'
                                            : 'Information received from third parties or service providers,
                                                                        where permitted by law') }}
                                </li>
                            </ul>

                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'If you contact us, we may retain a record of that correspondence for service, compliance,
                                                                or quality
                                                                purposes.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ប្រសិនបើអ្នកទាក់ទងមកយើងខ្ញុំ យើងខ្ញ៉ំអាចរក្សាទុកកំណត់ត្រានៃការឆ្លើយឆ្លងនោះសម្រាប់គោលបំណងសេវាកម្ម ការអនុលោមតាមច្បាប់ ឬគុណភាព។'
                                        : 'If you contact us, we may retain a record of that correspondence for service, compliance,
                                                                or quality
                                                                purposes.') }}
                            </p>
                        </div>

                    </div>

                    {{-- Section right --}}
                    <div class="w-full text-[#03254b] text-md py-2">

                        <h1 class="text-lg font-semibold py-2">
                            {{ app()->getLocale() === 'en'
                                ? 'Use of Personal Information'
                                : (app()->getLocale() === 'kh'
                                    ? 'ការប្រើប្រាស់ព័ត៌មានផ្ទាល់ខ្លួន'
                                    : 'Use of Personal Information') }}
                        </h1>
                        <p>
                            {{ app()->getLocale() === 'en'
                                ? 'We may use your personal information to:'
                                : (app()->getLocale() === 'kh'
                                    ? 'យើងខ្ញុំអាចប្រើប្រាស់ព័ត៌មានផ្ទាល់ខ្លួនរបស់អ្នកដើម្បី៖'
                                    : 'We may use your personal information to:') }}
                        </p>
                        <ul class="list-disc pl-8">
                            <li> {{ app()->getLocale() === 'en'
                                ? 'Provide, manage, and improve our real estate services'
                                : (app()->getLocale() === 'kh'
                                    ? 'ផ្តល់ គ្រប់គ្រង និងកែលម្អសេវាកម្មអចលនទ្រព្យ'
                                    : 'Provide, manage, and improve our real estate services') }}
                            </li>
                            <li>
                                {{ app()->getLocale() === 'en'
                                    ? 'Respond to enquiries, requests, or feedback'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ឆ្លើយតបទៅនឹងការសាកសួរ សំណើ ឬមតិកែលម្អ'
                                        : 'Respond to enquiries, requests, or feedback') }}
                            </li>
                            <li>
                                {{ app()->getLocale() === 'en'
                                    ? 'Facilitate property listings, viewings, consultations, and transactions'
                                    : (app()->getLocale() === 'kh'
                                        ? 'សម្រួលដល់ការចុះបញ្ជីអចលនទ្រព្យ ការមើល ការពិគ្រោះយោបល់ និងប្រតិបត្តិការ'
                                        : 'Facilitate property listings, viewings, consultations, and transactions') }}
                            </li>
                            <li>
                                {{ app()->getLocale() === 'en'
                                    ? 'Personalise your experience on our Websites'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ធ្វើឱ្យបទពិសោធន៍របស់អ្នកមានលក្ខណៈផ្ទាល់ខ្លួននៅលើគេហទំព័រ'
                                        : 'Personalise your experience on our Websites') }}
                            </li>
                            <li>
                                {{ app()->getLocale() === 'en'
                                    ? 'Improve website functionality, performance, and security'
                                    : (app()->getLocale() === 'kh'
                                        ? 'កែលម្អមុខងារ ការអនុវត្ត និងសុវត្ថិភាពគេហទំព័រ'
                                        : 'Improve website functionality, performance, and security') }}
                            </li>
                            <li>
                                {{ app()->getLocale() === 'en'
                                    ? 'Conduct research, analysis, and internal reporting'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ធ្វើការស្រាវជ្រាវ ការវិភាគ និងការរាយការណ៍ផ្ទៃក្នុង'
                                        : 'Conduct research, analysis, and internal reporting') }}
                            </li>
                            <li>
                                {{ app()->getLocale() === 'en'
                                    ? 'Communicate with you about updates, services, or relevant property opportunities'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ទំនាក់ទំនងជាមួយអ្នកអំពីព័ត៌មានថ្មីៗ សេវាកម្ម ឬឱកាសអចលនទ្រព្យពាក់ព័ន្ធ'
                                        : 'Communicate with you about updates, services, or relevant property opportunities') }}
                            </li>
                            <li>
                                {{ app()->getLocale() === 'en'
                                    ? 'Comply with legal and regulatory obligations'
                                    : (app()->getLocale() === 'kh'
                                        ? 'អនុវត្តតាមកាតព្វកិច្ចផ្នែកច្បាប់ និងបទប្បញ្ញត្តិ'
                                        : 'Comply with legal and regulatory obligations') }}
                            </li>
                        </ul>
                        <p class="py-4">
                            {{ app()->getLocale() === 'en'
                                ? 'Where permitted, we may also use your information to inform you about promotions, new
                                                        projects,
                                                        or services that may be of interest to you. You may opt out of
                                                        marketing communications at any time by contacting us.'
                                : (app()->getLocale() === 'kh'
                                    ? 'កន្លែងដែលត្រូវបានអនុញ្ញាត យើងក៏អាចប្រើប្រាស់ព័ត៌មានរបស់អ្នកដើម្បីជូនដំណឹងដល់អ្នកអំពីការផ្សព្វផ្សាយ គម្រោងថ្មីៗ ឬសេវាកម្មដែលអ្នកអាចចាប់អារម្មណ៍
                            អ្នកអាចជ្រើសរើសមិនចូលរួមក្នុងការទំនាក់ទំនងទីផ្សារនៅពេលណាក៏បានដោយទាក់ទងមកយើងខ្ញុំ'
                                    : 'Where permitted, we may also use your information to inform you about promotions, new
                                                        projects,
                                                        or services that may be of interest to you. You may opt out of
                                                        marketing communications at any time by contacting us.') }}
                        </p>

                        <h1 class="text-lg font-semibold py-4">
                            {{ app()->getLocale() === 'en'
                                ? 'Disclosure of Personal Information'
                                : (app()->getLocale() === 'kh'
                                    ? 'ការបង្ហាញព័ត៌មានផ្ទាល់ខ្លួន'
                                    : 'Disclosure of Personal Information') }}
                        </h1>
                        <p>
                            {{ app()->getLocale() === 'en'
                                ? 'We may disclose your personal information to:'
                                : (app()->getLocale() === 'kh'
                                    ? 'យើងខ្ញុំអាចបង្ហាញព័ត៌មានផ្ទាល់ខ្លួនរបស់អ្នកទៅកាន់៖'
                                    : 'We may disclose your personal information to:') }}
                        </p>
                        <ul class="list-disc pl-8">
                            <li>
                                {{ app()->getLocale() === 'en'
                                    ? 'Property owners, developers, agents, or partners where you have requested information or
                                                                services'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ម្ចាស់អចលនទ្រព្យ អ្នកអភិវឌ្ឍន៍ ភ្នាក់ងារ ឬដៃគូដែលអ្នកបានស្នើសុំព័ត៌មាន ឬសេវាកម្ម'
                                        : 'Property owners, developers, agents, or partners where you have requested information or
                                                                services') }}
                            </li>
                            <li>
                                {{ app()->getLocale() === 'en'
                                    ? 'Third-party service providers who assist us in operating our business,
                                                                such as IT providers, hosting services, analytics providers, and marketing platforms'
                                    : (app()->getLocale() === 'kh'
                                        ? 'អ្នកផ្តល់សេវាកម្មភាគីទីបីដែលជួយយើងខ្ញ៉ំក្នុងការដំណើរការអាជីវកម្មរបស់យើង ដូចជាអ្នកផ្តល់សេវាកម្ម ពត៌មានវិទ្យា សេវាកម្មបង្ហោះ អ្នកវិភាគ និងវេទិកាទីផ្សារ'
                                        : 'Third-party service providers who assist us in operating our business,
                                                                such as IT providers, hosting services, analytics providers, and marketing platforms') }}
                            </li>
                            <li>
                                {{ app()->getLocale() === 'en'
                                    ? 'Professional advisers, including legal and financial advisers, where required'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ទីប្រឹក្សាជំនាញ រួមទាំងទីប្រឹក្សាផ្នែកច្បាប់ និងហិរញ្ញវត្ថុ ដែលត្រូវការ'
                                        : 'Professional advisers, including legal and financial advisers, where required') }}
                            </li>
                            <li>
                                {{ app()->getLocale() === 'en'
                                    ? 'Government authorities or regulatory bodies where disclosure is required by law'
                                    : (app()->getLocale() === 'kh'
                                        ? 'អាជ្ញាធររដ្ឋាភិបាល ឬស្ថាប័ននិយតកម្ម ដែលការបង្ហាញត្រូវបានទាមទារដោយច្បាប់'
                                        : 'Government authorities or regulatory bodies where disclosure is required by law') }}
                            </li>
                        </ul>
                        <p class="py-4">
                            {{ app()->getLocale() === 'en'
                                ? ' We take reasonable steps to ensure that third parties handle
                                                        personal information securely and in accordance with applicable privacy laws.
                                                        We do not sell your personal information to third parties.'
                                : (app()->getLocale() === 'kh'
                                    ? 'យើងខ្ញុំចាត់វិធានការសមហេតុផលដើម្បីធានាថាភាគីទីបីដោះស្រាយព័ត៌មានផ្ទាល់ខ្លួនដោយសុវត្ថិភាព និងស្របតាមច្បាប់ឯកជនភាពដែលអាចអនុវត្តបាន។ យើងខ្ញ៉ំមិនលក់ព័ត៌មានផ្ទាល់ខ្លួនរបស់អ្នកទៅឱ្យភាគីទីបីទេ។'
                                    : ' We take reasonable steps to ensure that third parties handle
                                                        personal information securely and in accordance with applicable privacy laws.
                                                        We do not sell your personal information to third parties.') }}
                        </p>

                        <h1 class="text-lg font-semibold py-4">
                            {{ app()->getLocale() === 'en'
                                ? 'Storage, Security, and Processing'
                                : (app()->getLocale() === 'kh'
                                    ? 'ការផ្ទុក សុវត្ថិភាព និងដំណើរការ'
                                    : 'Storage, Security, and Processing') }}
                        </h1>
                        <div class="space-y-2">
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? ' We take reasonable technical and organisational measures to safeguard personal
                                                                information against
                                                                loss,
                                                                misuse, unauthorised access, modification, or disclosure.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'យើងខ្ញុំចាត់វិធានការបច្ចេកទេស និងអង្គសមហេតុផលដើម្បីការពារព័ត៌មានផ្ទាល់ខ្លួនពីការបាត់បង់ ការប្រើប្រាស់ខុស ការចូលប្រើដោយគ្មានការអនុញ្ញាត ការកែប្រែ ឬការបង្ហាញ។'
                                        : ' We take reasonable technical and organisational measures to safeguard personal
                                                                information against
                                                                loss,
                                                                misuse, unauthorised access, modification, or disclosure.') }}
                            </p>
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'While we strive to protect your personal data, no method of transmission over the
                                                                internet or
                                                                electronic storage is completely secure. Accordingly,
                                                                we cannot guarantee absolute security but will act promptly in the event of a data
                                                                security
                                                                incident.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ខណៈពេលដែលយើងខ្ញុំខិតខំការពារទិន្នន័យផ្ទាល់ខ្លួនរបស់អ្នក គ្មានវិធីសាស្រ្តនៃការបញ្ជូនតាមអ៊ីនធឺណិត ឬការផ្ទុកអេឡិចត្រូនិចណាមួយមានសុវត្ថិភាពទាំងស្រុងនោះទេ។ ដូច្នេះ យើងខ្ញ៉ំមិនអាចធានាសុវត្ថិភាពដាច់ខាតបានទេ ប៉ុន្តែនឹងធ្វើសកម្មភាពភ្លាមៗក្នុងករណីមានឧប្បត្តិហេតុសុវត្ថិភាពទិន្នន័យ។'
                                        : 'While we strive to protect your personal data, no method of transmission over the
                                                                internet or
                                                                electronic storage is completely secure. Accordingly,
                                                                we cannot guarantee absolute security but will act promptly in the event of a data
                                                                security
                                                                incident.') }}
                            </p>
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'Access to personal information is restricted to
                                                                authorised personnel and service providers who require it for legitimate business
                                                                purposes.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'ការចូលប្រើព័ត៌មានផ្ទាល់ខ្លួនត្រូវបានកំណត់ចំពោះបុគ្គលិកដែលមានការអនុញ្ញាត និងអ្នកផ្តល់សេវាកម្មដែលត្រូវការវាសម្រាប់គោលបំណងអាជីវកម្មស្របច្បាប់។   '
                                        : 'Access to personal information is restricted to
                                                                authorised personnel and service providers who require it for legitimate business
                                                                purposes.') }}
                            </p>
                        </div>

                        <h1 class="text-lg font-semibold py-4">
                            {{ app()->getLocale() === 'en'
                                ? 'Transfer of Personal Information Outside Cambodia'
                                : (app()->getLocale() === 'kh'
                                    ? 'Transfer of Personal Information Outside Cambodia'
                                    : 'Transfer of Personal Information Outside Cambodia') }}
                        </h1>
                        <p>
                            {{ app()->getLocale() === 'en'
                                ? ' Your personal information may be stored or processed on servers located outside
                                                        the Kingdom of Cambodia, including through third-party hosting or cloud service providers.
                                                        Such transfers are undertaken solely for purposes such as secure storage, system
                                                        performance,
                                                        backup, and operational efficiency.
                                                        By providing your personal information, you consent to such transfers, subject to reasonable
                                                        safeguards.'
                                : (app()->getLocale() === 'kh'
                                    ? ' Your personal information may be stored or processed on servers located outside
                                                        the Kingdom of Cambodia, including through third-party hosting or cloud service providers.
                                                        Such transfers are undertaken solely for purposes such as secure storage, system
                                                        performance,
                                                        backup, and operational efficiency.
                                                        By providing your personal information, you consent to such transfers, subject to reasonable
                                                        safeguards.'
                                    : ' Your personal information may be stored or processed on servers located outside
                                                        the Kingdom of Cambodia, including through third-party hosting or cloud service providers.
                                                        Such transfers are undertaken solely for purposes such as secure storage, system
                                                        performance,
                                                        backup, and operational efficiency.
                                                        By providing your personal information, you consent to such transfers, subject to reasonable
                                                        safeguards.') }}

                        </p>

                        <h1 class="text-lg font-semibold py-4">
                            {{ app()->getLocale() === 'en'
                                ? 'Access, Correction, and Deletion'
                                : (app()->getLocale() === 'kh'
                                    ? 'Access, Correction, and Deletion'
                                    : 'Access, Correction, and Deletion') }}
                        </h1>
                        <p>
                            {{ app()->getLocale() === 'en'
                                ? 'We take reasonable steps to ensure that the personal information we hold is accurate and up to date.'
                                : (app()->getLocale() === 'kh'
                                    ? 'We take reasonable steps to ensure that the personal information we hold is accurate and up to date.'
                                    : 'We take reasonable steps to ensure that the personal information we hold is accurate and up to date.') }}

                        </p>

                        <div class="py-4">
                            <p> {{ app()->getLocale() === 'en'
                                ? 'You may request to:'
                                : (app()->getLocale() === 'kh'
                                    ? 'You may request to:'
                                    : 'You may request to:') }}
                            </p>
                            <ul class="list-disc pl-8">
                                <li>
                                    {{ app()->getLocale() === 'en'
                                        ? 'Access the personal information we hold about you'
                                        : (app()->getLocale() === 'kh'
                                            ? 'Access the personal information we hold about you'
                                            : 'Access the personal information we hold about you') }}
                                </li>
                                <li>
                                    {{ app()->getLocale() === 'en'
                                        ? 'Correct or update inaccurate information'
                                        : (app()->getLocale() === 'kh'
                                            ? 'Correct or update inaccurate information'
                                            : 'Correct or update inaccurate information') }}
                                </li>
                                <li>
                                    {{ app()->getLocale() === 'en'
                                        ? ' Request deletion of your personal information, subject to legal and contractual obligations'
                                        : (app()->getLocale() === 'kh'
                                            ? ' Request deletion of your personal information, subject to legal and contractual obligations'
                                            : ' Request deletion of your personal information, subject to legal and contractual obligations') }}
                                </li>
                            </ul>
                        </div>

                        <p>
                            {{ app()->getLocale() === 'en'
                                ? 'Requests can be made by contacting us at info@povbopheak.com.'
                                : (app()->getLocale() === 'kh'
                                    ? 'Requests can be made by contacting us at info@povbopheak.com.'
                                    : 'Requests can be made by contacting us at info@povbopheak.com.') }}
                        </p>

                        <h1 class="text-lg font-semibold py-4">
                            {{ app()->getLocale() === 'en'
                                ? 'Cookies and Web Beacons'
                                : (app()->getLocale() === 'kh'
                                    ? 'Cookies and Web Beacons'
                                    : 'Cookies and Web Beacons') }}
                        </h1>
                        <p>
                            {{ app()->getLocale() === 'en'
                                ? 'Our Websites use cookies and similar technologies to enhance user experience, analyse traffic, and improve performance.'
                                : (app()->getLocale() === 'kh'
                                    ? 'Our Websites use cookies and similar technologies to enhance user experience, analyse traffic, and improve performance.'
                                    : 'Our Websites use cookies and similar technologies to enhance user experience, analyse traffic, and improve performance.') }}
                        </p>

                        <div class="py-4">
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'Cookies may be used to:'
                                    : (app()->getLocale() === 'kh'
                                        ? 'Cookies may be used to:'
                                        : 'Cookies may be used to:') }}
                            </p>
                            <ul class="list-disc pl-8">
                                <li>
                                    {{ app()->getLocale() === 'en'
                                        ? 'Recognise your device'
                                        : (app()->getLocale() === 'kh'
                                            ? 'Recognise your device'
                                            : 'Recognise your device') }}
                                </li>
                                <li>
                                    {{ app()->getLocale() === 'en'
                                        ? 'Remember preferences'
                                        : (app()->getLocale() === 'kh'
                                            ? 'Remember preferences'
                                            : 'Remember preferences') }}
                                </li>
                                <li>
                                    {{ app()->getLocale() === 'en'
                                        ? 'Improve navigation and usability'
                                        : (app()->getLocale() === 'kh'
                                            ? 'Improve navigation and usability'
                                            : 'Improve navigation and usability') }}

                                </li>
                                <li>
                                    {{ app()->getLocale() === 'en'
                                        ? 'Collect analytics and usage data'
                                        : (app()->getLocale() === 'kh'
                                            ? 'Collect analytics and usage data'
                                            : 'Collect analytics and usage data') }}
                                </li>
                            </ul>
                        </div>

                        <div>
                            <p>
                                 {{ app()->getLocale() === 'en'
                                    ? 'Web beacons may be used in emails or webpages to track engagement and improve communication relevance.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'Web beacons may be used in emails or webpages to track engagement and improve communication relevance.'
                                        : 'Web beacons may be used in emails or webpages to track engagement and improve communication relevance.') }}
                            </p>
                            <p>
                                 {{ app()->getLocale() === 'en'
                                    ? 'By using our Websites, you consent to the use of cookies and similar technologies in accordance with this Privacy Policy.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'By using our Websites, you consent to the use of cookies and similar technologies in accordance with this Privacy Policy.'
                                        : 'By using our Websites, you consent to the use of cookies and similar technologies in accordance with this Privacy Policy.') }}
                            </p>
                            <p>
                                {{ app()->getLocale() === 'en'
                                    ? 'You may disable cookies through your browser or device settings; however, doing so may affect the functionality of certain features on our Websites.'
                                    : (app()->getLocale() === 'kh'
                                        ? 'You may disable cookies through your browser or device settings; however, doing so may affect the functionality of certain features on our Websites.'
                                        : 'You may disable cookies through your browser or device settings; however, doing so may affect the functionality of certain features on our Websites.') }}
                            </p>
                        </div>

                        <h1 class="text-lg font-semibold py-4">
                             {{ app()->getLocale() === 'en'
                                ? 'Third-Party Websites and Applications'
                                : (app()->getLocale() === 'kh'
                                    ? 'Third-Party Websites and Applications'
                                    : 'Third-Party Websites and Applications') }}
                            </h1>
                        <p>
                            {{ app()->getLocale() === 'en'
                                ? 'Our Websites may contain links to external websites, social media platforms, or third-party
                                    applications. These third parties operate independently and have their own privacy policies.
                                    We are not responsible for the content, security, or privacy practices of external websites or applications. We encourage you to review their privacy policies before providing any personal information.'
                                : (app()->getLocale() === 'kh'
                                    ? 'Our Websites may contain links to external websites, social media platforms, or third-party
                                        applications. These third parties operate independently and have their own privacy policies.
                                        We are not responsible for the content, security, or privacy practices of external websites or applications. We encourage you to review their privacy policies before providing any personal information.'
                                    : 'Our Websites may contain links to external websites, social media platforms, or third-party
                                        applications. These third parties operate independently and have their own privacy policies.
                                        We are not responsible for the content, security, or privacy practices of external websites or applications. We encourage you to review their privacy policies before providing any personal information.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-[16px] text-center text-[#03254B] flex items-center gap-2 justify-center">
            <svg class="w-5 h-5" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs"><g width="100%" height="100%" transform="matrix(1,0,0,1,0,0)"><g transform="matrix(1.038 0 0 1.143 -50.462 -221.714)"><g><path d="m64 200.125c5.611 0 10.471 4 12.605 6.108l.004.004c.999 1 .999 2.526 0 3.526l-.004.005c-2.134 2.107-6.994 6.107-12.605 6.107s-10.471-4-12.605-6.108l-.004-.004c-.999-1-.999-2.526 0-3.526l.004-.005c2.134-2.107 6.994-6.107 12.605-6.107zm0 3.5c-2.657 0-4.815 1.96-4.815 4.375s2.158 4.375 4.815 4.375 4.815-1.96 4.815-4.375-2.158-4.375-4.815-4.375z" fill="#03254b" fill-opacity="1" data-original-color="#0dadf5ff" stroke="none" stroke-opacity="1"/></g><g><ellipse cx="64" cy="208" fill="#03254b" rx="2.889" ry="2.625" fill-opacity="1" data-original-color="#1f397bff" stroke="none" stroke-opacity="1"/></g></g></g></svg>
            <span>
                <span class="font-bold">
                {{ app()->getLocale() === 'en'
                                    ? 'Visitors'
                                    : (app()->getLocale() === 'kh'
                                        ? 'អ្នកទស្សនា'
                                        : '访客') }}:</span> {{ $visitorCount }}
            </span>
        </div>
    </div>
</div>


{{--
<script>
    function showPrivacy() {
        const privacy = document.getElementById('show-privacy-policy');
        const contact = document.getElementById('get-in-touch');
        const backBtn = document.getElementById('btn-back');

        privacy.classList.remove('hidden');
        contact.classList.add('hidden');
        backBtn.classList.remove('hidden');

        //  CONTROL HOW FAR (OFFSET)
        const offset = 220; // px from top (change this)
        const y = privacy.getBoundingClientRect().top + window.pageYOffset - offset;

        window.scrollTo({
            top: y,
            behavior: 'smooth'
        });
    }

    function closePrivacy() {
        const privacy = document.getElementById('show-privacy-policy');
        const contact = document.getElementById('get-in-touch');
        const backBtn = document.getElementById('btn-back');

        privacy.classList.add('hidden');
        contact.classList.remove('hidden');
        backBtn.classList.add('hidden');

        const offset = 120;
        const y = contact.getBoundingClientRect().top + window.pageYOffset - offset;

        window.scrollTo({
            top: y,
            behavior: 'smooth'
        });
    }
</script> --}}
