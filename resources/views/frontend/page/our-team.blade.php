<section class="relative overflow-hidden">
    <h1 class="text-2xl md:text-5xl font-semibold text-center text-[#03254B] md:mt-0 mt-4 py-4 mb-10">
        {{ app()->getLocale() === 'en'
    ? 'Message from the Chairman'
    : (app()->getLocale() === 'kh'
        ? 'សារពីអគ្គនាយកក្រុមហ៊ុន'
        : '董事长致辞 ')
        }}
    </h1>

    <img src="{{ app()->getLocale() === 'en'
            ? asset('assets/about_us/sms-form-chairman-en-final.svg')
            : (app()->getLocale() === 'kh'
                ? asset('assets/about_us/sms-form-chairman-khmer-final.svg')
                : asset('assets/about_us/sms-form-chairman-cn-final.svg'))
        }}" alt="" class="w-full h-full object-cover hidden md:flex" style="user-select:none; pointer-events:none;">

      <img src="{{ app()->getLocale() === 'en'
            ? asset('assets/about_us/sms-mobile-en.svg')
            : (app()->getLocale() === 'kh'
                ? asset('assets/about_us/sms-mobile-kh.svg')
                : asset('assets/about_us/sms-mobile-ch.svg'))
        }}" alt="" class="w-full h-full object-cover md:hidden" style="user-select:none; pointer-events:none;">
    {{-- <div class="relative w-full h-auto md:h-[95vh] lg:h-[130vh] xl:h-[115vh]" x-data="{ open: false }">

        <img src="{{ asset('assets/about_us/bg-ms.svg') }}" alt=""
            class="w-full h-full object-contain xl:object-cover absolute inset-0">


        <div class="relative z-10 flex items-center justify-center h-full px-4">
            <div class="max-w-7xl text-cente p-6 md:p-10">

                <div class="relative top-12 left-60 md:-top-8 lg:top-12 xl:top-6 lg:left-60 xl:left-52">
                    <h1 class="text-[#03254B] text-xl md:text-2xl font-bold">
                        Mr. Seang Pov
                    </h1>

                    <hr class="w-[20%] my-3 border-white">

                    <h4 class="text-[#03254B] text-sm md:text-base font-semibold mb-4">
                        Chairman, Board Of Directors
                    </h4>
                </div>

                <div class="relative md:top-18 lg:top-18 xl:top-24 text-[#03254B] text-xs lg:text-sm xl:text-[16px]">
                    <p class="mb-3 max-w-[80%]">
                        At Pov Bopheak Land & Home Co., Ltd., we believe that real estate is about far more than
                        property alone,
                        it is about people, trust, and the future we help shape together. Cambodia, and particularly
                        Phnom Penh,
                        is entering a pivotal phase of growth. As the city continues to develop into a modern and
                        dynamic regional center,
                        the real estate market presents significant opportunities. At the same time, this progress
                        requires responsibility, transparency,
                        and a long-term perspective. Pov Bopheak Land & Home Co., Ltd. was founded on these principles.
                    </p>

                    <p class="mb-3 max-w-[90%]">
                        From the outset, our shared vision has been clear: to connect clients with real estate
                        opportunities that are
                        not only attractive today, but sustainable and valuable for the long term. We focus on carefully
                        selected condominiums,
                        landed properties, land plots, and exclusive developments that meet high standards of location,
                        construction quality,
                        legal clarity, and investment potential.
                    </p>

                    <p class="mb-3">
                        What truly distinguishes our company is our belief in relationships over transactions.
                        Whether we are supporting first-time homebuyers, families seeking to upgrade their lifestyle,
                        or investors pursuing strategic returns, we take the time to understand individual goals and
                        provide professional,
                        honest guidance at every stage of the process. Trust is built through consistency,
                        transparency, and accountability, and we treat that trust as our most valuable asset.
                    </p>

                    <p class="mb-3 md:flex hidden">
                        We work closely with reputable developers, landowners, and partners who share our commitment to
                        quality,
                        integrity, and responsible development. Through these partnerships, we aim to contribute
                        positively
                        to Cambodia’s real estate landscape by supporting projects that strengthen communities and
                        create lasting value. As founders, we remain personally committed to the values on which Pov
                        Bopheak Land & Home Co., Ltd.
                        was established: integrity, professionalism, and long-term value creation.
                    </p>

                    <p class="mb-4 md:flex hidden">
                        Our ambition is not only to grow as a company, but to grow alongside our clients,
                        partners, and the future of Cambodia.
                    </p>

                    <b class="md:block hidden">
                        Thank you for your trust in Pov Bopheak Land & Home Co., Ltd. We look forward to building the
                        future, responsibly and together.
                    </b>

                     <!-- Read more button -->
                    <button
                        @click="open = true"
                        class="mt-3 text-[#03254B] font-semibold underline md:hidden flex"
                    >
                        Read more
                    </button>
                </div>


                <!-- Popup -->
                <div x-show="open" x-transition
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 px-4">
                    <div
                        class="bg-white max-w-3xl w-full max-h-[85vh] overflow-y-auto rounded-xl p-6 relative text-[#03254B]">

                        <!-- Close -->
                        <button @click="open = false" class="absolute top-3 right-4 text-xl font-bold">
                            ✕
                        </button>

                        <h2 class="text-xl font-bold mb-4">Message from the Chairman</h2>

                         <div class="relative lg:top-18 xl:top-24 text-[#03254B] text-xs lg:text-sm xl:text-[16px]">
                            <p class="mb-3">
                                At Pov Bopheak Land & Home Co., Ltd., we believe that real estate is about far more than
                                property alone,
                                it is about people, trust, and the future we help shape together. Cambodia, and particularly
                                Phnom Penh,
                                is entering a pivotal phase of growth. As the city continues to develop into a modern and
                                dynamic regional center,
                                the real estate market presents significant opportunities. At the same time, this progress
                                requires responsibility, transparency,
                                and a long-term perspective. Pov Bopheak Land & Home Co., Ltd. was founded on these principles.
                            </p>

                            <p class="mb-3 max-w-[90%]">
                                From the outset, our shared vision has been clear: to connect clients with real estate
                                opportunities that are
                                not only attractive today, but sustainable and valuable for the long term. We focus on carefully
                                selected condominiums,
                                landed properties, land plots, and exclusive developments that meet high standards of location,
                                construction quality,
                                legal clarity, and investment potential.
                            </p>

                            <p class="mb-3">
                                What truly distinguishes our company is our belief in relationships over transactions.
                                Whether we are supporting first-time homebuyers, families seeking to upgrade their lifestyle,
                                or investors pursuing strategic returns, we take the time to understand individual goals and
                                provide professional,
                                honest guidance at every stage of the process. Trust is built through consistency,
                                transparency, and accountability, and we treat that trust as our most valuable asset.
                            </p>

                            <p class="mb-3">
                                We work closely with reputable developers, landowners, and partners who share our commitment to
                                quality,
                                integrity, and responsible development. Through these partnerships, we aim to contribute
                                positively
                                to Cambodia’s real estate landscape by supporting projects that strengthen communities and
                                create lasting value. As founders, we remain personally committed to the values on which Pov
                                Bopheak Land & Home Co., Ltd.
                                was established: integrity, professionalism, and long-term value creation.
                            </p>

                            <p class="mb-4">
                                Our ambition is not only to grow as a company, but to grow alongside our clients,
                                partners, and the future of Cambodia.
                            </p>

                            <b class="block">
                                Thank you for your trust in Pov Bopheak Land & Home Co., Ltd. We look forward to building the
                                future, responsibly and together.
                            </b>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}

</section>

@php
    $pattern = [3, 4];
    $teams = $showOurTeam;
    $index = 0;
    $i = 0;
@endphp

<div class="w-full h-auto bg-[#ffffff] py-10">
    <h1 class="text-2xl md:text-5xl font-semibold text-center text-[#03254B] mb-10">
        {{ app()->getLocale() === 'en'
    ? ' Our Team'
    : (app()->getLocale() === 'kh'
        ? 'ក្រុមការងាររបស់យើងខ្ញុំ'
        : '我们的团队')
        }}
    </h1>

    <div class="max-w-7xl mx-auto space-y-12 px-2 md:px-4">

        @while ($index < $teams->count())
            @php
                $take = $pattern[$i % count($pattern)];
                $group = $teams->slice($index, $take);
                $index += $take;
                $i++;
            @endphp

            <div class="grid gap-4 md:gap-10 place-items-center mx-auto"
                style="display: grid; grid-template-columns: repeat({{ $take }}, minmax(0, 1fr)); {{ $take == 3 ? 'max-width: 48rem;' : 'max-width: 64rem;' }}">

                @foreach ($group as $item)
                    <div class="flex flex-col items-center text-center space-y-2 w-full">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-28 md:h-28 lg:w-32 lg:h-32 rounded-full overflow-hidden">
                            <img src="{{ asset('assets/team/' . $item->profile) }}" alt="{{ $item->name_en }}"
                                class="w-full h-full object-cover">
                        </div>

                        <div class="space-y-1 md:h-0 h-12">
                           <h3
                                class="text-[#03254B] font-semibold text-[10px] sm:text-xs md:text-base leading-tight
                                    {{ app()->getLocale() === 'kh' ? 'max-w-28 mx-auto' : '' }} md:max-w-60">
                                {{
                                    app()->getLocale() === 'en'
                                        ? $item->name_en
                                        : (app()->getLocale() === 'kh'
                                            ? $item->name_kh
                                            : $item->name_cn)
                                }}
                            </h3>

                            <p class="text-[9px] sm:text-[10px] md:text-sm text-gray-500 leading-tight">
                                {{
                    app()->getLocale() === 'en'
                    ? $item->position_en
                    : (app()->getLocale() === 'kh'
                        ? $item->position_kh
                        : $item->position_cn)
                                        }}
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
        @endwhile

    </div>
</div>
