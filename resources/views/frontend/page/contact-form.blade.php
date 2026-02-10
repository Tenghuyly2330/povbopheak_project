<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<style>
    /* Remove the arrow for Chrome, Safari, and Edge */
    input::-webkit-calendar-picker-indicator {
        display: none !important;
        -webkit-appearance: none;
    }

    /* For older versions of Edge */
    input::-ms-expand {
        display: none;
    }
</style>

<div class="w-full py-6" id="contact-form">
    <!-- Title -->
    <h1 class="text-2xl md:text-5xl font-semibold text-center text-[#03254B] py-4 md:py-16">

        {{ app()->getLocale() === 'en'
            ? 'Contact Form'
            : (app()->getLocale() === 'kh'
                ? 'ទម្រង់ទំនាក់ទំនង'
                : '联系表单') }}
    </h1>
    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-cloak x-transition
            class="fixed top-6 right-6 z-50 bg-green-600 text-white px-6 py-4 rounded-xl shadow-lg">
            {{ session('success') }}
        </div>
    @endif


    <!-- Form -->
    <div class="max-w-4xl mx-auto px-4">
        @if ($errors->any())
            <div class="mb-6 rounded-xl bg-red-50 border border-red-200 p-4 text-red-600">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <!-- Full Name -->
                <input type="text"
                    placeholder="{{ app()->getLocale() === 'en' ? 'Full Name' : (app()->getLocale() === 'kh' ? 'ឈ្មោះពេញ ' : '名字') }}"
                    name="full_name" required
                    class="w-full h-14 px-6 rounded-full bg-[#F1F1F1] text-[#03254B] placeholder-[#03254B] outline-none" />

                <!-- Buyer Type -->
                <div class="relative">
                    <select name="buyer_type" required
                        class="w-full h-14 px-6 pr-12 rounded-full bg-[#F1F1F1] text-[#03254B] outline-none appearance-none">
                        <option>
                            {{ app()->getLocale() === 'en' ? 'Buyer Type' : (app()->getLocale() === 'kh' ? 'ប្រភេទអ្នកទិញ' : '买家类型') }}
                        </option>
                        <option value="End-user(Living)">
                            {{ app()->getLocale() === 'en'
                                ? 'End-user (Living)'
                                : (app()->getLocale() === 'kh'
                                    ? 'អ្នកទិញរស់នៅផ្ទាល់'
                                    : '顾客们') }}
                        </option>
                        <option value="Investor(Rental/Resale)">
                            {{ app()->getLocale() === 'en'
                                ? 'Investor (Rental / Resale)'
                                : (app()->getLocale() === 'kh'
                                    ? 'អ្នកទិញដើម្បីវិនិយោគ'
                                    : '投资者') }}
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
                    @error('buyer_type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Country -->
                <div class="relative custom-select-container">
                    <input list="country-list" name="country"
                        placeholder="{{ app()->getLocale() === 'en'
                            ? 'Country of Origin'
                            : (app()->getLocale() === 'kh'
                                ? 'ជ្រើសរើសប្រទេស'
                                : '原产国') }}"
                        required class="w-full h-14 px-6 pr-12 rounded-full bg-[#F1F1F1] text-[#03254B] outline-none">
                    <datalist id="country-list" name="country" required
                        class="w-full h-14 px-6 pr-12 rounded-full bg-[#F1F1F1] text-[#03254B] outline-none appearance-none">
                        {{-- <option>Country of Origin</option> --}}
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Afghanistan' : (app()->getLocale() === 'kh' ? 'អាហ្វហ្គានីស្ថាន' : '阿富汗') }}">
                            {{ app()->getLocale() === 'en' ? 'Afghanistan' : (app()->getLocale() === 'kh' ? 'អាហ្វហ្គានីស្ថាន' : '阿富汗') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Albania' : (app()->getLocale() === 'kh' ? 'អាល់បានី' : '阿尔巴尼亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Albania' : (app()->getLocale() === 'kh' ? 'អាល់បានី' : '阿尔巴尼亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Algeria' : (app()->getLocale() === 'kh' ? 'អាល់ហ្សេរី' : '阿尔及利亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Algeria' : (app()->getLocale() === 'kh' ? 'អាល់ហ្សេរី' : '阿尔及利亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Andorra' : (app()->getLocale() === 'kh' ? 'អង់ដូរ៉ា' : '安道尔') }}">
                            {{ app()->getLocale() === 'en' ? 'Andorra' : (app()->getLocale() === 'kh' ? 'អង់ដូរ៉ា' : '安道尔') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Angola' : (app()->getLocale() === 'kh' ? 'អង់ហ្គោឡា' : '安哥拉') }}">
                            {{ app()->getLocale() === 'en' ? 'Angola' : (app()->getLocale() === 'kh' ? 'អង់ហ្គោឡា' : '安哥拉') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Argentina' : (app()->getLocale() === 'kh' ? 'អាហ្សង់ទីណា' : '阿根廷') }}">
                            {{ app()->getLocale() === 'en' ? 'Argentina' : (app()->getLocale() === 'kh' ? 'អាហ្សង់ទីណា' : '阿根廷') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Armenia' : (app()->getLocale() === 'kh' ? 'អាមែនី' : '亚美尼亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Armenia' : (app()->getLocale() === 'kh' ? 'អាមែនី' : '亚美尼亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Australia' : (app()->getLocale() === 'kh' ? 'អូស្រ្តាលី' : '澳大利亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Australia' : (app()->getLocale() === 'kh' ? 'អូស្រ្តាលី' : '澳大利亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Austria' : (app()->getLocale() === 'kh' ? 'អូទ្រីស' : '奥地利') }}">
                            {{ app()->getLocale() === 'en' ? 'Austria' : (app()->getLocale() === 'kh' ? 'អូទ្រីស' : '奥地利') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Azerbaijan' : (app()->getLocale() === 'kh' ? 'អាស៊ែរបៃហ្សង់' : '阿塞拜疆') }}">
                            {{ app()->getLocale() === 'en' ? 'Azerbaijan' : (app()->getLocale() === 'kh' ? 'អាស៊ែរបៃហ្សង់' : '阿塞拜疆') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Bahamas' : (app()->getLocale() === 'kh' ? 'បាហាម៉ាស់' : '巴哈马') }}">
                            {{ app()->getLocale() === 'en' ? 'Bahamas' : (app()->getLocale() === 'kh' ? 'បាហាម៉ាស់' : '巴哈马') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Bahrain' : (app()->getLocale() === 'kh' ? 'បារ៉ែន' : '巴林') }}">
                            {{ app()->getLocale() === 'en' ? 'Bahrain' : (app()->getLocale() === 'kh' ? 'បារ៉ែន' : '巴林') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Bangladesh' : (app()->getLocale() === 'kh' ? 'បង់ក្លាដែស' : '孟加拉国') }}">
                            {{ app()->getLocale() === 'en' ? 'Bangladesh' : (app()->getLocale() === 'kh' ? 'បង់ក្លាដែស' : '孟加拉国') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Barbados' : (app()->getLocale() === 'kh' ? 'បាបាដូស' : '巴巴多斯') }}">
                            {{ app()->getLocale() === 'en' ? 'Barbados' : (app()->getLocale() === 'kh' ? 'បាបាដូស' : '巴巴多斯') }}
                        </option>

                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Belarus' : (app()->getLocale() === 'kh' ? 'បេឡារុស' : '白俄罗斯') }}">
                            {{ app()->getLocale() === 'en' ? 'Belarus' : (app()->getLocale() === 'kh' ? 'បេឡារុស' : '白俄罗斯') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Belgium' : (app()->getLocale() === 'kh' ? 'បែលហ្ស៊ិក' : '比利时') }}">
                            {{ app()->getLocale() === 'en' ? 'Belgium' : (app()->getLocale() === 'kh' ? 'បែលហ្ស៊ិក' : '比利时') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Belize' : (app()->getLocale() === 'kh' ? 'បេលីហ្សេ' : '伯利兹') }}">
                            {{ app()->getLocale() === 'en' ? 'Belize' : (app()->getLocale() === 'kh' ? 'បេលីហ្សេ' : '伯利兹') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Benin' : (app()->getLocale() === 'kh' ? 'បេណីន' : '贝宁') }}">
                            {{ app()->getLocale() === 'en' ? 'Benin' : (app()->getLocale() === 'kh' ? 'បេណីន' : '贝宁') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Bhutan' : (app()->getLocale() === 'kh' ? 'ភូតង់' : '不丹') }}">
                            {{ app()->getLocale() === 'en' ? 'Bhutan' : (app()->getLocale() === 'kh' ? 'ភូតង់' : '不丹') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Bosnia and Herzegovina' : (app()->getLocale() === 'kh' ? 'បូស្នី និងហឺហ្សេហ្គូវីណា' : '波斯尼亚和黑塞哥维那') }}">
                            {{ app()->getLocale() === 'en' ? 'Bosnia and Herzegovina' : (app()->getLocale() === 'kh' ? 'បូស្នី និងហឺហ្សេហ្គូវីណា' : '波斯尼亚和黑塞哥维那') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Botswana' : (app()->getLocale() === 'kh' ? 'បូតស្វាណា' : '博茨瓦纳') }}">
                            {{ app()->getLocale() === 'en' ? 'Botswana' : (app()->getLocale() === 'kh' ? 'បូតស្វាណា' : '博茨瓦纳') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Brazil' : (app()->getLocale() === 'kh' ? 'ប្រេស៊ីល' : '巴西') }}">
                            {{ app()->getLocale() === 'en' ? 'Brazil' : (app()->getLocale() === 'kh' ? 'ប្រេស៊ីល' : '巴西') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Brunei' : (app()->getLocale() === 'kh' ? 'ប្រូណី' : '文莱') }}">
                            {{ app()->getLocale() === 'en' ? 'Brunei' : (app()->getLocale() === 'kh' ? 'ប្រូណី' : '文莱') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Bulgaria' : (app()->getLocale() === 'kh' ? 'ប៊ុលហ្គារី' : '保加利亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Bulgaria' : (app()->getLocale() === 'kh' ? 'ប៊ុលហ្គារី' : '保加利亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Burkina Faso' : (app()->getLocale() === 'kh' ? 'ប៊ួរគីណា​ហ្វាសូ' : '布基纳法索') }}">
                            {{ app()->getLocale() === 'en' ? 'Burkina Faso' : (app()->getLocale() === 'kh' ? 'ប៊ួរគីណា​ហ្វាសូ' : '布基纳法索') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Burundi' : (app()->getLocale() === 'kh' ? 'ប៊ូរុនឌី' : '布隆迪') }}">
                            {{ app()->getLocale() === 'en' ? 'Burundi' : (app()->getLocale() === 'kh' ? 'ប៊ូរុនឌី' : '布隆迪') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Cambodia' : (app()->getLocale() === 'kh' ? 'កម្ពុជា' : 'Cambodia') }}">
                            {{ app()->getLocale() === 'en' ? 'Cambodia' : (app()->getLocale() === 'kh' ? 'កម្ពុជា' : 'Cambodia') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Cameroon' : (app()->getLocale() === 'kh' ? 'កាមេរូន' : '喀麦隆') }}">
                            {{ app()->getLocale() === 'en' ? 'Cameroon' : (app()->getLocale() === 'kh' ? 'កាមេរូន' : '喀麦隆') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Canada' : (app()->getLocale() === 'kh' ? 'កាណាដា' : '加拿大') }}">
                            {{ app()->getLocale() === 'en' ? 'Canada' : (app()->getLocale() === 'kh' ? 'កាណាដា' : '加拿大') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Cape Verde' : (app()->getLocale() === 'kh' ? 'កាបវែត' : '佛得角') }}">
                            {{ app()->getLocale() === 'en' ? 'Cape Verde' : (app()->getLocale() === 'kh' ? 'កាបវែត' : '佛得角') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Central African Republic' : (app()->getLocale() === 'kh' ? 'សាធារណរដ្ឋអាហ្វ្រិកកណ្ដាល' : '中非共和国') }}">
                            {{ app()->getLocale() === 'en' ? 'Central African Republic' : (app()->getLocale() === 'kh' ? 'សាធារណរដ្ឋអាហ្វ្រិកកណ្ដាល' : '中非共和国') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Chad' : (app()->getLocale() === 'kh' ? 'ឆាដ' : '乍得') }}">
                            {{ app()->getLocale() === 'en' ? 'Chad' : (app()->getLocale() === 'kh' ? 'ឆាដ' : '乍得') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Chile' : (app()->getLocale() === 'kh' ? 'ច៊ីលី' : '智利') }}">
                            {{ app()->getLocale() === 'en' ? 'Chile' : (app()->getLocale() === 'kh' ? 'ច៊ីលី' : '智利') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'China' : (app()->getLocale() === 'kh' ? 'ចិន' : '中国') }}">
                            {{ app()->getLocale() === 'en' ? 'China' : (app()->getLocale() === 'kh' ? 'ចិន' : '中国') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Colombia' : (app()->getLocale() === 'kh' ? 'កូឡុំប៊ី' : '哥伦比亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Colombia' : (app()->getLocale() === 'kh' ? 'កូឡុំប៊ី' : '哥伦比亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Comoros' : (app()->getLocale() === 'kh' ? 'កូមូរ៉ូស' : '科摩罗') }}">
                            {{ app()->getLocale() === 'en' ? 'Comoros' : (app()->getLocale() === 'kh' ? 'កូមូរ៉ូស' : '科摩罗') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Congo' : (app()->getLocale() === 'kh' ? 'កុងហ្គោ' : '刚果') }}">
                            {{ app()->getLocale() === 'en' ? 'Congo' : (app()->getLocale() === 'kh' ? 'កុងហ្គោ' : '刚果') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Costa Rica' : (app()->getLocale() === 'kh' ? 'កូស្តារីកា' : '哥斯达黎加') }}">
                            {{ app()->getLocale() === 'en' ? 'Costa Rica' : (app()->getLocale() === 'kh' ? 'កូស្តារីកា' : '哥斯达黎加') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Croatia' : (app()->getLocale() === 'kh' ? 'ក្រូអាត៊ី' : '克罗地亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Croatia' : (app()->getLocale() === 'kh' ? 'ក្រូអាត៊ី' : '克罗地亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Cuba' : (app()->getLocale() === 'kh' ? 'គុយបា' : '古巴') }}">
                            {{ app()->getLocale() === 'en' ? 'Cuba' : (app()->getLocale() === 'kh' ? 'គុយបា' : '古巴') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Cyprus' : (app()->getLocale() === 'kh' ? 'ស៊ីប្រុយស' : '塞浦路斯') }}">
                            {{ app()->getLocale() === 'en' ? 'Cyprus' : (app()->getLocale() === 'kh' ? 'ស៊ីប្រុយស' : '塞浦路斯') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Czech Republic' : (app()->getLocale() === 'kh' ? 'សាធារណរដ្ឋឆេស្គី' : '捷克共和国') }}">
                            {{ app()->getLocale() === 'en' ? 'Czech Republic' : (app()->getLocale() === 'kh' ? 'សាធារណរដ្ឋឆេស្គី' : '捷克共和国') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Denmark' : (app()->getLocale() === 'kh' ? 'ដាណឺម៉ាក' : '丹麦') }}">
                            {{ app()->getLocale() === 'en' ? 'Denmark' : (app()->getLocale() === 'kh' ? 'ដាណឺម៉ាក' : '丹麦') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Djibouti' : (app()->getLocale() === 'kh' ? 'ជីប៊ូទី' : '吉布提') }}">
                            {{ app()->getLocale() === 'en' ? 'Djibouti' : (app()->getLocale() === 'kh' ? 'ជីប៊ូទី' : '吉布提') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Dominica' : (app()->getLocale() === 'kh' ? 'ដូមីនីកា' : '多米尼克') }}">
                            {{ app()->getLocale() === 'en' ? 'Dominica' : (app()->getLocale() === 'kh' ? 'ដូមីនីកា' : '多米尼克') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Dominican Republic' : (app()->getLocale() === 'kh' ? 'សាធារណរដ្ឋដូមីនីក' : '多米尼加共和国') }}">
                            {{ app()->getLocale() === 'en' ? 'Dominican Republic' : (app()->getLocale() === 'kh' ? 'សាធារណរដ្ឋដូមីនីក' : '多米尼加共和国') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Ecuador' : (app()->getLocale() === 'kh' ? 'អេក្វាឌ័រ' : '厄瓜多尔') }}">
                            {{ app()->getLocale() === 'en' ? 'Ecuador' : (app()->getLocale() === 'kh' ? 'អេក្វាឌ័រ' : '厄瓜多尔') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Egypt' : (app()->getLocale() === 'kh' ? 'អេហ្ស៊ីប' : '埃及') }}">
                            {{ app()->getLocale() === 'en' ? 'Egypt' : (app()->getLocale() === 'kh' ? 'អេហ្ស៊ីប' : '埃及') }}
                        </option>

                        <option
                            value="{{ app()->getLocale() === 'en' ? 'El Salvador' : (app()->getLocale() === 'kh' ? 'អែលសាល់វាឌ័រ' : '萨尔瓦多') }}">
                            {{ app()->getLocale() === 'en' ? 'El Salvador' : (app()->getLocale() === 'kh' ? 'អែលសាល់វាឌ័រ' : '萨尔瓦多') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Equatorial Guinea' : (app()->getLocale() === 'kh' ? 'ហ្គីនេអេក្វាតូរ៉្យាល់' : '赤道几内亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Equatorial Guinea' : (app()->getLocale() === 'kh' ? 'ហ្គីនេអេក្វាតូរ៉្យាល់' : '赤道几内亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Eritrea' : (app()->getLocale() === 'kh' ? 'អេរីត្រេ' : '厄立特里亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Eritrea' : (app()->getLocale() === 'kh' ? 'អេរីត្រេ' : '厄立特里亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Estonia' : (app()->getLocale() === 'kh' ? 'អេស្តូនី' : '爱沙尼亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Estonia' : (app()->getLocale() === 'kh' ? 'អេស្តូនី' : '爱沙尼亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Ethiopia' : (app()->getLocale() === 'kh' ? 'អេធីយូពី' : '埃塞俄比亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Ethiopia' : (app()->getLocale() === 'kh' ? 'អេធីយូពី' : '埃塞俄比亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Fiji' : (app()->getLocale() === 'kh' ? 'ហ្វីជី' : '斐济') }}">
                            {{ app()->getLocale() === 'en' ? 'Fiji' : (app()->getLocale() === 'kh' ? 'ហ្វីជី' : '斐济') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Finland' : (app()->getLocale() === 'kh' ? 'ហ្វីនឡង់' : '芬兰') }}">
                            {{ app()->getLocale() === 'en' ? 'Finland' : (app()->getLocale() === 'kh' ? 'ហ្វីនឡង់' : '芬兰') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'France' : (app()->getLocale() === 'kh' ? 'ប្រទេសបារាំង' : '法国') }}">
                            {{ app()->getLocale() === 'en' ? 'France' : (app()->getLocale() === 'kh' ? 'ប្រទេសបារាំង' : '法国') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Gabon' : (app()->getLocale() === 'kh' ? 'ហ្គាបុង' : '加蓬') }}">
                            {{ app()->getLocale() === 'en' ? 'Gabon' : (app()->getLocale() === 'kh' ? 'ហ្គាបុង' : '加蓬') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Gambia' : (app()->getLocale() === 'kh' ? 'ហ្គំប៊ី' : '冈比亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Gambia' : (app()->getLocale() === 'kh' ? 'ហ្គំប៊ី' : '冈比亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Georgia' : (app()->getLocale() === 'kh' ? 'ហ្សក័ជី' : '格鲁吉亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Georgia' : (app()->getLocale() === 'kh' ? 'ហ្សក័ជី' : '格鲁吉亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Germany' : (app()->getLocale() === 'kh' ? 'អាល្លឺម៉ង់' : '德国') }}">
                            {{ app()->getLocale() === 'en' ? 'Germany' : (app()->getLocale() === 'kh' ? 'អាល្លឺម៉ង់' : '德国') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Ghana' : (app()->getLocale() === 'kh' ? 'ហ្គាណា' : '加纳') }}">
                            {{ app()->getLocale() === 'en' ? 'Ghana' : (app()->getLocale() === 'kh' ? 'ហ្គាណា' : '加纳') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Greece' : (app()->getLocale() === 'kh' ? 'ក្រិច' : '希腊') }}">
                            {{ app()->getLocale() === 'en' ? 'Greece' : (app()->getLocale() === 'kh' ? 'ក្រិច' : '希腊') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Grenada' : (app()->getLocale() === 'kh' ? 'ក្រនាដា' : '格林纳达') }}">
                            {{ app()->getLocale() === 'en' ? 'Grenada' : (app()->getLocale() === 'kh' ? 'ក្រនាដា' : '格林纳达') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Guatemala' : (app()->getLocale() === 'kh' ? 'ហ្គាតេម៉ឡា' : '危地马拉') }}">
                            {{ app()->getLocale() === 'en' ? 'Guatemala' : (app()->getLocale() === 'kh' ? 'ហ្គាតេម៉ឡា' : '危地马拉') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Guinea' : (app()->getLocale() === 'kh' ? 'ហ្គីណេ' : '几内亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Guinea' : (app()->getLocale() === 'kh' ? 'ហ្គីណេ' : '几内亚') }}
                        </option>

                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Guinea-Bissau' : (app()->getLocale() === 'kh' ? 'ហ្គីណេ-ប៊ីសាវ' : '几内亚比绍') }}">
                            {{ app()->getLocale() === 'en' ? 'Guinea-Bissau' : (app()->getLocale() === 'kh' ? 'ហ្គីណេ-ប៊ីសាវ' : '几内亚比绍') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Guyana' : (app()->getLocale() === 'kh' ? 'ហ្គីយាណា' : '圭亚那') }}">
                            {{ app()->getLocale() === 'en' ? 'Guyana' : (app()->getLocale() === 'kh' ? 'ហ្គីយាណា' : '圭亚那') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Haiti' : (app()->getLocale() === 'kh' ? 'ហៃទី' : '海地') }}">
                            {{ app()->getLocale() === 'en' ? 'Haiti' : (app()->getLocale() === 'kh' ? 'ហៃទី' : '海地') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Honduras' : (app()->getLocale() === 'kh' ? 'ហុងឌូរ៉ាស' : '洪都拉斯') }}">
                            {{ app()->getLocale() === 'en' ? 'Honduras' : (app()->getLocale() === 'kh' ? 'ហុងឌូរ៉ាស' : '洪都拉斯') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Hungary' : (app()->getLocale() === 'kh' ? 'ហុងគ្រី' : '匈牙利') }}">
                            {{ app()->getLocale() === 'en' ? 'Hungary' : (app()->getLocale() === 'kh' ? 'ហុងគ្រី' : '匈牙利') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Iceland' : (app()->getLocale() === 'kh' ? 'អ៊ីស្លង់' : '冰岛') }}">
                            {{ app()->getLocale() === 'en' ? 'Iceland' : (app()->getLocale() === 'kh' ? 'អ៊ីស្លង់' : '冰岛') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'India' : (app()->getLocale() === 'kh' ? 'ឥណ្ឌា' : '印度') }}">
                            {{ app()->getLocale() === 'en' ? 'India' : (app()->getLocale() === 'kh' ? 'ឥណ្ឌា' : '印度') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Indonesia' : (app()->getLocale() === 'kh' ? 'ឥណ្ឌូនេស៊ី' : '印度尼西亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Indonesia' : (app()->getLocale() === 'kh' ? 'ឥណ្ឌូនេស៊ី' : '印度尼西亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Iran' : (app()->getLocale() === 'kh' ? 'អ៊ីរ៉ាន' : '伊朗') }}">
                            {{ app()->getLocale() === 'en' ? 'Iran' : (app()->getLocale() === 'kh' ? 'អ៊ីរ៉ាន' : '伊朗') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Iraq' : (app()->getLocale() === 'kh' ? 'អ៊ីរ៉ាក់' : '伊拉克') }}">
                            {{ app()->getLocale() === 'en' ? 'Iraq' : (app()->getLocale() === 'kh' ? 'អ៊ីរ៉ាក់' : '伊拉克') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Ireland' : (app()->getLocale() === 'kh' ? 'អៀរឡង់' : '爱尔兰') }}">
                            {{ app()->getLocale() === 'en' ? 'Ireland' : (app()->getLocale() === 'kh' ? 'អៀរឡង់' : '爱尔兰') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Israel' : (app()->getLocale() === 'kh' ? 'អ៊ីស្រាអែល' : '以色列') }}">
                            {{ app()->getLocale() === 'en' ? 'Israel' : (app()->getLocale() === 'kh' ? 'អ៊ីស្រាអែល' : '以色列') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Italy' : (app()->getLocale() === 'kh' ? 'អ៊ីតាលី' : '意大利') }}">
                            {{ app()->getLocale() === 'en' ? 'Italy' : (app()->getLocale() === 'kh' ? 'អ៊ីតាលី' : '意大利') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Jamaica' : (app()->getLocale() === 'kh' ? 'ចាម៉ៃកា' : '牙买加') }}">
                            {{ app()->getLocale() === 'en' ? 'Jamaica' : (app()->getLocale() === 'kh' ? 'ចាម៉ៃកា' : '牙买加') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Japan' : (app()->getLocale() === 'kh' ? 'ជប៉ុន' : '日本') }}">
                            {{ app()->getLocale() === 'en' ? 'Japan' : (app()->getLocale() === 'kh' ? 'ជប៉ុន' : '日本') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Jordan' : (app()->getLocale() === 'kh' ? 'ជូដង់' : '约旦') }}">
                            {{ app()->getLocale() === 'en' ? 'Jordan' : (app()->getLocale() === 'kh' ? 'ជូដង់' : '约旦') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Kazakhstan' : (app()->getLocale() === 'kh' ? 'កាហ្សាក់ស្ថាន' : '哈萨克斯坦') }}">
                            {{ app()->getLocale() === 'en' ? 'Kazakhstan' : (app()->getLocale() === 'kh' ? 'កាហ្សាក់ស្ថាន' : '哈萨克斯坦') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Kenya' : (app()->getLocale() === 'kh' ? 'កេនយ៉ា' : '肯尼亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Kenya' : (app()->getLocale() === 'kh' ? 'កេនយ៉ា' : '肯尼亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Kiribati' : (app()->getLocale() === 'kh' ? 'គីរីបាទី' : '基里巴斯') }}">
                            {{ app()->getLocale() === 'en' ? 'Kiribati' : (app()->getLocale() === 'kh' ? 'គីរីបាទី' : '基里巴斯') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'North Korea' : (app()->getLocale() === 'kh' ? 'កូរ៉េខាងជើង' : '朝鲜') }}">
                            {{ app()->getLocale() === 'en' ? 'North Korea' : (app()->getLocale() === 'kh' ? 'កូរ៉េខាងជើង' : '朝鲜') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'South Korea' : (app()->getLocale() === 'kh' ? 'កូរ៉េខាងត្បូង' : '韩国') }}">
                            {{ app()->getLocale() === 'en' ? 'South Korea' : (app()->getLocale() === 'kh' ? 'កូរ៉េខាងត្បូង' : '韩国') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Kuwait' : (app()->getLocale() === 'kh' ? 'គុយវ៉េត' : '科威特') }}">
                            {{ app()->getLocale() === 'en' ? 'Kuwait' : (app()->getLocale() === 'kh' ? 'គុយវ៉េត' : '科威特') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Kyrgyzstan' : (app()->getLocale() === 'kh' ? 'គឺហ្ស៊ីស្ថាន' : '吉尔吉斯斯坦') }}">
                            {{ app()->getLocale() === 'en' ? 'Kyrgyzstan' : (app()->getLocale() === 'kh' ? 'គឺហ្ស៊ីស្ថាន' : '吉尔吉斯斯坦') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Laos' : (app()->getLocale() === 'kh' ? 'ឡាវ' : '老挝') }}">
                            {{ app()->getLocale() === 'en' ? 'Laos' : (app()->getLocale() === 'kh' ? 'ឡាវ' : '老挝') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Latvia' : (app()->getLocale() === 'kh' ? 'ឡាតវី' : '拉脱维亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Latvia' : (app()->getLocale() === 'kh' ? 'ឡាតវី' : '拉脱维亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Lebanon' : (app()->getLocale() === 'kh' ? 'លីបង់' : '黎巴嫩') }}">
                            {{ app()->getLocale() === 'en' ? 'Lebanon' : (app()->getLocale() === 'kh' ? 'លីបង់' : '黎巴嫩') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Lesotho' : (app()->getLocale() === 'kh' ? 'ឡេសុតូ' : '莱索托') }}">
                            {{ app()->getLocale() === 'en' ? 'Lesotho' : (app()->getLocale() === 'kh' ? 'ឡេសុតូ' : '莱索托') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Liberia' : (app()->getLocale() === 'kh' ? 'លីបេរៀ' : '利比里亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Liberia' : (app()->getLocale() === 'kh' ? 'លីបេរៀ' : '利比里亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Libya' : (app()->getLocale() === 'kh' ? 'លីប៊ី' : '利比亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Libya' : (app()->getLocale() === 'kh' ? 'លីប៊ី' : '利比亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Liechtenstein' : (app()->getLocale() === 'kh' ? 'លីចខិនស្ទេន' : '列支敦士登') }}">
                            {{ app()->getLocale() === 'en' ? 'Liechtenstein' : (app()->getLocale() === 'kh' ? 'លីចខិនស្ទេន' : '列支敦士登') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Lithuania' : (app()->getLocale() === 'kh' ? 'លីទុយអានី' : '立陶宛') }}">
                            {{ app()->getLocale() === 'en' ? 'Lithuania' : (app()->getLocale() === 'kh' ? 'លីទុយអានី' : '立陶宛') }}
                        </option>

                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Luxembourg' : (app()->getLocale() === 'kh' ? 'លុចសំបួរ' : '卢森堡') }}">
                            {{ app()->getLocale() === 'en' ? 'Luxembourg' : (app()->getLocale() === 'kh' ? 'លុចសំបួរ' : '卢森堡') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Madagascar' : (app()->getLocale() === 'kh' ? 'ម៉ាដាហ្គាស្កា' : '马达加斯加') }}">
                            {{ app()->getLocale() === 'en' ? 'Madagascar' : (app()->getLocale() === 'kh' ? 'ម៉ាដាហ្គាស្កា' : '马达加斯加') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Malawi' : (app()->getLocale() === 'kh' ? 'ម៉ាឡាវី' : '马拉维') }}">
                            {{ app()->getLocale() === 'en' ? 'Malawi' : (app()->getLocale() === 'kh' ? 'ម៉ាឡាវី' : '马拉维') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Malaysia' : (app()->getLocale() === 'kh' ? 'ម៉ាឡេស៊ី' : '马来西亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Malaysia' : (app()->getLocale() === 'kh' ? 'ម៉ាឡេស៊ី' : '马来西亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Maldives' : (app()->getLocale() === 'kh' ? 'ម៉ាល់ឌីវ' : '马尔代夫') }}">
                            {{ app()->getLocale() === 'en' ? 'Maldives' : (app()->getLocale() === 'kh' ? 'ម៉ាល់ឌីវ' : '马尔代夫') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Mali' : (app()->getLocale() === 'kh' ? 'ម៉ាលី' : '马里') }}">
                            {{ app()->getLocale() === 'en' ? 'Mali' : (app()->getLocale() === 'kh' ? 'ម៉ាលី' : '马里') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Malta' : (app()->getLocale() === 'kh' ? 'ម៉ាល់តា' : '马耳他') }}">
                            {{ app()->getLocale() === 'en' ? 'Malta' : (app()->getLocale() === 'kh' ? 'ម៉ាល់តា' : '马耳他') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Marshall Islands' : (app()->getLocale() === 'kh' ? 'កោះម៉ាស្សាល' : '马绍尔群岛') }}">
                            {{ app()->getLocale() === 'en' ? 'Marshall Islands' : (app()->getLocale() === 'kh' ? 'កោះម៉ាស្សាល' : '马绍尔群岛') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Mauritania' : (app()->getLocale() === 'kh' ? 'ម៉ូរីតានី' : '毛里塔尼亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Mauritania' : (app()->getLocale() === 'kh' ? 'ម៉ូរីតានី' : '毛里塔尼亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Mauritius' : (app()->getLocale() === 'kh' ? 'ម៉ូរីស្យុស' : '毛里求斯') }}">
                            {{ app()->getLocale() === 'en' ? 'Mauritius' : (app()->getLocale() === 'kh' ? 'ម៉ូរីស្យុស' : '毛里求斯') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Mexico' : (app()->getLocale() === 'kh' ? 'ម៉ិចស៊ិក' : '墨西哥') }}">
                            {{ app()->getLocale() === 'en' ? 'Mexico' : (app()->getLocale() === 'kh' ? 'ម៉ិចស៊ិក' : '墨西哥') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Micronesia' : (app()->getLocale() === 'kh' ? 'មីក្រូនេស៊ី' : '密克罗尼西亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Micronesia' : (app()->getLocale() === 'kh' ? 'មីក្រូនេស៊ី' : '密克罗尼西亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Moldova' : (app()->getLocale() === 'kh' ? 'ម៉ុលដាវ៉ា' : '摩尔多瓦') }}">
                            {{ app()->getLocale() === 'en' ? 'Moldova' : (app()->getLocale() === 'kh' ? 'ម៉ុលដាវ៉ា' : '摩尔多瓦') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Monaco' : (app()->getLocale() === 'kh' ? 'ម៉ូណាកូ' : '摩纳哥') }}">
                            {{ app()->getLocale() === 'en' ? 'Monaco' : (app()->getLocale() === 'kh' ? 'ម៉ូណាកូ' : '摩纳哥') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Mongolia' : (app()->getLocale() === 'kh' ? 'ម៉ុងហ្គោលី' : '蒙古') }}">
                            {{ app()->getLocale() === 'en' ? 'Mongolia' : (app()->getLocale() === 'kh' ? 'ម៉ុងហ្គោលី' : '蒙古') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Montenegro' : (app()->getLocale() === 'kh' ? 'ម៉ុងតេណេហ្គ្រូ' : '黑山') }}">
                            {{ app()->getLocale() === 'en' ? 'Montenegro' : (app()->getLocale() === 'kh' ? 'ម៉ុងតេណេហ្គ្រូ' : '黑山') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Morocco' : (app()->getLocale() === 'kh' ? 'ម៉ារ៉ុក' : '摩洛哥') }}">
                            {{ app()->getLocale() === 'en' ? 'Morocco' : (app()->getLocale() === 'kh' ? 'ម៉ារ៉ុក' : '摩洛哥') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Mozambique' : (app()->getLocale() === 'kh' ? 'ម៉ូហ្សាំប៊ិក' : '莫桑比克') }}">
                            {{ app()->getLocale() === 'en' ? 'Mozambique' : (app()->getLocale() === 'kh' ? 'ម៉ូហ្សាំប៊ិក' : '莫桑比克') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Myanmar' : (app()->getLocale() === 'kh' ? 'မြန်မာ' : '缅甸') }}">
                            {{ app()->getLocale() === 'en' ? 'Myanmar' : (app()->getLocale() === 'kh' ? 'မြန်မာ' : '缅甸') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Namibia' : (app()->getLocale() === 'kh' ? 'ណាមីប៊ី' : '纳米比亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Namibia' : (app()->getLocale() === 'kh' ? 'ណាមីប៊ី' : '纳米比亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Nauru' : (app()->getLocale() === 'kh' ? 'ណូរូ' : '瑙鲁') }}">
                            {{ app()->getLocale() === 'en' ? 'Nauru' : (app()->getLocale() === 'kh' ? 'ណូរូ' : '瑙鲁') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Nepal' : (app()->getLocale() === 'kh' ? 'នេបាល់' : '尼泊尔') }}">
                            {{ app()->getLocale() === 'en' ? 'Nepal' : (app()->getLocale() === 'kh' ? 'នេបាល់' : '尼泊尔') }}
                        </option>

                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Netherlands' : (app()->getLocale() === 'kh' ? 'នេឌឺឡង់' : '荷兰') }}">
                            {{ app()->getLocale() === 'en' ? 'Netherlands' : (app()->getLocale() === 'kh' ? 'នេឌឺឡង់' : '荷兰') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'New Zealand' : (app()->getLocale() === 'kh' ? 'នូវែលហ្សេឡង់' : '新西兰') }}">
                            {{ app()->getLocale() === 'en' ? 'New Zealand' : (app()->getLocale() === 'kh' ? 'នូវែលហ្សេឡង់' : '新西兰') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Nicaragua' : (app()->getLocale() === 'kh' ? 'នីការ៉ាហ្គោ' : '尼加拉瓜') }}">
                            {{ app()->getLocale() === 'en' ? 'Nicaragua' : (app()->getLocale() === 'kh' ? 'នីការ៉ាហ្គោ' : '尼加拉瓜') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Niger' : (app()->getLocale() === 'kh' ? 'នីហ្ស៊ែ' : '尼日尔') }}">
                            {{ app()->getLocale() === 'en' ? 'Niger' : (app()->getLocale() === 'kh' ? 'នីហ្ស៊ែ' : '尼日尔') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Nigeria' : (app()->getLocale() === 'kh' ? 'នីហ្សេរីយ៉ា' : '尼日利亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Nigeria' : (app()->getLocale() === 'kh' ? 'នីហ្សេរីយ៉ា' : '尼日利亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Norway' : (app()->getLocale() === 'kh' ? 'ន័រវែ' : '挪威') }}">
                            {{ app()->getLocale() === 'en' ? 'Norway' : (app()->getLocale() === 'kh' ? 'ន័រវែ' : '挪威') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Oman' : (app()->getLocale() === 'kh' ? 'អូម៉ាន' : '阿曼') }}">
                            {{ app()->getLocale() === 'en' ? 'Oman' : (app()->getLocale() === 'kh' ? 'អូម៉ាន' : '阿曼') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Pakistan' : (app()->getLocale() === 'kh' ? 'ប៉ាគីស្ថាន' : '巴基斯坦') }}">
                            {{ app()->getLocale() === 'en' ? 'Pakistan' : (app()->getLocale() === 'kh' ? 'ប៉ាគីស្ថាន' : '巴基斯坦') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Palau' : (app()->getLocale() === 'kh' ? 'ប៉ាឡូ' : '帕劳') }}">
                            {{ app()->getLocale() === 'en' ? 'Palau' : (app()->getLocale() === 'kh' ? 'ប៉ាឡូ' : '帕劳') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Panama' : (app()->getLocale() === 'kh' ? 'ប៉ាណាម៉ា' : '巴拿马') }}">
                            {{ app()->getLocale() === 'en' ? 'Panama' : (app()->getLocale() === 'kh' ? 'ប៉ាណាម៉ា' : '巴拿马') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Papua New Guinea' : (app()->getLocale() === 'kh' ? 'ប៉ាពួយ៉ា នូវហ្គីណេ' : '巴布亚新几内亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Papua New Guinea' : (app()->getLocale() === 'kh' ? 'ប៉ាពួយ៉ា នូវហ្គីណេ' : '巴布亚新几内亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Paraguay' : (app()->getLocale() === 'kh' ? 'ប៉ារ៉ាហ្គាយ' : '巴拉圭') }}">
                            {{ app()->getLocale() === 'en' ? 'Paraguay' : (app()->getLocale() === 'kh' ? 'ប៉ារ៉ាហ្គាយ' : '巴拉圭') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Peru' : (app()->getLocale() === 'kh' ? 'ប៉េរូ' : '秘鲁') }}">
                            {{ app()->getLocale() === 'en' ? 'Peru' : (app()->getLocale() === 'kh' ? 'ប៉េរូ' : '秘鲁') }}
                        </option>

                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Philippines' : (app()->getLocale() === 'kh' ? 'ហ្វីលីពីន' : '菲律宾') }}">
                            {{ app()->getLocale() === 'en' ? 'Philippines' : (app()->getLocale() === 'kh' ? 'ហ្វីលីពីន' : '菲律宾') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Poland' : (app()->getLocale() === 'kh' ? 'ប៉ូឡូញ' : '波兰') }}">
                            {{ app()->getLocale() === 'en' ? 'Poland' : (app()->getLocale() === 'kh' ? 'ប៉ូឡូញ' : '波兰') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Portugal' : (app()->getLocale() === 'kh' ? 'ប៉ូរទុយហ្កាល់' : '葡萄牙') }}">
                            {{ app()->getLocale() === 'en' ? 'Portugal' : (app()->getLocale() === 'kh' ? 'ប៉ូរទុយហ្កាល់' : '葡萄牙') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Qatar' : (app()->getLocale() === 'kh' ? 'កាតា' : '卡塔尔') }}">
                            {{ app()->getLocale() === 'en' ? 'Qatar' : (app()->getLocale() === 'kh' ? 'កាតា' : '卡塔尔') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Romania' : (app()->getLocale() === 'kh' ? 'រ៉ូមានី' : '罗马尼亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Romania' : (app()->getLocale() === 'kh' ? 'រ៉ូមានី' : '罗马尼亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Russia' : (app()->getLocale() === 'kh' ? 'រុស្ស៊ី' : '俄罗斯') }}">
                            {{ app()->getLocale() === 'en' ? 'Russia' : (app()->getLocale() === 'kh' ? 'រុស្ស៊ី' : '俄罗斯') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Rwanda' : (app()->getLocale() === 'kh' ? 'រវង់ដា' : '卢旺达') }}">
                            {{ app()->getLocale() === 'en' ? 'Rwanda' : (app()->getLocale() === 'kh' ? 'រវង់ដា' : '卢旺达') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Saint Kitts and Nevis' : (app()->getLocale() === 'kh' ? 'សង់គីត និង នីវីស' : '圣基茨和尼维斯') }}">
                            {{ app()->getLocale() === 'en' ? 'Saint Kitts and Nevis' : (app()->getLocale() === 'kh' ? 'សង់គីត និង នីវីស' : '圣基茨和尼维斯') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Saint Lucia' : (app()->getLocale() === 'kh' ? 'សង់លូស៊ី' : '圣卢西亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Saint Lucia' : (app()->getLocale() === 'kh' ? 'សង់លូស៊ី' : '圣卢西亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Saint Vincent and the Grenadines' : (app()->getLocale() === 'kh' ? 'សង់វីនសង់ និង ហ្គ្រេណាឌីន' : '圣文森特和格林纳丁斯') }}">
                            {{ app()->getLocale() === 'en' ? 'Saint Vincent and the Grenadines' : (app()->getLocale() === 'kh' ? 'សង់វីនសង់ និង ហ្គ្រេណាឌីន' : '圣文森特和格林纳丁斯') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Samoa' : (app()->getLocale() === 'kh' ? 'សាម៉ូអា' : '萨摩亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Samoa' : (app()->getLocale() === 'kh' ? 'សាម៉ូអា' : '萨摩亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'San Marino' : (app()->getLocale() === 'kh' ? 'សង់ម៉ារីណូ' : '圣马力诺') }}">
                            {{ app()->getLocale() === 'en' ? 'San Marino' : (app()->getLocale() === 'kh' ? 'សង់ម៉ារីណូ' : '圣马力诺') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Sao Tome and Principe' : (app()->getLocale() === 'kh' ? 'សៅតូម និង ព្រីនស៊ីប' : '圣多美和普林西比') }}">
                            {{ app()->getLocale() === 'en' ? 'Sao Tome and Principe' : (app()->getLocale() === 'kh' ? 'សៅតូម និង ព្រីនស៊ីប' : '圣多美和普林西比') }}
                        </option>

                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Saudi Arabia' : (app()->getLocale() === 'kh' ? 'សាអូឌី អារ៉ាប៊ី' : '沙特阿拉伯') }}">
                            {{ app()->getLocale() === 'en' ? 'Saudi Arabia' : (app()->getLocale() === 'kh' ? 'សាអូឌី អារ៉ាប៊ី' : '沙特阿拉伯') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Senegal' : (app()->getLocale() === 'kh' ? 'សេណេហ្កាល់' : '塞内加尔') }}">
                            {{ app()->getLocale() === 'en' ? 'Senegal' : (app()->getLocale() === 'kh' ? 'សេណេហ្កាល់' : '塞内加尔') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Serbia' : (app()->getLocale() === 'kh' ? 'ស៊ែប៊ី' : '塞尔维亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Serbia' : (app()->getLocale() === 'kh' ? 'ស៊ែប៊ី' : '塞尔维亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Seychelles' : (app()->getLocale() === 'kh' ? 'សេស៊ីល' : '塞舌尔') }}">
                            {{ app()->getLocale() === 'en' ? 'Seychelles' : (app()->getLocale() === 'kh' ? 'សេស៊ីល' : '塞舌尔') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Sierra Leone' : (app()->getLocale() === 'kh' ? 'សៀរ៉ា លីអូន' : '塞拉利昂') }}">
                            {{ app()->getLocale() === 'en' ? 'Sierra Leone' : (app()->getLocale() === 'kh' ? 'សៀរ៉ា លីអូន' : '塞拉利昂') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Singapore' : (app()->getLocale() === 'kh' ? 'សិង្ហបុរី' : '新加坡') }}">
                            {{ app()->getLocale() === 'en' ? 'Singapore' : (app()->getLocale() === 'kh' ? 'សិង្ហបុរី' : '新加坡') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Slovakia' : (app()->getLocale() === 'kh' ? 'ស្លូវ៉ាគី' : '斯洛伐克') }}">
                            {{ app()->getLocale() === 'en' ? 'Slovakia' : (app()->getLocale() === 'kh' ? 'ស្លូវ៉ាគី' : '斯洛伐克') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Slovenia' : (app()->getLocale() === 'kh' ? 'ស្លូវេនី' : '斯洛文尼亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Slovenia' : (app()->getLocale() === 'kh' ? 'ស្លូវេនី' : '斯洛文尼亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Solomon Islands' : (app()->getLocale() === 'kh' ? 'កោះសូឡូម៉ុន' : '所罗门群岛') }}">
                            {{ app()->getLocale() === 'en' ? 'Solomon Islands' : (app()->getLocale() === 'kh' ? 'កោះសូឡូម៉ុន' : '所罗门群岛') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Somalia' : (app()->getLocale() === 'kh' ? 'សូមាលី' : '索马里') }}">
                            {{ app()->getLocale() === 'en' ? 'Somalia' : (app()->getLocale() === 'kh' ? 'សូមាលី' : '索马里') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'South Africa' : (app()->getLocale() === 'kh' ? 'អាហ្វ្រិកខាងត្បូង' : '南非') }}">
                            {{ app()->getLocale() === 'en' ? 'South Africa' : (app()->getLocale() === 'kh' ? 'អាហ្វ្រិកខាងត្បូង' : '南非') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Spain' : (app()->getLocale() === 'kh' ? 'អេស្ប៉ាញ' : '西班牙') }}">
                            {{ app()->getLocale() === 'en' ? 'Spain' : (app()->getLocale() === 'kh' ? 'អេស្ប៉ាញ' : '西班牙') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Sri Lanka' : (app()->getLocale() === 'kh' ? 'ស្រីលង្កា' : '斯里兰卡') }}">
                            {{ app()->getLocale() === 'en' ? 'Sri Lanka' : (app()->getLocale() === 'kh' ? 'ស្រីលង្កា' : '斯里兰卡') }}
                        </option>

                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Sudan' : (app()->getLocale() === 'kh' ? 'ស៊ូដង់' : '苏丹') }}">
                            {{ app()->getLocale() === 'en' ? 'Sudan' : (app()->getLocale() === 'kh' ? 'ស៊ូដង់' : '苏丹') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Suriname' : (app()->getLocale() === 'kh' ? 'ស៊ូរីណាម' : '苏里南') }}">
                            {{ app()->getLocale() === 'en' ? 'Suriname' : (app()->getLocale() === 'kh' ? 'ស៊ូរីណាម' : '苏里南') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Swaziland' : (app()->getLocale() === 'kh' ? 'ស្វាស៊ីឡង់' : '斯威士兰') }}">
                            {{ app()->getLocale() === 'en' ? 'Swaziland' : (app()->getLocale() === 'kh' ? 'ស្វាស៊ីឡង់' : '斯威士兰') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Sweden' : (app()->getLocale() === 'kh' ? 'ស៊ុយអែត' : '瑞典') }}">
                            {{ app()->getLocale() === 'en' ? 'Sweden' : (app()->getLocale() === 'kh' ? 'ស៊ុយអែត' : '瑞典') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Switzerland' : (app()->getLocale() === 'kh' ? 'ស៊្វីស' : '瑞士') }}">
                            {{ app()->getLocale() === 'en' ? 'Switzerland' : (app()->getLocale() === 'kh' ? 'ស៊្វីស' : '瑞士') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Syria' : (app()->getLocale() === 'kh' ? 'ស៊ីរី' : '叙利亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Syria' : (app()->getLocale() === 'kh' ? 'ស៊ីរី' : '叙利亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Taiwan' : (app()->getLocale() === 'kh' ? 'តៃវ៉ាន់' : '台湾') }}">
                            {{ app()->getLocale() === 'en' ? 'Taiwan' : (app()->getLocale() === 'kh' ? 'តៃវ៉ាន់' : '台湾') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Tajikistan' : (app()->getLocale() === 'kh' ? 'តាហ្សីគីស្ថាន' : '塔吉克斯坦') }}">
                            {{ app()->getLocale() === 'en' ? 'Tajikistan' : (app()->getLocale() === 'kh' ? 'តាហ្សីគីស្ថាន' : '塔吉克斯坦') }}
                        </option>

                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Tanzania' : (app()->getLocale() === 'kh' ? 'តង់សាន៊ី' : '坦桑尼亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Tanzania' : (app()->getLocale() === 'kh' ? 'តង់សាន៊ី' : '坦桑尼亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Thailand' : (app()->getLocale() === 'kh' ? 'ថៃ' : '泰国') }}">
                            {{ app()->getLocale() === 'en' ? 'Thailand' : (app()->getLocale() === 'kh' ? 'ថៃ' : '泰国') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Togo' : (app()->getLocale() === 'kh' ? 'តូហ្គោ' : '多哥') }}">
                            {{ app()->getLocale() === 'en' ? 'Togo' : (app()->getLocale() === 'kh' ? 'តូហ្គោ' : '多哥') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Tonga' : (app()->getLocale() === 'kh' ? 'តុងហ្គា' : '汤加') }}">
                            {{ app()->getLocale() === 'en' ? 'Tonga' : (app()->getLocale() === 'kh' ? 'តុងហ្គា' : '汤加') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Trinidad and Tobago' : (app()->getLocale() === 'kh' ? 'ត្រីនីដាដ និង តូបាហ្គោ' : '特立尼达和多巴哥') }}">
                            {{ app()->getLocale() === 'en' ? 'Trinidad and Tobago' : (app()->getLocale() === 'kh' ? 'ត្រីនីដាដ និង តូបាហ្គោ' : '特立尼达和多巴哥') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Tunisia' : (app()->getLocale() === 'kh' ? 'ទុយនេស៊ី' : '突尼斯') }}">
                            {{ app()->getLocale() === 'en' ? 'Tunisia' : (app()->getLocale() === 'kh' ? 'ទុយនេស៊ី' : '突尼斯') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Turkey' : (app()->getLocale() === 'kh' ? 'តួគី' : '土耳其') }}">
                            {{ app()->getLocale() === 'en' ? 'Turkey' : (app()->getLocale() === 'kh' ? 'តួគី' : '土耳其') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Turkmenistan' : (app()->getLocale() === 'kh' ? 'ទួកម៉េនីស្ថាន' : '土库曼斯坦') }}">
                            {{ app()->getLocale() === 'en' ? 'Turkmenistan' : (app()->getLocale() === 'kh' ? 'ទួកម៉េនីស្ថាន' : '土库曼斯坦') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Tuvalu' : (app()->getLocale() === 'kh' ? 'តូវ៉ាលូ' : '图瓦卢') }}">
                            {{ app()->getLocale() === 'en' ? 'Tuvalu' : (app()->getLocale() === 'kh' ? 'តូវ៉ាលូ' : '图瓦卢') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Uganda' : (app()->getLocale() === 'kh' ? 'អ៊ូហ្គង់ដា' : '乌干达') }}">
                            {{ app()->getLocale() === 'en' ? 'Uganda' : (app()->getLocale() === 'kh' ? 'អ៊ូហ្គង់ដា' : '乌干达') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Ukraine' : (app()->getLocale() === 'kh' ? 'អ៊ុយក្រែន' : '乌克兰') }}">
                            {{ app()->getLocale() === 'en' ? 'Ukraine' : (app()->getLocale() === 'kh' ? 'អ៊ុយក្រែន' : '乌克兰') }}
                        </option>

                        <option
                            value="{{ app()->getLocale() === 'en' ? 'United Arab Emirates' : (app()->getLocale() === 'kh' ? 'សហគមន៍អារ៉ាប់រួម' : '阿拉伯联合酋长国') }}">
                            {{ app()->getLocale() === 'en' ? 'United Arab Emirates' : (app()->getLocale() === 'kh' ? 'សហគមន៍អារ៉ាប់រួម' : '阿拉伯联合酋长国') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'United Kingdom' : (app()->getLocale() === 'kh' ? 'ចក្រភពអងគ្លេស' : '英国') }}">
                            {{ app()->getLocale() === 'en' ? 'United Kingdom' : (app()->getLocale() === 'kh' ? 'ចក្រភពអងគ្លេស' : '英国') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'USA' : (app()->getLocale() === 'kh' ? 'សហរដ្ឋអាមេរិក' : '美国') }}">
                            {{ app()->getLocale() === 'en' ? 'USA' : (app()->getLocale() === 'kh' ? 'សហរដ្ឋអាមេរិក' : '美国') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Uruguay' : (app()->getLocale() === 'kh' ? 'អ៊ូរូហ្គាយ' : '乌拉圭') }}">
                            {{ app()->getLocale() === 'en' ? 'Uruguay' : (app()->getLocale() === 'kh' ? 'អ៊ូរូហ្គាយ' : '乌拉圭') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Uzbekistan' : (app()->getLocale() === 'kh' ? 'អ៊ូស្សបេគីស្ថាន' : '乌兹别克斯坦') }}">
                            {{ app()->getLocale() === 'en' ? 'Uzbekistan' : (app()->getLocale() === 'kh' ? 'អ៊ូស្សបេគីស្ថាន' : '乌兹别克斯坦') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Vanuatu' : (app()->getLocale() === 'kh' ? 'វាណូអាតូ' : '瓦努阿图') }}">
                            {{ app()->getLocale() === 'en' ? 'Vanuatu' : (app()->getLocale() === 'kh' ? 'វាណូអាតូ' : '瓦努阿图') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Venezuela' : (app()->getLocale() === 'kh' ? 'វឺណេស៊េឡា' : '委内瑞拉') }}">
                            {{ app()->getLocale() === 'en' ? 'Venezuela' : (app()->getLocale() === 'kh' ? 'វឺណេស៊េឡា' : '委内瑞拉') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Vietnam' : (app()->getLocale() === 'kh' ? 'វៀតណាម' : '越南') }}">
                            {{ app()->getLocale() === 'en' ? 'Vietnam' : (app()->getLocale() === 'kh' ? 'វៀតណាម' : '越南') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Yemen' : (app()->getLocale() === 'kh' ? 'យេម៉ែន' : '也门') }}">
                            {{ app()->getLocale() === 'en' ? 'Yemen' : (app()->getLocale() === 'kh' ? 'យេម៉ិន' : '也门') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Zambia' : (app()->getLocale() === 'kh' ? 'ហ្សាំប៊ា' : '赞比亚') }}">
                            {{ app()->getLocale() === 'en' ? 'Zambia' : (app()->getLocale() === 'kh' ? 'ហ្សាំប៊ា' : '赞比亚') }}
                        </option>
                        <option
                            value="{{ app()->getLocale() === 'en' ? 'Zimbabwe' : (app()->getLocale() === 'kh' ? 'ហ្ស៊ីមបាវ៉េ' : '津巴布韦') }}">
                            {{ app()->getLocale() === 'en' ? 'Zimbabwe' : (app()->getLocale() === 'kh' ? 'ហ្ស៊ីមបាវ៉េ' : '津巴布韦') }}
                        </option>

                    </datalist>
                    <span class="absolute right-6 top-1/2 -translate-y-1/2">
                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none">
                            <path
                                d="M10.5 4.60096C11.8333 5.37076 11.8333 7.29526 10.5 8.06506L3 12.3952C1.66666 13.165 0 12.2027 0 10.6631L0 2.00288C0 0.463276 1.66667 -0.498971 3 0.27083L10.5 4.60096Z"
                                fill="#03254B" />
                        </svg>
                    </span>
                    @error('country')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Budget -->
                <div class="relative">
                    <select name="budget_range" required
                        class="w-full h-14 px-6 pr-12 rounded-full bg-[#F1F1F1] text-[#03254B] outline-none appearance-none">
                        <option>
                            {{ app()->getLocale() === 'en'
                                ? 'Budget Range'
                                : (app()->getLocale() === 'kh'
                                    ? 'កញ្ចប់ថវិកា'
                                    : '预算范围') }}
                        </option>
                        <option value="Under $30,000">
                            {{ app()->getLocale() === 'en'
                                ? 'Under $30,000'
                                : (app()->getLocale() === 'kh'
                                    ? 'ក្រោម 30,000 ដុល្លារ'
                                    : 'Under $30,000') }}
                        </option>
                        <option value="$30,000–$50,000">
                            {{ app()->getLocale() === 'en'
                                ? '$30,000 – $50,000'
                                : (app()->getLocale() === 'kh'
                                    ? 'ចន្លោះ 30,000 ដុល្លារ  ដល់ 50,000 ដុល្លារ'
                                    : '$30,000 – $50,000') }}
                        </option>
                        <option value="Above $50,000">
                            {{ app()->getLocale() === 'en'
                                ? 'Above $50,000'
                                : (app()->getLocale() === 'kh'
                                    ? 'លើស 50,000 ដុល្លារ'
                                    : 'Above $50,000') }}
                        </option>
                    </select>
                    <span class="absolute right-6 top-1/2 -translate-y-1/2">
                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none">
                            <path
                                d="M10.5 4.60096C11.8333 5.37076 11.8333 7.29526 10.5 8.06506L3 12.3952C1.66666 13.165 0 12.2027 0 10.6631L0 2.00288C0 0.463276 1.66667 -0.498971 3 0.27083L10.5 4.60096Z"
                                fill="#03254B" />
                        </svg>
                    </span>
                    @error('budget_range')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <input type="text"
                    placeholder="{{ app()->getLocale() === 'en' ? 'Phone Number' : (app()->getLocale() === 'kh' ? 'លេខទូរសព្ទ' : '电话号码') }}"
                    name="phone" required
                    class="w-full h-14 px-6 rounded-full bg-[#F1F1F1] text-[#03254B] outline-none" />

                <!-- Preferred Location -->
                <div class="relative">
                    <select name="prefre_locate" required
                        class="w-full h-14 px-6 pr-12 rounded-full bg-[#F1F1F1] text-[#03254B] outline-none appearance-none">
                        <option>
                            {{ app()->getLocale() === 'en'
                                ? 'Preferred Location'
                                : (app()->getLocale() === 'kh'
                                    ? 'ទីតាំង'
                                    : '首选地点') }}
                        </option>
                        <option value="SiemReap">
                            {{ app()->getLocale() === 'en' ? 'Siem Reap' : (app()->getLocale() === 'kh' ? 'ខេត្តសៀមរាប' : '暹粒') }}
                        </option>
                        <option value="PhnomPenh">
                            {{ app()->getLocale() === 'en' ? 'Phnom Penh' : (app()->getLocale() === 'kh' ? 'ក្រុងភ្នំពេញ' : '金边') }}
                        </option>
                        <option value="SihanoukVille">
                            {{ app()->getLocale() === 'en'
                                ? 'Sihanouk Ville'
                                : (app()->getLocale() === 'kh'
                                    ? 'ក្រុងព្រះសីហនុ'
                                    : '西哈努克城') }}
                        </option>
                        <option value="PoiPet">
                            {{ app()->getLocale() === 'en' ? 'Poi Pet' : (app()->getLocale() === 'kh' ? 'ក្រុងប៉ោយប៉ែត' : '波伊·佩特') }}
                        </option>
                        {{-- <option value="KompongCham">Kompong Cham</option> --}}
                    </select>
                    <span class="absolute right-6 top-1/2 -translate-y-1/2">
                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none">
                            <path
                                d="M10.5 4.60096C11.8333 5.37076 11.8333 7.29526 10.5 8.06506L3 12.3952C1.66666 13.165 0 12.2027 0 10.6631L0 2.00288C0 0.463276 1.66667 -0.498971 3 0.27083L10.5 4.60096Z"
                                fill="#03254B" />
                        </svg>
                    </span>
                    @error('prefre_locate')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <input type="email"
                    placeholder="{{ app()->getLocale() === 'en' ? 'Email' : (app()->getLocale() === 'kh' ? 'អ៊ីម៉ែល' : '电子邮件') }}"
                    name="email" required
                    class="w-full h-14 px-6 rounded-full bg-[#F1F1F1] text-[#03254B] outline-none" />

                <!-- Planning -->
                <div class="relative">
                    <select name="plannig_buy" required
                        class="w-full h-14 px-6 pr-12 rounded-full bg-[#F1F1F1] text-[#03254B] outline-none appearance-none">
                        <option>
                            {{ app()->getLocale() === 'en'
                                ? 'When are you planning to buy?'
                                : (app()->getLocale() === 'kh'
                                    ? 'តើអ្នកសម្រេចចិត្តទិញនៅពេលណា'
                                    : '你打算什么时候购买呢？') }}
                        </option>
                        <option value="1–3months">
                            {{ app()->getLocale() === 'en'
                                ? '1–3 months'
                                : (app()->getLocale() === 'kh'
                                    ? 'ក្នុងរយៈពេល 1 ទៅ 3 ខែ'
                                    : '1 - 3 个月') }}
                        </option>
                        <option value="3–6months">
                            {{ app()->getLocale() === 'en'
                                ? '3–6 months'
                                : (app()->getLocale() === 'kh'
                                    ? 'ក្នុងរយៈពេល 3 ទៅ 6 ខែ'
                                    : '3 - 6 个月') }}
                        </option>
                        <option value="Just exploring">
                            {{ app()->getLocale() === 'en'
                                ? 'Just exploring'
                                : (app()->getLocale() === 'kh'
                                    ? 'គ្រាន់តែសាកសួរពត៌មាន'
                                    : '正在探索中') }}
                        </option>
                    </select>
                    <span class="absolute right-6 top-1/2 -translate-y-1/2">
                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none">
                            <path
                                d="M10.5 4.60096C11.8333 5.37076 11.8333 7.29526 10.5 8.06506L3 12.3952C1.66666 13.165 0 12.2027 0 10.6631L0 2.00288C0 0.463276 1.66667 -0.498971 3 0.27083L10.5 4.60096Z"
                                fill="#03254B" />
                        </svg>
                    </span>
                    @error('plannig_buy')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- Button -->
            <div class="flex justify-center py-6 w-full md:col-span-2">
                <button type="submit"
                    class="px-24 py-2 md:px-32 md:py-4 rounded-full bg-[#03254B] font-medium text-lg cursor-pointer">
                    <span class="inline-block"
                        style="
                            background: linear-gradient(90deg, #F2A93F 0%, #FFFBA6 100%);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            background-clip: text;
                            color: transparent;
                        ">
                        {{ app()->getLocale() === 'en' ? 'Submit' : (app()->getLocale() === 'kh' ? 'ដាក់បញ្ជូន' : '提交') }}
                    </span>
                </button>
            </div>
    </div>

    </form>

</div>
</div>

<script>
    const countrySelect = new Choices('#country-select', {
        searchEnabled: true, // Allows user to input text
        itemSelectText: '', // Removes the "Press to select" text
        shouldSort: true, // Automatically sorts A to Z
        searchPlaceholderValue: "Type a country...",
    });
</script>
