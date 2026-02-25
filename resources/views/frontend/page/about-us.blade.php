<div id="about-us" class="max-w-7xl mx-auto flex lg:flex-row flex-col justify-between items-center
           lg:space-x-12 space-y-6 lg:space-y-0 pt-24 px-4" x-data="{showModal: false}">

    <!-- Image -->
    <div class="w-full lg:w-1/2">
        <img src="{{ asset('assets/about_us/' . $showAboutUs[0]->image) }}" class="rounded-2xl w-full object-cover"
            alt="About Us">
    </div>

    <!-- Text -->
    <div class="w-full lg:w-1/2 flex flex-col space-y-6 text-[#03244a]">

        <h1 class="text-2xl md:text-5xl font-semibold">
            {{
                app()->getLocale() === 'en'
                ? $showAboutUs[0]->title_en
                : (app()->getLocale() === 'kh'
                    ? $showAboutUs[0]->title_kh
                    : $showAboutUs[0]->title_cn)
            }}
        </h1>

        <!-- Short Description Preview -->
        @php
            $lang = app()->getLocale(); // en, kh, cn

            $descField = "description_$lang";

            $description = $showAboutUs[0]->$descField ?? '';
            $paragraphs = preg_split("/\n\s*\n/", $description);
            $previewParagraphs = array_slice($paragraphs, 0, 2);
        @endphp

        <div class="relative space-y-4 font-medium">
            <div class="absolute inset-y-0 right-0 w-[90%]
                            bg-gradient-to-l bg-gradient-to-r bg-gradient-to-b from-white/80 via-white/60 to-transparent
                            blur-xl"></div>
            @foreach($previewParagraphs as $p)
                <p class="relative z-10">{{ $p }}</p>
            @endforeach
        </div>

        <!-- Button wrapper (background) -->
        <div class="">
            <div class="w-36 h-12 rounded-full bg-[#03244a] flex items-center justify-center">
                <button @click="showModal = true" class="cursor-pointer bg-linear-to-r from-[#f2ad46] via-[#f7ca68] to-[#fce88d]
                   bg-clip-text text-transparent font-semibold text-lg">
                    {{ app()->getLocale() === 'en'
    ? ' Read More'
    : (app()->getLocale() === 'kh'
        ? 'អានបន្ថែម'
        : '继续阅读')
            }}
                </button>
            </div>
        </div>

    </div>

    <!-- Modal read more for backend-->
    <div x-show="showModal" x-transition.opacity
        class="fixed inset-0 bg-black/50 flex items-center justify-center z-30 px-4" style="display: none;">

        <div @click.away="showModal = false"
            class="bg-white max-w-3xl w-full p-8 relative overflow-y-auto max-h-[80vh] px-6 rounded-xl">

            <!-- Close Button -->
            <button @click="showModal = false"
                class="fixed top-16 right-8 md:right-0 md:top-20 z-50 text-black hover:text-gray-700 md:w-4xl text-2xl font-bold">&times;</button>

            <!-- Modal Content -->
            <h2 class="text-3xl font-semibold mb-6">

                {{
    app()->getLocale() === 'en'
    ? $showAboutUs[0]->title_en
    : (app()->getLocale() === 'kh'
        ? $showAboutUs[0]->title_kh
        : $showAboutUs[0]->title_cn)
            }}

             </h2>

            <div class="space-y-4 text-[#03244a] text-md md:text-lg">
                @foreach($paragraphs as $p)
                    <p>{{ $p }}</p>
                @endforeach
            </div>
        </div>
    </div>

</div>

