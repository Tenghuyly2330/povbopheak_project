<div class="relative w-full pt-8 overflow-hidden px-4" id="our-customer" x-data="{
    index: 0,
    total: {{ $showCustomer->sum(fn($c) => is_array($c->images) ? count($c->images) : 0) }}
}">

    <h1 class="text-2xl md:text-5xl font-semibold text-center text-[#03254B] py-4 md:py-16">
        {{ app()->getLocale() === 'en'
            ? 'Our Customers'
            : (app()->getLocale() === 'kh'
                ? 'អតិថិជនរបស់យើងខ្ញុំ'
                : '我们的客户') }}
        <p class="text-sm md:text-lg font-normal text-[#03254B] py-2 md:px-0 px-10">

            {{ app()->getLocale() === 'en'
                ? 'All our projects are well trusted by all local and international customers.'
                : (app()->getLocale() === 'kh'
                    ? 'គម្រោងទាំងអស់របស់យើងខ្ញុំទទួលបានការជឿទុកចិត្តយ៉ាងខ្លាំងពីអតិថិជនក្នុងស្រុក និងអន្តរជាតិទាំងអស់។'
                    : '人们选择我们，是因为我们帮助柬埔寨人和外国人实现了购房梦想。这证明，你无需巨额资金，只要有合适的合作伙伴和清晰的愿景就足够了。') }}
        </p>
    </h1>

    <!-- MOBILE SLIDER -->
    {{-- <div class="relative md:hidden overflow-hidden">
        <div class="flex transition-transform duration-300"
             :style="`transform: translateX(-${index * 100}%)`">

            @foreach ($showCustomer as $customer)
                @if (is_array($customer->images))
                    @foreach ($customer->images as $img)
                        <div class="min-w-full">
                            <img src="{{ asset($img) }}"
                                 class="w-full h-64 object-cover rounded-xl"
                                 alt="Customer Image">
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>

        <!-- LEFT BUTTON -->
        <button
            @click="index = index > 0 ? index - 1 : total - 1"
            class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 w-10 h-10 rounded-full shadow flex items-center justify-center">
            ◀
        </button>

        <!-- RIGHT BUTTON -->
        <button
            @click="index = index < total - 1 ? index + 1 : 0"
            class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 w-10 h-10 rounded-full shadow flex items-center justify-center">
            ▶
        </button>
    </div> --}}

    <!-- DESKTOP GRID -->
    {{-- <div class="hidden md:grid grid-cols-5 gap-2 px-6">
        @foreach ($showCustomer as $customer)
            @if (is_array($customer->images))
                @foreach ($customer->images as $img)
                    <img src="{{ asset($img) }}"
                         class="aspect-3/2 object-cover"
                         alt="Customer Image">
                @endforeach
            @endif
        @endforeach
    </div> --}}

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($showCustomer as $customer)
                @if (is_array($customer->images))
                    @foreach ($customer->images as $img)
                        <div class="swiper-slide">
                            <img src="{{ asset($img) }}" class="w-full h-[300px] object-cover" alt="Customer Image">
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
        <div class="md:hidden">
            <div
                class="swiper-button-prev w-10 h-10 bg-black/50 rounded-full flex items-center justify-center text-white hover:bg-black transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </div>
        </div>
        <div class="md:hidden">
            <div
                class="md:hidden swiper-button-next w-10 h-10 bg-black/50 rounded-full flex items-center justify-center text-white hover:bg-black transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </div>

    </div>

</div>
