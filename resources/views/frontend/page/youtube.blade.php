<!-- YouTube Section Below Latest News -->
<section class="bg-gray-50 py-4" id="youtube">

    <div class="max-w-7xl mx-auto px-6">
        <!-- Header -->
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-5xl font-semibold text-center text-[#03254B]">
                 {{ app()->getLocale() === 'en'
                    ? "Pov Bopheak Land & Home YouTube Video's"
                    : (app()->getLocale() === 'kh'
                        ? 'ក្រុមហ៊ុនពៅបូភ័ក្ត្រលែន & ហូម វីដេអូ YouTube'
                        : 'Pov Bopheak Land & Home YouTube 視頻')
                }}
            </h2>
        </div>
        <!-- Grid of Embedded Videos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($getLinkYoutube as $video)
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                    <!-- Embedded Video -->
                    <div class="aspect-video">
                        <iframe 
                            class="w-full h-full"
                            src="{{ $video->link }}" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