<div x-data="{
                showVision: false,
                showMission: false,
                showCore: false
            }">
   <div class="flex justify-center items-center md:pt-14 md:py-0 py-4 md:mt-4 mt-0 space-x-3 md:space-x-6">

        <button @click="showVision = true" class="cursor-pointer">
            <div class="w-32 h-16 md:w-52 md:h-24 rounded-full flex flex-col items-center justify-center">
                <img src="{{ asset('assets/icon-project/icons8-night-vision-100.png') }}" alt="" class="w-full h-full object-contain">
                <p class="cursor-pointer h-32 md:h-16 text-[#03244a] font-semibold text-xs md:text-lg">
                    {{ app()->getLocale() === 'en' ? 'Vision' : (app()->getLocale() === 'kh' ? 'ចក្ខុវិស័យ' : '愿景') }}
                </p>
            </div>
        </button>

        <button  @click="showMission = true" class="cursor-pointer">
            <div class="w-32 h-16 md:w-52 md:h-24 rounded-full flex flex-col items-center justify-center">
                <img src="{{ asset('assets/icon-project/icons8-mission-100.png') }}" alt="" class="w-full h-full object-contain">
                <p class="cursor-pointer h-32 md:h-16 text-[#03244a] font-semibold text-xs md:text-lg">

                    {{ app()->getLocale() === 'en' ? 'Mission Statement' : (app()->getLocale() === 'kh' ? 'បេសកកម្ម' : '使命宣言') }}
                </p>
            </div>
        </button>

        <button @click="showCore = true" class="cursor-pointer">
            <div class="w-32 h-16 md:w-52 md:h-24 rounded-full flex flex-col items-center justify-center">
                <img src="{{ asset('assets/icon-project/icons8-diamond-100.png') }}" alt="" class="w-full h-full object-contain">
                <p class="max-w-40 h-32 md:h-16 cursor-pointer text-[#03244a] font-semibold text-xs md:text-lg">

                    {{ app()->getLocale() === 'en' ? 'Core Values' : (app()->getLocale() === 'kh' ? 'គុណតម្លៃស្នូល' : '核心价值观') }}
                </p>
            </div>
        </button>
   </div>


    <!-- Modal Vission static-->
    <div x-show="showVision" x-transition.opacity
        class="fixed inset-0 bg-black/50 flex items-center justify-center z-30 px-4" style="display: none;">

        <div @click.away="showVision = false"
            class="bg-white max-w-3xl w-full p-8 relative overflow-y-auto max-h-[80vh] px-6 rounded-xl">

            <!-- Close Button -->
            <button @click="showVision = false" class="absolute top-3 right-3 w-10 h-10 flex items-center justify-center
                rounded-full hover:bg-gray-100 text-2xl font-bold text-[#03244a]">&times;</button>

            <!-- Modal Content -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('assets/icon-project/icons8-night-vision-100.png') }}" alt="" class="w-16 h-16">
                <h2 class="text-3xl font-semibold mb-6 text-[#03244a]">
                    {{ app()->getLocale() === 'en' ? 'Vision' : (app()->getLocale() === 'kh' ? 'ចក្ខុវិស័យ' : '愿景') }}
                </h2>
            </div>

            <div class="space-y-4 text-[#03244a] text-md md:text-lg">

                 {{ app()->getLocale() === 'en' ? 'To become one of Cambodia’s most trusted and forward thinking real estate companies, shaping sustainable
                communities
                and creating long-term value for homeowners, investors, and future generations, while contributing
                positively to Phnom Penh’s
                transformation into a leading regional capital.' : (app()->getLocale() === 'kh' ? 'ក្លាយជាក្រុមហ៊ុនអចលនទ្រព្យមួយប្រកបដោយទំនុកចិត្តនៅលើទីផ្សារប្រទេសកម្ពុជាជាមួយនឹងគំនិត
ច្នៃប្រឌិតខ្ពស់ក្នុងការអភិវឌ្ឍន៍សហគមន៍ប្រកបដោយចីរភាព និងការបង្កើតគុណតម្លៃរយៈពេលវែងសម្រាប់អតិថិជន វិនិយោគិន និងមនុស្សជំនាន់ក្រោយ ខណៈពេលដែលចូលរួមចំណែកអភិវឌ្ឍន៍រាជធានីភ្នំពេញទៅជារាជធានីឈានមុខគេនៅក្នុងតំបន់។'
                : '为了成为柬埔寨最受信赖且最具前瞻性的房地产公司之一，塑造可持续发展的社区，为业主、投资者以及子孙后代创造长期价值，同时为金边的转型成为区域性重要中心做出积极贡献。
简而言之，我们不仅顺应柬埔寨的发展趋势，还助力其定义未来。
') }}
                {{-- <b>In short, we do not just follow Cambodia’s growth; We help define it.</b> --}}
            </div>
        </div>
    </div>
    <!-- Modal Mission static-->
    <div x-show="showMission" x-transition.opacity
        class="fixed inset-0 bg-black/50 flex items-center justify-center z-30 px-4" style="display: none;">

        <div @click.away="showMission = false"
            class="bg-white max-w-3xl w-full p-8 relative overflow-y-auto max-h-[80vh] px-6 rounded-xl">

            <!-- Close Button -->
            <button @click="showMission = false" class="fixed z-40 top-0 right-0 md:top-24 md:right-100 w-10 h-10 flex items-center justify-center
                rounded-full hover:bg-gray-100 text-2xl font-bold text-[#03244a]">&times;</button>

            <!-- Modal Content -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('assets/icon-project/icons8-mission-100.png') }}" alt="" class="w-20 h-20">
                <h2 class="text-3xl font-semibold mb-6 text-[#03244a]">
                     {{ app()->getLocale() === 'en' ? 'Mission Statement' : (app()->getLocale() === 'kh' ? 'បេសកកម្ម' : '使命宣言') }}
                </h2>
            </div>

            <div class="space-y-4 text-[#03244a] text-md md:text-lg">
                <p>
                     {{ app()->getLocale() === 'en' ? 'Our mission is to provide professional, transparent, and value-driven real estate solutions in
                    Cambodia by connecting people
                    with high-quality condominiums, landed properties, land plots, and exclusive developments that stand
                    the test of time. ' : (app()->getLocale() === 'kh' ? 'បេសកកម្មរបស់យើងខ្ញ៉ំគឺផ្តល់ជូននូវដំណោះស្រាយអចលនទ្រព្យប្រកបដោយវិជ្ជាជីវៈ មានតម្លាភាព និងផ្តោតលើគុណតម្លៃនៅក្នុងប្រទេសកម្ពុជា ដោយផ្សាភ្ជាប់អតិថិជនជាមួយនឹងឱកាសអចលនទ្រព្យលើដី ខុនដូប្រណិតៗ  ដីឡូត៍ និងការអភិវឌ្ឍគម្រោងផ្តាច់មុខប្រកបដោយនិរន្តភាព។' : '我们的使命是通过将人们与高品质的公寓、土地房产、地块以及经得起时间考验的专属开发项目相连接，为柬埔寨提供专业、透明且具有价值导向的房地产解决方案。') }}
                    <br/>
                     {{ app()->getLocale() === 'en' ? 'We are committed to:' : (app()->getLocale() === 'kh' ? 'យើងខ្ញុំប្តេជ្ញាចិត្ត៖' : '我们致力于：') }}
                </p>
                <section class="max-w-6xl mx-auto px-4 py-2 md:py-4 bg-white text-[#0b2c52]">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 md:gap-y-8 gap-y-2">

                        <!-- Item 01 -->
                        <div class="relative">
                            <div class="flex items-center space-x-4">
                                <span class="text-4xl font-serif text-[#c9a96a]">
                                    {{ app()->getLocale() === 'en' ? '01' : (app()->getLocale() === 'kh' ? '០១' : '01') }}
                                </span>
                                <div class="flex-1 border-t border-[#c9a96a]"></div>
                            </div>
                            <p class="mt-4 text-lg leading-relaxed">

                                 {{ app()->getLocale() === 'en' ? 'Offering carefully selected properties
                                with strong fundamentals and clear legal
                                standing' : (app()->getLocale() === 'kh' ? 'ផ្តល់ជូននូវអចលនទ្រព្យដែលបានជ្រើសរើសលក់ជូនយ៉ាងយកចិត្តទុកដាក់ជាមួយនឹងមូលដ្ឋានគ្រឹះដ៏រឹងមាំ និងជំហរផ្លូវច្បាប់ច្បាស់លាស់។' : '提供经过精心挑选的、基本面良好且法律地位明确的房产。') }}
                            </p>
                        </div>

                        <!-- Item 02 -->
                        <div class="relative">
                            <div class="flex items-center space-x-4">
                                <span class="text-4xl font-serif text-[#c9a96a]">
                                    {{ app()->getLocale() === 'en' ? '02' : (app()->getLocale() === 'kh' ? '០២' : '02') }}
                                </span>
                                <div class="flex-1 border-t border-[#c9a96a]"></div>
                            </div>
                            <p class="mt-4 text-lg leading-relaxed">

                                 {{ app()->getLocale() === 'en' ? ' Guiding clients with honesty, expertise, and
                                local market insight' : (app()->getLocale() === 'kh' ? 'ណែនាំអតិថិជនដោយភាពស្មោះត្រង់ ជំនាញវិជ្ជាជីវៈ និងការយល់ដឹងអំពីទីផ្សារក្នុងស្រុក។' : '以诚实的态度、专业的知识以及对当地市场的深入了解来为客户提供指导。') }}
                            </p>
                        </div>

                        <!-- Item 03 -->
                        <div class="relative">
                            <div class="flex items-center space-x-4">
                                <span class="text-4xl font-serif text-[#c9a96a]">
                                    {{ app()->getLocale() === 'en' ? '03' : (app()->getLocale() === 'kh' ? '០៣' : '03') }}
                                </span>
                                <div class="flex-1 border-t border-[#c9a96a]"></div>
                            </div>
                            <p class="mt-4 text-lg leading-relaxed">

                                 {{ app()->getLocale() === 'en' ? ' Supporting first-time buyers, families,
                                and investors with tailored advice
                                and end-to-end service' : (app()->getLocale() === 'kh' ? 'ជួយណែនាំដល់អ្នកទិញអចលទ្រព្យលើកដំបូង អតិថិជនគ្រួសារ វិនិយោគិនជាមួយនឹងការប្រឹក្សាជាក់លាក់ និងផ្តល់សេវាកម្មសេវាកម្មពេញលេញ។
' : '为首次购房者、家庭成员以及投资者提供量身定制的建议以及全方位的服务。
') }}
                            </p>
                        </div>

                        <!-- Item 04 -->
                        <div class="relative">
                            <div class="flex items-center space-x-4">
                                <span class="text-4xl font-serif text-[#c9a96a]">
                                     {{ app()->getLocale() === 'en' ? '04' : (app()->getLocale() === 'kh' ? '០៤' : '04') }}
                                </span>
                                <div class="flex-1 border-t border-[#c9a96a]"></div>
                            </div>
                            <p class="mt-4 text-lg leading-relaxed">

                                 {{ app()->getLocale() === 'en' ? ' Building long-term relationships based on trust, performance,
                                and shared success. Every transaction is approached not as a
                                sale, but as a strategic decision for our clients’ future.' : (app()->getLocale() === 'kh' ? 'កសាងទំនាក់ទំនងរយៈពេលវែងដោយផ្អែកលើទំនុកចិត្ត ការអនុវត្ត និងភាពជោគជ័យរួមគ្នា។
រាល់ប្រតិបត្តិការទាំងអស់ធ្វើឡើងមិនមែនគ្រាន់តែជាការលក់ទេ ប៉ុន្តែជាការសម្រេចចិត្តប្រកបដោយយុទ្ធសាស្ត្ររៀបចំសម្រាប់ផែនការអនាគតរបស់អតិថិជន។
' : '建立基于信任、绩效和共同成功的长期合作关系。每一笔交易都不被视为单纯的销售行为，而是作为我们为客户未来所做的战略性决策来对待。') }}
                            </p>
                        </div>

                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- Modal Core Values-->
    <div x-show="showCore" x-transition.opacity
        class="fixed inset-0 bg-black/50 flex items-center justify-center z-30 px-4" style="display: none;">

        <div @click.away="showCore = false"
            class="bg-white max-w-3xl w-full p-8 relative overflow-y-auto max-h-[80vh] px-6 rounded-xl">

            <!-- Close Button -->
            <button @click="showCore = false"
                class="fixed top-16 right-8 md:right-0 md:top-20 z-50 text-black hover:text-gray-700 md:w-4xl text-2xl font-bold">&times;</button>

            <!-- Modal Content -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('assets/icon-project/icons8-diamond-100.png') }}" alt="" class="w-16 h-16">
                <h2 class="text-3xl font-semibold mb-6 text-[#03244a]">
                     {{ app()->getLocale() === 'en' ? 'Core Values' : (app()->getLocale() === 'kh' ? 'គុណតម្លៃស្នូល' : '核心价值观') }}
                </h2>
            </div>

            <div class="space-y-6 text-md md:text-lg">

                <!-- Item 1 -->
                <div class="space-y-2">
                    <div class="flex items-center space-x-3">
                        <!-- Icon -->
                        <svg class="w-6 h-6 text-[#03244a]" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path d="M12 3l9 4.5-9 4.5-9-4.5L12 3z" />
                            <path d="M3 12l9 4.5 9-4.5" />
                        </svg>

                        <h1 class="text-[#d1af80] font-semibold text-lg">

                            {{ app()->getLocale() === 'en' ? ' Partnership & Responsibility' : (app()->getLocale() === 'kh' ? 'ភាពជាដៃគូ និងការទទួលខុសត្រូវ' : '合作与责任') }}
                        </h1>
                    </div>

                    <p class="text-[#03244a] pl-9">

                        {{ app()->getLocale() === 'en' ? 'We work closely with reputable developers, landowners, and stakeholders who share
                        our commitment to quality, responsibility, and sustainable development.' : (app()->getLocale() === 'kh' ? 'យើងខ្ញុំធ្វើការយ៉ាងជិតស្និទ្ធជាមួយអ្នកអភិវឌ្ឍន៍គម្រោង ម្ចាស់ដី និងដៃគូពាក់ព័ន្ធនានាដែលមាននូវការប្តេជ្ញាចិត្តរួមចំពោះគុណភាព ការទទួលខុសត្រូវ និងការអភិវឌ្ឍប្រកបដោយចីរភាព។
' : '我们与信誉良好的开发商、土地所有者以及利益相关方紧密合作，他们与我们一样致力于追求高品质、履行责任以及推动可持续发展。') }}
                    </p>
                </div>

                <!-- Item 2 -->
                <div class="space-y-2">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-[#03244a]" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path d="M12 6v6l4 2" />
                            <circle cx="12" cy="12" r="9" />
                        </svg>

                        <h1 class="text-[#d1af80] font-semibold text-lg">

                            {{ app()->getLocale() === 'en' ? 'Professional Excellence' : (app()->getLocale() === 'kh' ? 'ឧត្តមភាពវិជ្ជាជីវៈ' : '专业卓越') }}
                        </h1>
                    </div>

                    <p class="text-[#03244a] pl-9">

                        {{ app()->getLocale() === 'en' ? 'From legal clarity to project quality and client service, we maintain high
                        standards at every stage of the real estate journey.' : (app()->getLocale() === 'kh' ? 'ចាប់ពីភាពច្បាស់លាស់ផ្នែកច្បាប់ រហូតដល់គុណភាពគម្រោង
និងសេវាកម្មអតិថិជន យើងខ្ញុំរក្សាបាននូវស្តង់ដារខ្ពស់នៅគ្រប់ដំណាក់កាលនៃដំណើរអចលនទ្រព្យ។
' : '从法律的清晰明确到项目的质量以及客户服务，我们在房地产的整个过程中始终保持着高标准。') }}
                    </p>
                </div>

                <!-- Item 3 -->
                <div class="space-y-2">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-[#03244a]" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path d="M3 12h18" />
                            <path d="M12 3v18" />
                        </svg>

                        <h1 class="text-[#d1af80] font-semibold text-lg">

                            {{ app()->getLocale() === 'en' ? 'Local Expertise, Global Mindset' : (app()->getLocale() === 'kh' ? 'ជំនាញក្នុងស្រុក ផ្នត់គំនិតសកល' : '本地专长，全球视野') }}
                        </h1>
                    </div>

                    <p class="text-[#03244a] pl-9">

                        {{ app()->getLocale() === 'en' ? ' Rooted in Phnom Penh and Cambodia, we combine deep local knowledge with a
                        forward-looking, international perspective, essential in a fast-evolving market.' : (app()->getLocale() === 'kh' ? 'ផ្តើមចេញពីឫសគល់នៅទីក្រុងភ្នំពេញ និងប្រទេសកម្ពុជាយើងខ្ញុំបញ្ចូលនូវចំណេះដឹងក្នុងស្រុកយ៉ាងស៊ីជម្រៅ
ជាមួយនឹងទស្សនៈវិស័យអន្តរជាតិវែងឆ្ងាយ ដែលមានសារៈសំខាន់នៅក្នុងទីផ្សារដែលមានការវិវត្តយ៉ាងឆាប់រហ័ស។
' : '我们扎根于金边及柬埔寨，将深厚的本地知识与前瞻性的国际视角相结合，这在快速变化的市场中至关重要。') }}
                    </p>
                </div>

                <!-- Item 4 -->
                <div class="space-y-2">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-[#03244a]" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path d="M12 2l7 7-7 7-7-7 7-7z" />
                        </svg>

                        <h1 class="text-[#d1af80] font-semibold text-lg">

                             {{ app()->getLocale() === 'en' ? 'Long-Term Value Creation' : (app()->getLocale() === 'kh' ? 'ការបង្កើតគុណតម្លៃរយៈពេលវែង' : '长期价值创造') }}
                        </h1>
                    </div>

                    <p class="text-[#03244a] pl-9">

                        {{ app()->getLocale() === 'en' ? '  We focus on sustainable growth, not short-term gains. Every property we represent
                        is selected for its lasting value, investment potential, and contribution to quality living.'
                        : (app()->getLocale() === 'kh' ? 'យើងខ្ញុំផ្តោតលើកំណើនប្រកបដោយនិរន្តភាព មិនមែនប្រាក់ចំណេញរយៈពេលខ្លីទេ។ អចលនទ្រព្យនីមួយៗដែលយើងខ្ញុំតំណាងលក់ត្រូវបានជ្រើសរើសសម្រាប់គុណតម្លៃរយៈពេលយូរអង្វែង សក្តានុពលវិនិយោគ និងការរួមចំណែកដល់ការរស់នៅប្រកបដោយគុណភាព។'
                        : '我们注重的是可持续发展，而非短期收益。我们所代理的每一处房产都是因其持久的价值、投资潜力以及对高品质生活的贡献而被选中的。') }}
                    </p>
                </div>

                <!-- Item 5 -->
                <div class="space-y-2">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-[#03244a]" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path d="M12 21s-6-4.35-6-10a6 6 0 0112 0c0 5.65-6 10-6 10z" />
                        </svg>

                        <h1 class="text-[#d1af80] font-semibold text-lg">

                             {{ app()->getLocale() === 'en' ? ' People Before Property' : (app()->getLocale() === 'kh' ? 'អតិថិជនសំខាន់​ជាង​អចលនទ្រព្យ' : '人重于物') }}
                        </h1>
                    </div>

                    <p class="text-[#03244a] pl-9">

                        {{ app()->getLocale() === 'en' ? ' Real estate is about people. We listen carefully, advise responsibly, and act in the best interests of our clients, partners, and communities.'
                        : (app()->getLocale() === 'kh' ? 'អចលនទ្រព្យ​គឺ​អំពី​អតិថិជន។ យើង​ខ្ញុំស្តាប់​ដោយ​យកចិត្តទុកដាក់ ផ្តល់​ដំបូន្មាន​ដោយ​មាន​ទំនួល​ខុសត្រូវ និង​ធ្វើ​ដើម្បី​ទាញផលប្រយោជន៍​ល្អ​បំផុត​ជូន​អតិថិជន ដៃគូ និង​សហគមន៍​។'
                        : '房地产关乎人。我们认真倾听，负责任地提供建议，并始终以客户的利益、合作伙伴的利益以及社区的利益为出发点采取行动。') }}
                    </p>
                </div>

                   <!-- Item 6 -->
                <div class="space-y-2">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-[#03244a]" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3l7 4v5c0 5-3.5 9-7 11-3.5-2-7-6-7-11V7l7-4z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4" />
                        </svg>
                        <h1 class="text-[#d1af80] font-semibold text-lg">

                            {{ app()->getLocale() === 'en' ? 'Integrity First' : (app()->getLocale() === 'kh' ? 'សុចរិតភាពជាចម្បង' : '誠信至上') }}
                        </h1>
                    </div>

                    <p class="text-[#03244a] pl-9">

                        {{ app()->getLocale() === 'en' ? ' We operate with absolute transparency and
                        ethical standards. Trust is not a marketing
                        slogan for us, it is the foundation of every
                        relationship we build. ' : (app()->getLocale() === 'kh' ? 'យើងខ្ញុំធ្វើប្រតិបត្តិការដោយមានតម្លាភាពដាច់ខាត និងស្តង់ដារសីលធម៌។ ទំនុកចិត្តមិនមែនជាពាក្យស្លោកទីផ្សារសម្រាប់យើងខ្ញុំទេ វាគឺជាមូលដ្ឋានគ្រឹះនៃទំនាក់ទំនងនីមួយៗដែលបានកសាង។'
                        : '我們秉持絕對透明和符合道德標準的原則來經營業務。信任對我們來說不是一句行銷口號。它是我們建立的每一種關係的基礎。') }}

                    </p>
                </div>

            </div>

        </div>
    </div>
</div>
