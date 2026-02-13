

<section class="bg-gray-50 py-16" id="news">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-5xl font-semibold text-center text-[#03254B]">
                 {{ app()->getLocale() === 'en'
                    ? 'Latest News'
                    : (app()->getLocale() === 'kh'
                        ? 'ព្រឹត្តិការណ៍ថ្មីៗ'
                        : '最新消息')
                }}
            </h2>
            <p class="text-sm md:text-lg font-normal text-[#03254B] py-2 md:px-0 px-10">
                 {{ app()->getLocale() === 'en'
                    ? 'Stay updated with our latest activities'
                    : (app()->getLocale() === 'kh'
                        ? 'ទទួលយកបច្ចុប្បន្នភាពអំពីព្រឹត្តិការណ៍ថ្មីរបស់ក្រុមហ៊ុនយើងខ្ញ៉ំ'
                        : '请持续关注我们的最新动态。')
                }}
            </p>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($news as $item)
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                    <!-- Image -->
                    @if (is_array($item->images) && count($item->images) > 0)
                        <img
                            src="{{ asset($item->images[0]) }}"
                            alt="{{ $item->title_en }}"
                            class="aspect-3/2 object-cover rounded"
                        >
                    @endif

                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-[#03244a] h-auto md:h-[4vh] line-clamp-1 overflow-hidden">
                             {{ app()->getLocale() === 'en'
                                ? $item->title_en
                                : (app()->getLocale() === 'kh'
                                    ? $item->title_kh
                                    : $item->title_cn)
                            }}
                        </h3>

                        <p class="text-[#03244a] text-sm mt-2 line-clamp-3 overflow-hidden h-auto md:h-[8vh]">
                            {{ Str::limit(strip_tags(
                                app()->getLocale() === 'en'
                                    ? $item->description_en
                                    : (app()->getLocale() === 'kh'
                                        ? $item->description_kh
                                        : $item->description_cn)
                            ), 150) }}
                        </p>

                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xs text-gray-500 font-semibold">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </span>

                            <a href="{{ route('news.show', $item->id) }}"
                               class="text-indigo-600 font-bold text-sm hover:underline">

                            </a>
                            <div class="w-36 h-8 rounded-full bg-[#03244a] flex items-center justify-center">
                                <a href="{{ route('news.show', $item->id) }}" class="cursor-pointer bg-linear-to-r from-[#f2ad46] via-[#f7ca68] to-[#fce88d]
                                bg-clip-text text-transparent font-semibold text-md">
                                    {{ app()->getLocale() === 'en'
                                    ? 'Read More'
                                    : (app()->getLocale() === 'kh'
                                        ? 'អានបន្ថែម'
                                        : '继续阅读')
                                    }}→
                                </a>
                             </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

