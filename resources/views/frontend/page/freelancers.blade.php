<div class="relative w-full h-[70vh] md:h-screen pt-12 z-10" id="freelancer">

    <!-- BACKGROUND IMAGE -->
    {{-- <img src="{{ asset('assets/background/bg-freelan.png') }}" alt="Background"
        class="absolute inset-0 w-full h-[90%] md:h-full object-cover object-[88%_center] md:object-center -z-30 bg-white/70"> --}}
        {{-- <img
            src="{{ asset('assets/background/bg-freelan.png') }}"
            alt="Background"
            class="absolute inset-0 w-full min-h-screen md:h-full
                    object-cover md:object-center object-[85%_center]
                    -z-30"
            /> --}}
    <img src="{{ asset('assets/background/bg-freelanfinal.png') }}"
         srcset="{{ asset('assets/background/bg-freelanfinal.png') }} 640w,
        {{ asset('assets/background/bg-freelanfinal.png') }} 1280w,
        {{ asset('assets/background/bg-freelanfinal.png') }} 2560w
    "
    sizes="(max-width: 768px) 100vw, 100vw"
    alt="Background"
    class="absolute inset-0 w-full h-[50vh] md:h-full object-cover md:object-center object-[88%_center] -z-30"
/>



    <div class="flex justify-between items-center -mt-6 md:mt-24 py-2 md:py-12">
        <div class="space-y-4 md:space-y-6 max-w-6xl lg:px-4 xl:px-40 px-4">
            {{-- <h1 class="text-3xl md:text-7xl font-bold" style="
                background: linear-gradient(90deg, #F2A93F 0%, #FFFBA6 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                text-fill-color: transparent;

                text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                ">
                Pov Bopheak Land
            </h1>
            <h1 class="text-2xl md:text-5xl font-bold" style="
                background: linear-gradient(90deg, #F2A93F 0%, #FFFBA6 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                text-fill-color: transparent;

                text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                ">
                Sales stand together
            </h1> --}}
            <h3 class="text-2xl md:text-[45px] font-semibold text-[#03254b] max-w-96 md:max-w-250 md:leading-15">
                 {{ app()->getLocale() === 'en'
                    ? 'Build Your Career in Real Estate with Pov Bopheak Land & Home Co., Ltd'
                    : (app()->getLocale() === 'kh'
                        ? 'កសាងអាជីពរបស់អ្នកក្នុងវិស័យអចលនទ្រព្យជាមួយ ក្រុមហ៊ុន ពៅបូភ័ក្ត្រ លែន & ហូម ឯ.ក'
                        : '在Pov Bopheak Kulen and Home 有限公司开启您的房地产事业之旅')
                }}
            </h3>
            <div class="relative inline-block">
                <!-- Smoke background -->
                <div class="absolute inset-y-0 right-0 w-4/5
                            bg-gradient-to-l from-white/70 via-white/40 to-transparent
                            blur-xl rounded-lg"></div>

                <!-- Text -->
                <p class="relative z-10 text-md md:text-xl md:mt-0 -mt-2
                        font-medium text-[#03254b] py-4 px-2
                        md:[text-shadow:none]"
                style="text-shadow: 0px 4px 6px rgba(0,0,0,0.25);">
                    {{ app()->getLocale() === 'en'
                        ? '• Flexible income'
                        : (app()->getLocale() === 'kh'
                            ? '• ប្រាក់ចំណូលឥតដែនកំណត់'
                            : '灵活的收入模式')
                    }}
                    {{ app()->getLocale() === 'en'
                        ? '• Strong brand'
                        : (app()->getLocale() === 'kh'
                            ? '• កេរ្ត៍ឈ្មោះក្រុមហ៊ុន'
                            : '• 强大的品牌影响力')
                    }} <br>
                    {{ app()->getLocale() === 'en'
                        ? '• Real projects'
                        : (app()->getLocale() === 'kh'
                            ? '• គម្រោងពិតប្រាកដ'
                            : '• 实际的项目案例')
                    }}
                     {{ app()->getLocale() === 'en'
                        ? '• Full sales support'
                        : (app()->getLocale() === 'kh'
                            ? '• ការគាំទ្រផ្នែកលក់ពេញលេញ'
                            : '• 全面的销售支持服务')
                    }}
                </p>
            </div>

            <div
                class="bg-[#f2b34e] w-52 h-10 md:w-72 md:h-20 flex justify-center items-center rounded-full md:mt-16 md:ml-8 mt-20">
                <a href="#application-form" class="text-sm md:text-xl text-[#03254b] font-bold {{ app()->getLocale() == 'kh' ? 'md:text-lg font-medium' : '' }}">
                     {{ app()->getLocale() === 'en'
                        ? 'Apply as Sales Agent'
                        : (app()->getLocale() === 'kh'
                            ? 'ដាក់ពាក្យជាភ្នាក់ងារលក់ឥឡូវនេះ'
                            : '担任销售代理')
                    }}
                </a>
            </div>
        </div>
    </div>

</div>

{{-- Your Role as a Sales Partner --}}
<div class="relative w-full md:mt-0 -mt-27 z-50">
    <h1 class="text-2xl md:text-5xl font-semibold text-center text-[#03254B] py-6 md:py-16">
        {{ app()->getLocale() === 'en'
            ? 'Your Role as a Sales Partner'
            : (app()->getLocale() === 'kh'
                ? 'តួនាទីរបស់អ្នកជាដៃគូលក់'
                : '作为销售伙伴的职责')
        }}
    </h1>

    <div class="space-y-12 flex justify-center items-center px-2">
        <div
            class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-3 space-y-4 space-x-4 gap-1 md:gap-x-8 lg:gap-2">

            <!-- CARD -->
            <div class="group w-40 h-36 md:w-64 md:h-40 rounded-2xl
            flex justify-center items-center
            bg-[#03254B]
            transition-all duration-200 ease-in-out
            hover:bg-gradient-to-r hover:from-[#F2A93F] hover:to-[#FFFBA6]">

                <div class="max-w-sm mx-auto
                text-white
                transition-colors ease-in-out
                group-hover:text-[#03254B] text-xs md:text-sm">
                    <p class="w-32 md:max-w-64 mx-auto">
                        {{ app()->getLocale() === 'en'
                            ? 'Introduce (potential) buyers to Pov Bopheak projects'
                            : (app()->getLocale() === 'kh'
                                ? 'ណែនាំ (អ្នកទិញសក្តានុពល) អំពីគម្រោងអចលទ្រព្យនៅក្រុមហ៊ុនពៅបូភ័ក្ត្រលែន&ហូមឯ.ក'
                                : '向潜在买家介绍（潜在）买家项目')
                        }}
                    </p>
                </div>
            </div>

            <!-- CARD -->
            <div class="group w-40 h-36 md:w-64 md:h-40 rounded-2xl
            flex justify-center items-center
            bg-[#03254B]
            transition-all duration-700 ease-in-out
            hover:bg-gradient-to-r hover:from-[#F2A93F] hover:to-[#FFFBA6]">

                <div class="max-w-sm mx-auto
                text-white
                transition-colors duration-700 ease-in-out
                group-hover:text-[#03254B] text-xs md:text-sm">
                    <p class="w-32 md:max-w-64 mx-auto">
                        {{ app()->getLocale() === 'en'
                            ? 'Promote projects online or offline'
                            : (app()->getLocale() === 'kh'
                                ? 'ផ្សព្វផ្សាយគម្រោង តាមអ៊ីនធឺណិត ឬតាមបណ្តាញទំនាក់ទំនង'
                                : '在线或线下推广项目')
                        }}
                    </p>
                </div>
            </div>

            <!-- CARD -->
            <div class="group w-40 h-36 md:w-64 md:h-40 rounded-2xl
            flex justify-center items-center
            bg-[#03254B]
            transition-all duration-700 ease-in-out
            hover:bg-gradient-to-r hover:from-[#F2A93F] hover:to-[#FFFBA6]">

                <div class="max-w-sm mx-auto
                text-white
                transition-colors duration-700 ease-in-out
                group-hover:text-[#03254B] text-xs md:text-sm">
                    <p class="w-32 md:max-w-64 mx-auto">
                        {{ app()->getLocale() === 'en'
                            ? 'Arrange site visits (with company support)'
                            : (app()->getLocale() === 'kh'
                                ? 'រៀបចំការចុះទៅមើលទីតាំង (ដោយមានការជួយជ្រោមជ្រែងពីក្រុមហ៊ុន)'
                                : '安排实地考察（有公司支持）')
                        }}
                    </p>
                </div>
            </div>

             <!-- CARD -->
            <div class="group w-40 h-36 md:w-64 md:h-40 rounded-2xl
            flex justify-center items-center
            bg-[#03254B]
            transition-all duration-700 ease-in-out
            hover:bg-gradient-to-r hover:from-[#F2A93F] hover:to-[#FFFBA6]">

                <div class="max-w-sm mx-auto
                text-white
                transition-colors duration-700 ease-in-out
                group-hover:text-[#03254B] text-xs md:text-sm px-4">
                    <p class="w-32 md:max-w-64 mx-auto">
                        {{ app()->getLocale() === 'en'
                            ? 'Assist buyers through booking and documentation'
                            : (app()->getLocale() === 'kh'
                                ? 'ជួយអតិថិជនតាមរយៈការកក់ និងឯកសារនានា'
                                : '协助买家完成预订和文件处理')
                        }}
                    </p>
                </div>
            </div>

            <!-- CARD -->
            <div class="group w-40 h-36 md:w-64 md:h-40 rounded-2xl
            flex justify-center items-center
            bg-[#03254B]
            transition-all duration-700 ease-in-out
            hover:bg-gradient-to-r hover:from-[#F2A93F] hover:to-[#FFFBA6]">

                <div class="max-w-sm mx-auto
                text-white
                transition-colors duration-700 ease-in-out
                group-hover:text-[#03254B] text-xs md:text-sm">
                    <p class="w-32 md:max-w-64 mx-auto">
                        {{ app()->getLocale() === 'en'
                            ? 'Earn commission upon successful sales'
                            : (app()->getLocale() === 'kh'
                                ? 'ទទួលបានកម្រៃជើងសារនៅពេលលក់បានជោគជ័យ'
                                : '成功销售后可获得佣金')
                        }}
                    </p>
                </div>
            </div>

            <!-- CARD -->
            <div class="group w-40 h-36 md:w-64 md:h-40 rounded-2xl
            flex justify-center items-center
            bg-[#03254B]
            transition-all duration-700 ease-in-out
            hover:bg-gradient-to-r hover:from-[#F2A93F] hover:to-[#FFFBA6]">

                <div class="max-w-sm mx-auto
                text-white
                transition-colors duration-700 ease-in-out
                group-hover:text-[#03254B] text-xs md:text-sm">
                    <p class="w-32 md:max-w-64 mx-auto">
                        {{ app()->getLocale() === 'en'
                            ? 'No office commitment required. Performance based income.'
                            : (app()->getLocale() === 'kh'
                                ? 'មិនតម្រូវឱ្យមានកាតព្វកិច្ចការិយាល័យទេ ប្រាក់ចំណូលផ្អែកលើការអនុវត្តការងារ។'
                                : '无需承担办公室工作。按业绩计酬。')
                        }}
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- We Support You With --}}
<div class="relative w-full bg-[#F2F3F5] h-auto md:h-125 md:mt-12 md:top-0">
    <h1 class="text-2xl md:text-5xl font-semibold text-center text-[#03254B] py-8 md:py-16">
        {{ app()->getLocale() === 'en'
            ? 'We Support You With ...'
            : (app()->getLocale() === 'kh'
                ? 'ក្រុមហ៊ុនជួយជ្រោមជ្រែងអ្នកដោយផ្តល់នូវ ៖'
                : '我们为您提供支持')
        }}
    </h1>

    <section class="bg-[#f5f5f5]">
        <div class="max-w-7xl mx-auto px-6">

            <div class="grid grid-cols-2 lg:grid-cols-3
                        gap-y-16 gap-x-10
                        place-items-center
                        max-w-6xl mx-auto">

                <!-- ITEM 1 -->
                <div class="w-full md:max-w-72 mx-auto flex flex-col justify-center">
                    <img src="{{ asset('assets/icon/icon-freelan/1.png') }}" class="w-8 h-8 mb-4" alt="">
                    <p class="text-[#0a2a5e] text-md md:text-lg font-medium leading-snug text-left">
                        {{ app()->getLocale() === 'en'
                            ? 'Project brochures'
                            : (app()->getLocale() === 'kh'
                                ? 'ខិត្តប័ណ្ណគម្រោង និងតារាងតម្លៃ'
                                : '项目宣传册')
                        }} <br> {{ app()->getLocale() === 'en'
            ? '& price lists'
            : (app()->getLocale() === 'kh'
                ? ''
                : '和价格清单')
        }}
                    </p>
                </div>

                <!-- ITEM 2 -->
                <div class="w-full md:max-w-72 mx-auto flex flex-col justify-center">
                    <img src="{{ asset('assets/icon/icon-freelan/2.png') }}" class="w-12 h-12 mb-4" alt="">
                    <p class="text-[#0a2a5e] text-md md:text-lg font-medium leading-snug text-left">
                        {{ app()->getLocale() === 'en'
                            ? 'Legal ownership'
                            : (app()->getLocale() === 'kh'
                                ? 'ព័ត៌មានអំពីកម្មសិទ្ធិស្របច្បាប់'
                                : '法律所有权信息')
                        }} <br> {{ app()->getLocale() === 'en'
                            ? 'information'
                            : (app()->getLocale() === 'kh'
                                ? ''
                                : '')
                        }}
                    </p>
                </div>

                <!-- ITEM 3 -->
                <div class="w-full md:max-w-72 mx-auto flex flex-col justify-center">
                    <img src="{{ asset('assets/icon/icon-freelan/3.png') }}" class="w-12 h-12 mb-4" alt="">
                    <p class="text-[#0a2a5e] text-md md:text-lg font-medium leading-snug text-left">
                        {{ app()->getLocale() === 'en'
                            ? 'On-site sales team'
                            : (app()->getLocale() === 'kh'
                                ? 'ជំនួយពីក្រុមលក់នៅនឹងកន្លែង'
                                : '现场销售团队协助')
                        }}  <br> {{ app()->getLocale() === 'en'
                            ? 'assistance'
                            : (app()->getLocale() === 'kh'
                                ? ''
                                : '')
                        }}
                    </p>
                </div>

                <!-- ITEM 4 -->
                <div class="w-full md:max-w-72 mx-auto flex flex-col justify-center">
                    <img src="{{ asset('assets/icon/icon-freelan/4.png') }}" class="w-12 h-12 mb-4" alt="">
                    <p class="text-[#0a2a5e] text-md md:text-lg font-medium leading-snug text-left">
                         {{ app()->getLocale() === 'en'
                            ? 'Sales scripts'
                            : (app()->getLocale() === 'kh'
                                ? 'ឃ្លានិយាយលក់ និងការបណ្តុះបណ្តាល'
                                : '销售脚本与培训')
                        }}  <br>  {{ app()->getLocale() === 'en'
                            ? '& training'
                            : (app()->getLocale() === 'kh'
                                ? ''
                                : '')
                        }}
                    </p>
                </div>

                <!-- ITEM 5 -->
                <div class="w-full md:max-w-72 mx-auto flex flex-col justify-center">
                    <img src="{{ asset('assets/icon/icon-freelan/5.png') }}" class="w-12 h-12 mb-4" alt="">
                    <p class="text-[#0a2a5e] text-md md:text-lg font-medium leading-snug text-left">
                         {{ app()->getLocale() === 'en'
                            ? 'Marketing photos'
                            : (app()->getLocale() === 'kh'
                                ? 'រូបថត និងវីដេអូទីផ្សារ'
                                : '营销照片和视频')
                        }}  <br> {{ app()->getLocale() === 'en'
                            ? '& videos'
                            : (app()->getLocale() === 'kh'
                                ? ''
                                : '')
                        }}
                    </p>
                </div>

                <!-- ITEM 6 -->
                <div class="w-full md:max-w-72 mx-auto flex flex-col justify-center">
                    <img src="{{ asset('assets/icon/icon-freelan/6.png') }}" class="w-12 h-12 mb-4" alt="">
                    <p class="text-[#0a2a5e] text-md md:text-lg font-medium leading-snug text-left">
                        {{ app()->getLocale() === 'en'
                            ? 'Customer service & '
                            : (app()->getLocale() === 'kh'
                                ? 'សេវាកម្មអតិថិជន និង ការដោះស្រាយនៅលើឯកសារនានា'
                                : '客户服务与文件处理')
                        }} <br> {{ app()->getLocale() === 'en'
                            ? 'document handling'
                            : (app()->getLocale() === 'kh'
                                ? ''
                                : '')
                        }}
                    </p>
                </div>

            </div>
        </div>
    </section>

</div>

{{-- Commission & Rewards --}}

<div class="relative max-w-7xl mx-auto px-6 lg:py-20 py-20 md:py-36">
    <h1 class="text-2xl md:text-5xl font-semibold text-center text-[#03254B] py-4 md:py-10 -mt-12 md:-mt-8">
       {{ app()->getLocale() === 'en'
            ? ' Commission & Rewards'
            : (app()->getLocale() === 'kh'
                ? 'កម្រៃជើងសារ និងរង្វាន់'
                : '佣金与奖励')
        }}
    </h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">

        <!-- Item 01 -->
        <div>
            <h2 class="text-xl font-semibold mb-2
        bg-gradient-to-r from-[#F2A93F] to-[#FFFBA6]
        bg-clip-text text-transparent">
                01
            </h2>

            <div class="w-full h-[3px] mb-4" style="background: linear-gradient(90deg, #F2A93F 0%, #FFFBA6 100%);">
            </div>

            <p class="w-full md:max-w-56 text-[#03254B] text-lg leading-relaxed">
                {{ app()->getLocale() === 'en'
                    ? 'Competitive commission per unit sold'
                    : (app()->getLocale() === 'kh'
                        ? 'កម្រៃជើងសារប្រកួតប្រជែង ក្នុងមួយយូនីតដែលបានលក់'
                        : '每单位销售的竞争力佣金')
                }}
            </p>
        </div>

        <!-- Item 02 -->
        <div>
            <h2 class="text-xl font-semibold mb-2
        bg-gradient-to-r from-[#F2A93F] to-[#FFFBA6]
        bg-clip-text text-transparent">
                02
            </h2>

            <div class="w-full h-[3px] mb-4" style="background: linear-gradient(90deg, #F2A93F 0%, #FFFBA6 100%);">
            </div>

            <p class="w-full md:max-w-56 text-[#03254B] text-lg leading-relaxed">
                {{ app()->getLocale() === 'en'
                    ? 'Performance bonuses for high achievers'
                    : (app()->getLocale() === 'kh'
                        ? 'ប្រាក់រង្វាន់ខ្ពស់សម្រាប់ការអនុវត្តការងារ'
                        : '对杰出人士的绩效奖励')
                }}
            </p>
        </div>

        <!-- Item 03 -->
        <div>
            <h2 class="text-xl font-semibold mb-2
        bg-gradient-to-r from-[#F2A93F] to-[#FFFBA6]
        bg-clip-text text-transparent">
                03
            </h2>

            <div class="w-full h-[3px] mb-4" style="background: linear-gradient(90deg, #F2A93F 0%, #FFFBA6 100%);">
            </div>

            <p class="w-full md:max-w-56 text-[#03254B] text-lg leading-relaxed">
                {{ app()->getLocale() === 'en'
                    ? 'Special incentives during project launches'
                    : (app()->getLocale() === 'kh'
                        ? 'ការលើកទឹកចិត្តពិសេសក្នុងអំឡុងពេលបើកដំណើរការគម្រោង'
                        : '项目启动期间的特别激励措施')
                }}
            </p>
        </div>

        <!-- Item 04 -->
        <div>
            <h2 class="text-xl font-semibold mb-2
        bg-gradient-to-r from-[#F2A93F] to-[#FFFBA6]
        bg-clip-text text-transparent">
                04
            </h2>

            <div class="w-full h-[3px] mb-4" style="background: linear-gradient(90deg, #F2A93F 0%, #FFFBA6 100%);">
            </div>

            <p class="w-full md:max-w-56 text-[#03254B] text-lg leading-relaxed">
                {{ app()->getLocale() === 'en'
                    ? 'Transparent tracking & fast payment'
                    : (app()->getLocale() === 'kh'
                        ? 'ការតាមដានលទ្ធផលការងារប្រកបដោយតម្លាភាព និងការទូទាត់រហ័ស'
                        : '透明的追踪服务与快速的支付方式')
                }}
            </p>
        </div>

    </div>
</div>


{{-- Application form --}}
<div class="relative w-full bg-white" id="application-form">
    <!-- Title -->
    <h1 class="text-2xl md:text-5xl font-semibold text-center text-[#03254B] -mt-6">
        {{ app()->getLocale() === 'en'
            ? 'Application Form'
            : (app()->getLocale() === 'kh'
                ? 'ទម្រង់បែបបទដាក់ពាក្យ'
                : '申请表')
        }}
    </h1>

    @if (session('successfully'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
            class="fixed top-6 right-6 z-50 bg-green-600 text-white px-6 py-4 rounded-xl shadow-lg">
            {{ session('successfully') }}
        </div>
    @endif

    <!-- Form -->
    <div class="max-w-4xl mx-auto px-4 mt-10">
        @if ($errors->any())
            <div class="mb-6 rounded-xl bg-red-50 border border-red-200 p-4 text-red-600">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('application.send') }}" class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6"
            method="POST">
            @csrf

            <!-- Full Name -->
           <div class="relative">
                <input type="text" placeholder="{{ app()->getLocale() === 'en'
                    ? 'Full Name'
                    : (app()->getLocale() === 'kh'
                        ? 'ឈ្មោះពេញ '
                        : '名字')
                }} " name="full_name" value="{{ old('full_name') }}" required
                class="w-full h-14 px-6 rounded-full bg-[#F1F1F1] text-[#03254B] placeholder-[#03254B] outline-none
                    @error('full_name') border border-red-500 @enderror" />
                @error('full_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
           </div>

            <!-- Sex Type -->
            <div class="relative">
                <select name="sex" required
                    class="w-full h-14 px-6 pr-12 rounded-full bg-[#F1F1F1] text-[#03254B] outline-none appearance-none">
                    <option value="" disabled selected>
                        {{ app()->getLocale() === 'en'
                            ? 'Sex'
                            : (app()->getLocale() === 'kh'
                                ? 'ភេទ'
                                : '性')
                        }}
                    </option>
                    <option value="Male">
                        {{ app()->getLocale() === 'en'
                            ? 'Male'
                            : (app()->getLocale() === 'kh'
                                ? 'ប្រុស'
                                : '女性')
                        }}
                    </option>
                    <option value="Female">
                        {{ app()->getLocale() === 'en'
                            ? 'Female'
                            : (app()->getLocale() === 'kh'
                                ? 'ស្រី'
                                : '男性')
                        }}
                    </option>
                </select>
                <span class="absolute right-6 top-1/2 -translate-y-1/2">
                    <!-- SVG -->
                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none">
                        <path
                            d="M10.5 4.60096C11.8333 5.37076 11.8333 7.29526 10.5 8.06506L3 12.3952C1.66666 13.165 0 12.2027 0 10.6631L0 2.00288C0 0.463276 1.66667 -0.498971 3 0.27083L10.5 4.60096Z"
                            fill="#03254B" />
                    </svg>
                </span>
                @error('sex')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Experience Level -->
            <div class="relative w-full overflow-visible">
                <!-- Button -->
                <button type="button" id="experienceBtn" class="w-full h-14 px-6 rounded-full bg-[#F1F1F1] text-[#03254B]
               flex justify-between items-center">
                    <span id="experienceText">
                        {{ app()->getLocale() === 'en'
                            ? 'Experience Level'
                            : (app()->getLocale() === 'kh'
                                ? 'កម្រិតបទពិសោធន៍'
                                : '经验水平')
                        }}
                    </span>
                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none">
                        <path d="M10.5 4.6C11.8 5.37 11.8 7.29 10.5 8.06L3 12.4
                     C1.7 13.2 0 12.2 0 10.7V2
                     C0 .46 1.7 -.5 3 .27L10.5 4.6Z" fill="#03254B" />
                    </svg>
                </button>

                <!-- Dropdown -->
                <div id="experienceMenu"
                    class="hidden absolute z-[9999] mt-2 w-full bg-white rounded-xl shadow-lg p-4 space-y-3">

                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="radio" name="experience" value="No experience"
                        {{ old('experience') == 'No experience' ? 'checked' : '' }}>
                        <span>
                            {{ app()->getLocale() === 'en'
                            ? 'No experience'
                            : (app()->getLocale() === 'kh'
                                ? 'គ្មានបទពិសោធន៍'
                                : '没有经验')
                        }}
                        </span>
                    </label>

                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="radio" name="experience" value="1–2 years"
                         {{ old('experience') == '1-2 years' ? 'checked' : '' }}>
                        <span>
                            {{ app()->getLocale() === 'en'
                            ? '1–2 years'
                            : (app()->getLocale() === 'kh'
                                ? 'ចន្លោះពី 1 ឆ្នាំទៅ 2ឆ្នាំ'
                                : '1 至 2 年')
                        }}
                        </span>
                    </label>

                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="radio" name="experience" value="3+ years"
                         {{ old('experience') == '3+ years' ? 'checked' : '' }}>
                        <span>
                            {{ app()->getLocale() === 'en'
                            ? '3+ years'
                            : (app()->getLocale() === 'kh'
                                ? '3ឆ្នាំឡើង'
                                : '3 年以上')
                        }}
                        </span>
                    </label>

                </div>
            </div>

             <!-- Are You a... -->
            {{-- <div class="relative">
                <input type="text" placeholder="Are you a ..." name="position"
                    class="w-full h-14 px-6 rounded-full bg-[#F1F1F1] text-[#03254B] placeholder-[#03254B] outline-none" />
            </div> --}}
            <div class="relative w-full overflow-visible">
                <!-- Button -->
                <button type="button" id="positionBtn" class="w-full h-14 px-6 rounded-full bg-[#F1F1F1] text-[#03254B]
               flex justify-between items-center">
                    <span id="positionText">
                        {{ app()->getLocale() === 'en'
                            ? 'Are you a: '
                            : (app()->getLocale() === 'kh'
                                ? 'តើអ្នកជា'
                                : '你是一位......吗？')
                        }}
                    </span>
                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none">
                        <path d="M10.5 4.6C11.8 5.37 11.8 7.29 10.5 8.06L3 12.4
                     C1.7 13.2 0 12.2 0 10.7V2
                     C0 .46 1.7 -.5 3 .27L10.5 4.6Z" fill="#03254B" />
                    </svg>
                </button>

                <!-- Dropdown -->
                <div id="positionMenu"
                    class="hidden absolute z-[9999] mt-2 w-full bg-white rounded-xl shadow-lg p-4 space-y-3">

                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="radio" name="position" value="Freelancer"
                         {{ old('position') == 'Freelancer' ? 'checked' : '' }}>
                        <span>
                            {{ app()->getLocale() === 'en'
                            ? 'Freelancer'
                            : (app()->getLocale() === 'kh'
                                ? 'អ្នកធ្វើការឯករាជ្យ'
                                : '自由职业者')
                        }}
                        </span>
                    </label>

                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="radio" name="position" value="Independent Agent"
                        {{ old('position') == 'Independent Agent' ? 'checked' : '' }}>
                        <span>
                            {{ app()->getLocale() === 'en'
                            ? 'Independent Agent'
                            : (app()->getLocale() === 'kh'
                                ? 'ក្រុមលក់ឯករាជ្យ '
                                : '独立代理人')
                        }}
                        </span>
                    </label>

                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="radio" name="position" value="Agency Team"
                        {{ old('position') == 'Agency Team' ? 'checked' : '' }}>
                        <span>
                            {{ app()->getLocale() === 'en'
                            ? 'Agency Team'
                            : (app()->getLocale() === 'kh'
                                ? 'ក្រុមហ៊ុនលក់អចលទ្រព្យ'
                                : '代理团队')
                        }}
                        </span>
                    </label>
                </div>
            </div>
            <!-- Phone -->
            <div class="relative">
                <input type="text" placeholder="{{ app()->getLocale() === 'en'
                            ? 'Phone Number'
                            : (app()->getLocale() === 'kh'
                                ? 'លេខទូរសព្ទ'
                                : '电话号码')
                        }} " name="phone" value="{{ old('phone') }}" required
                class="w-full h-14 px-6 rounded-full bg-[#F1F1F1] text-[#03254B] outline-none placeholder:font-medium
                @error('phone') border border-red-500 @enderror" />
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>



            <!-- Email -->
            <div class="relative">
                <input type="email" placeholder="{{ app()->getLocale() === 'en'
                            ? 'Email'
                            : (app()->getLocale() === 'kh'
                                ? 'អ៊ីម៉ែល'
                                : '电子邮件')
                        }} " name="email" value="{{ old('email') }}" required
                class="w-full h-14 px-6 rounded-full bg-[#F1F1F1] text-[#03254B] outline-none placeholder:font-semibold"
                @error('email') border border-red-500 @enderror/>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <div class="flex justify-center py-6 w-full md:col-span-2">
                <button type="submit" class="px-24 py-2 md:px-32 md:py-4 rounded-full bg-[#03254B] font-medium text-lg cursor-pointer">
                    <span class="inline-block" style="
                            background: linear-gradient(90deg, #F2A93F 0%, #FFFBA6 100%);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            background-clip: text;
                            color: transparent;
                        ">
                          {{ app()->getLocale() === 'en'
                                ? 'Submit'
                                : (app()->getLocale() === 'kh'
                                    ? 'ដាក់បញ្ជូន'
                                    : '提交')
                            }}
                    </span>
                </button>
            </div>
        </form>

    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {

        const btn = document.getElementById('experienceBtn');
        const menu = document.getElementById('experienceMenu');
        const text = document.getElementById('experienceText');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        document.querySelectorAll('input[name="experience"]').forEach(radio => {
            radio.addEventListener('change', () => {
                text.textContent = radio.value;
                menu.classList.add('hidden'); // auto close
            });
        });

        // Optional: close when clicking outside
        document.addEventListener('click', (e) => {
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        const btn = document.getElementById('positionBtn');
        const menu = document.getElementById('positionMenu');
        const text = document.getElementById('positionText');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        document.querySelectorAll('input[name="position"]').forEach(radio => {
            radio.addEventListener('change', () => {
                text.textContent = radio.value;
                menu.classList.add('hidden'); // auto close
            });
        });

        // Optional: close when clicking outside
        document.addEventListener('click', (e) => {
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });

    });
</script>

{{-- Show Validation for input --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {

        const expText = document.getElementById('experienceText');
        const posText = document.getElementById('positionText');

        const oldExperience = "{{ old('experience') }}";
        const oldPosition = "{{ old('position') }}";

        if (oldExperience) expText.textContent = oldExperience;
        if (oldPosition) posText.textContent = oldPosition;

    });
</script>
