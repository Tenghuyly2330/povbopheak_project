@extends('backend.admin')
@section('content')

@section('site-title')
    Admin | Edit Project
@endsection
@section('page-main-title')
    EDIT PROJECT
@endsection

<style>
    .input {
        width: 100%;
        border: 1px solid #ccc;
        padding: 8px;
        border-radius: 6px;
    }

    .section {
        border: 1px solid #ddd;
        padding: 16px;
        border-radius: 10px;
        background: #f9f9f9;
    }

    .img-thumb {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 4px;
    }

    .preview-img-wrapper {
        position: relative;
        width: 100px;
        height: 100px;
    }

    .preview-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 6px;
    }

    .remove-btn {
        position: absolute;
        top: 2px;
        right: 2px;
        background: rgba(0, 0, 0, 0.6);
        color: white;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        cursor: pointer;
        font-size: 14px;
        line-height: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="container p-6">

    <form method="POST" action="{{ route('project.update', $project->id) }}" x-data="projectForm({{ $project->category ? json_encode($project->category) : '[]' }})" class="space-y-8"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- PROJECT INFO -->
        <div class="section space-y-4">
            <h2 class="text-lg font-bold !text-[#452384]">Project Info for show default</h2>

            <!-- Banner IMAGE -->
            <div class="mb-4">
                <label class="font-medium">Banner of Project (w: 1024px, h: 800px)</label>
                <input type="file" id="banner" name="banner" accept=".jpg,.jpeg,.png,.gif,.svg"
                    class="form-control mt-2">
                @error('banner')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div id="image_banner_preview" class="flex flex-wrap gap-2 mt-2">
                @if ($project->banner)
                    <img src="{{ asset('storage/' . $project->banner) }}" style="width:300px; border-radius:6px;"
                        id="current-banner">
                @endif
            </div>

            <div class="mb-4">
                <label class="font-medium mb-2">Show Default Images Slider (w: 300px, h: 200px)</label>
                <input type="file" name="image_default[]" id="image_default_input" multiple accept="image/*"
                    class="form-control">
                <input type="hidden" name="removed_images" id="removed_images">

            </div>


            @php
                // Make sure image_default is an array
                $defaultImages = is_array($project->image_default)
                    ? $project->image_default
                    : json_decode($project->image_default, true) ?? [];
            @endphp

            <div id="image_default_preview" class="flex flex-wrap gap-2 mt-2">
                @foreach ($defaultImages as $img)
                    <div class="preview-img-wrapper">
                        <img src="{{ asset('storage/' . $img) }}" data-old="{{ $img }}">
                        <button type="button" class="remove-btn">✕</button>
                    </div>
                @endforeach
            </div>

            <label class="font-bold">Description show default</label>
            <div class="desc-content">

                <label class="font-medium">Description English</label>
                <textarea name="description_default_en" id="desc_en" class="ckeditor">{{ $project->description_default_en }}</textarea>
                <label class="font-medium">Description Khmer</label>
                <textarea name="description_default_kh" id="desc_kh" class="ckeditor hidden">{{ $project->description_default_kh }}</textarea>
                <label class="font-medium">Description Chinese</label>
                <textarea name="description_default_cn" id="desc_cn" class="ckeditor hidden">{{ $project->description_default_cn }}</textarea>
            </div>
            <h2 class="text-xl font-bold">Project Info</h2>
            <div class="grid grid-cols-3 gap-4">
                <input name="name_en" placeholder="Project Name EN" class="input" value="{{ $project->name_en }}">
                <input name="name_kh" placeholder="Project Name KH" class="input" value="{{ $project->name_kh }}">
                <input name="name_ch" placeholder="Project Name CH" class="input" value="{{ $project->name_ch }}">
            </div>
            <div class="grid grid-cols-3 gap-4">
                <input name="type_en" placeholder="Project Type EN" class="input" value="{{ $project->type_en }}">
                <input name="type_kh" placeholder="Project Type KH" class="input" value="{{ $project->type_kh }}">
                <input name="type_ch" placeholder="Project Type CH" class="input" value="{{ $project->type_ch }}">
            </div>

            <label class="font-medium  mt-4">Default Image (w: 400px, h: 500px)</label>
            <input type="file" name="image" id="image" class="input" />
            <div id="image_preview" class="flex flex-wrap gap-2 mt-2">
                @if ($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" style="width:300px; border-radius:6px;">
                @endif
            </div>
        </div>

        <!-- LOCATION -->
        <div class="section space-y-4">
            <h2 class="text-xl font-bold">Location</h2>
            <div class="grid grid-cols-3 gap-4">
                <input name="locate_text_en" placeholder="Location Text EN" class="input"
                    value="{{ $project->locate_text_en }}">
                <input name="locate_text_kh" placeholder="Location Text KH" class="input"
                    value="{{ $project->locate_text_kh }}">
                <input name="locate_text_ch" placeholder="Location Text CH" class="input"
                    value="{{ $project->locate_text_ch }}">
            </div>
            <input name="locate_link" placeholder="Google Map Link" class="input"
                value="{{ $project->locate_link }}">
            <div class="mb-4">
                <label for="pdf" class="block text-gray-700 font-medium mt-4">Upload PDF</label>
                @if ($project->pdf)
                    <p class="mb-2">
                        Current PDF:
                        <a href="{{ asset('storage/' . $project->pdf) }}" target="_blank"
                            class="text-blue-600 underline">
                            View / Download
                        </a>
                    </p>
                @endif
                <input type="file" name="pdf" id="pdf" accept="application/pdf"
                    class="border p-2 rounded w-full">
            </div>

        </div>

        <!-- CATEGORIES -->
        <div class="section space-y-4">
            <h2 class="text-xl font-bold">Categories</h2>

            <template x-for="(cat, cIndex) in categories" :key="cIndex">
                <div class="border p-4 rounded bg-white space-y-4">

                    <div class="flex justify-between">
                        <h3 class="font-bold">Category</h3>
                        <button type="button" @click="removeCategory(cIndex)" class="text-red-600">✕</button>
                    </div>

                    <div class="grid grid-cols-1 gap-2">
                        <!-- CATEGORY BANNER -->
                        <div class="space-y-2">
                            <label class="font-semibold">Category Banner (w: 1024px, h: 700px)</label>

                            <input type="file" :name="'category[' + cIndex + '][banner_cate]'"
                                @change="previewCategoryBanner($event, cIndex)" class="form-control">

                            <template x-if="cat.bannerPreview">
                                <img :src="cat.bannerPreview" class="img-thumbnail"
                                    style="width:120px;height:80px;object-fit:cover;">
                            </template>
                        </div>
                        <!-- CATEGORY NAME -->
                        <div class="grid grid-cols-3 gap-2">
                            <input x-model="cat.name.en" @input="cat.slug = slugify(cat.name.en)"
                                placeholder="Category EN" class="input">
                            <input x-model="cat.name.kh" placeholder="Category KH" class="input">
                            <input x-model="cat.name.ch" placeholder="Category CH" class="input">
                        </div>
                    </div>

                    <input x-model="cat.slug" readonly class="input bg-gray-100 d-none">

                    <!-- TYPES -->
                    <template x-for="(type, tIndex) in cat.cat_type" :key="tIndex">
                        <div class="border p-3 rounded space-y-3">

                            <div class="flex justify-between">
                                <h4 class="font-semibold">Type</h4>
                                <button type="button" @click="removeType(cIndex, tIndex)"
                                    class="text-red-600">✕</button>
                            </div>

                            <div class="grid grid-cols-1 gap-2">
                                <!-- TYPE BANNER -->
                                <div class="space-y-2">
                                    <label class="font-semibold">Type Banner (w: 1024px, h: 700px)</label>

                                    <input type="file"
                                        :name="'category[' + cIndex + '][cat_type][' + tIndex + '][banner_type]'"
                                        @change="previewTypeBanner($event, cIndex, tIndex)" class="form-control">

                                    <template x-if="type.bannerPreview">
                                        <img :src="type.bannerPreview" class="img-thumbnail"
                                            style="width:120px;height:80px;object-fit:cover;">
                                    </template>
                                </div>
                                <div class="grid grid-cols-3 gap-2">
                                    <input x-model="type.title.en" @input="type.slug = slugify(type.title.en)"
                                        placeholder="Title EN" class="input">
                                    <input x-model="type.title.kh" placeholder="Title KH" class="input">
                                    <input x-model="type.title.ch" placeholder="Title CH" class="input">
                                </div>
                            </div>

                            <input x-model="type.slug" readonly class="input bg-gray-100 d-none">

                            <!-- ABOUT -->
                            {{-- <div class="border p-3 rounded bg-gray-50 space-y-3">
                                <h5 class="font-semibold">About Section</h5>

                                <template x-for="(about, aIndex) in (type.about || [])" :key="aIndex">

                                    <div class="border p-3 rounded space-y-2 bg-white">

                                        <!-- About Text -->
                                        <div class="grid grid-cols-3 gap-2">
                                            <input x-model="about.text.en" placeholder="About EN" class="input">
                                            <input x-model="about.text.kh" placeholder="About KH" class="input">
                                            <input x-model="about.text.ch" placeholder="About CH" class="input">
                                        </div>

                                        <!-- About Number -->
                                        <input x-model="about.number" type="number" placeholder="Number" class="input">

                                        <!-- About Image -->
                                        <input type="file"
                                            :name="'category['+cIndex+'][cat_type]['+tIndex+'][about]['+aIndex+'][image]'"
                                            @change="previewAboutImage($event, cIndex, tIndex, aIndex)"
                                            class="input">

                                        <template x-if="about.preview">
                                            <img :src="about.preview" class="img-thumb">
                                        </template>

                                        <button type="button"
                                            @click="removeAbout(cIndex, tIndex, aIndex)"
                                            class="text-red-600 text-sm">
                                            ✕ Remove About
                                        </button>
                                    </div>

                                </template>

                                <button type="button"
                                    @click="addAbout(cIndex, tIndex)"
                                    class="btn btn-sm btn-secondary">
                                    + Add About
                                </button>
                            </div> --}}


                            <div class="grid grid-cols-3 gap-2">
                                <textarea x-model="type.des.en" placeholder="Desc EN" class="input" id="descript_en" class="ckeditor"></textarea>
                                <textarea x-model="type.des.kh" placeholder="Desc KH" class="input" id="descript_kh" class="ckeditor"></textarea>
                                <textarea x-model="type.des.ch" placeholder="Desc CH" class="input" id="descript_cn" class="ckeditor"></textarea>
                            </div>

                            <!-- IMAGES -->
                            <div class="space-y-2">
                                {{-- <template x-for="(preview, iIndex) in type.imgPreview" :key="iIndex">
                                    <div class="d-flex align-items-center mb-2">
                                        <input type="file" :name="'category[' + cIndex + '][cat_type][' + tIndex + '][img][]'" @change="previewImage($event, cIndex, tIndex, iIndex)" class="form-control me-2">
                                        <template x-if="type.imgPreview[iIndex]">
                                            <img :src="type.imgPreview[iIndex]" class="img-thumbnail" style="width:80px; height:80px; object-fit:cover;">
                                        </template>
                                        <button type="button" @click="removeImage(cIndex, tIndex, iIndex)" class="btn btn-sm btn-danger">✕</button>
                                    </div>
                                </template> --}}
                                <p class="mt-4">Image Slider (w: 300px, h: 200px)</p>
                                <template x-for="(preview, iIndex) in type.imgPreview" :key="iIndex">
                                    <div class="d-flex align-items-center mb-2">
                                        <input type="file"
                                            :name="'category[' + cIndex + '][cat_type][' + tIndex + '][img][]'"
                                            @change="previewImage($event, cIndex, tIndex, iIndex)"
                                            class="form-control me-2">

                                        <template x-if="preview">
                                            <img :src="preview" class="img-thumbnail"
                                                style="width:80px; height:80px; object-fit:cover;">
                                        </template>

                                        <button type="button" @click="removeImage(cIndex, tIndex, iIndex)"
                                            class="btn btn-sm btn-danger">✕</button>
                                    </div>
                                </template>


                                <button type="button" @click="addImage(cIndex, tIndex)"
                                    class="btn btn-sm btn-primary">+ Add Image</button>
                            </div>

                        </div>
                    </template>

                    <button type="button" @click="addType(cIndex)" class="bg-blue-600 text-white px-3 py-1 rounded">
                        + Add Type
                    </button>

                </div>
            </template>
            <button type="button" @click="addCategory()" class="bg-green-600 text-white px-4 py-2 rounded mb-4">
                + Add Category
            </button>
        </div>

        <input type="hidden" name="category_json" :value="JSON.stringify(categories)">

        <button class="bg-black text-white px-8 py-3 rounded-xl">
            Update Project
        </button>

    </form>
</div>

<script>
    // ==========================
    // Slugify function
    // ==========================
    function slugify(text) {
        return text.toLowerCase().trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
    }

    // ==========================
    // Alpine.js Project Form
    // ==========================
    function projectForm(initialCategories = []) {
        return {
            categories: initialCategories.map(cat => ({
                ...cat,
                bannerPreview: cat.banner_cate ? '{{ asset('storage') }}/' + cat.banner_cate : null,
                cat_type: (cat.cat_type || []).map(type => ({
                    ...type,
                    bannerPreview: type.banner_type ? '{{ asset('storage') }}/' + type.banner_type : null,
                    imgPreview: Array.isArray(type.img) ? type.img.map(img => '{{ asset('storage') }}/' + img) : [],
                    about: (type.about || []).map(a => ({
                        ...a,
                        preview: a.image ? '{{ asset('storage') }}/' + a.image : null
                    }))
                }))
            })),

            // ===== Banner previews =====
            previewCategoryBanner(event, cIndex) {
                const file = event.target.files[0];
                if (!file) return;
                this.categories[cIndex].bannerPreview = URL.createObjectURL(file);
            },
            previewTypeBanner(event, cIndex, tIndex) {
                const file = event.target.files[0];
                if (!file) return;
                this.categories[cIndex].cat_type[tIndex].bannerPreview = URL.createObjectURL(file);
            },

            // ===== About Section =====
            addAbout(c, t) {
                this.categories[c].cat_type[t].about = this.categories[c].cat_type[t].about || [];
                this.categories[c].cat_type[t].about.push({
                    text: { en: '', kh: '', ch: '' },
                    number: '',
                    image: '',
                    preview: null
                });
            },
            removeAbout(c, t, a) {
                this.categories[c].cat_type[t].about.splice(a, 1);
            },
            previewAboutImage(e, c, t, a) {
                const file = e.target.files[0];
                if (!file) return;
                this.categories[c].cat_type[t].about[a].preview = URL.createObjectURL(file);
            },

            // ===== Category & Types =====
            addCategory() {
                this.categories.push({ name: { en: '', kh: '', ch: '' }, slug: '', cat_type: [this.newType()] });
            },
            removeCategory(i) {
                this.categories.splice(i, 1);
            },
            addType(c) {
                this.categories[c].cat_type.push(this.newType());
            },
            removeType(c, t) {
                this.categories[c].cat_type.splice(t, 1);
            },

            // ===== Type Images =====
            addImage(c, t) {
                this.categories[c].cat_type[t].imgPreview = this.categories[c].cat_type[t].imgPreview || [];
                this.categories[c].cat_type[t].imgPreview.push(null);
            },
            removeImage(c, t, i) {
                if (this.categories[c].cat_type[t].imgPreview)
                    this.categories[c].cat_type[t].imgPreview.splice(i, 1);
            },
            previewImage(event, c, t, i) {
                const file = event.target.files[0];
                if (!file) return;
                this.categories[c].cat_type[t].imgPreview[i] = URL.createObjectURL(file);
            },

            newType() {
                return { title: { en: '', kh: '', ch: '' }, slug: '', des: { en: '', kh: '', ch: '' }, imgPreview: [], about: [] };
            }
        }
    }
</script>

<script>
    // ==========================
    // Image Default Preview
    // ==========================
    const input = document.getElementById('image_default_input');
    const previewContainer = document.getElementById('image_default_preview');

    let newFiles = []; // NEWLY ADDED FILES
    let oldImages = Array.from(previewContainer.querySelectorAll('img[data-old]')).map(img => img.dataset.old);
    let removedImages = [];

    // Remove existing image
    previewContainer.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const wrapper = this.parentElement;
            const img = wrapper.querySelector('img');
            const oldPath = img.dataset.old;

            if (oldPath) {
                oldImages = oldImages.filter(i => i !== oldPath);
                removedImages.push(oldPath);
                document.getElementById('removed_images').value = JSON.stringify(removedImages);
            }

            wrapper.remove();
        });
    });

    // Add new files preview
    input.addEventListener('change', function(e) {
        const files = Array.from(e.target.files);
        files.forEach(file => {
            newFiles.push(file);

            const reader = new FileReader();
            reader.onload = function(ev) {
                const wrapper = document.createElement('div');
                wrapper.classList.add('preview-img-wrapper');

                const img = document.createElement('img');
                img.src = ev.target.result;

                const btn = document.createElement('button');
                btn.type = 'button';
                btn.classList.add('remove-btn');
                btn.innerText = '✕';
                btn.addEventListener('click', function() {
                    wrapper.remove();
                    newFiles = newFiles.filter(f => f !== file);
                });

                wrapper.appendChild(img);
                wrapper.appendChild(btn);
                previewContainer.appendChild(wrapper);
            }
            reader.readAsDataURL(file);
        });
    });
</script>

<script>
    // ==========================
    // CKEditor Initialization
    // ==========================
    const ckeditors = document.querySelectorAll('.ckeditor');
    ckeditors.forEach(el => ClassicEditor.create(el));

    // Tab switch for description editors
    const tabs = document.querySelectorAll('.desc-tab');
    const editors = {
        en: document.getElementById('desc_en'),
        kh: document.getElementById('desc_kh'),
        cn: document.getElementById('desc_cn')
    };
    tabs.forEach(tab => {
        tab.addEventListener('click', e => {
            e.preventDefault();
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            Object.keys(editors).forEach(lang => {
                editors[lang].parentElement.style.display = lang === tab.dataset.lang ? 'block' : 'none';
            });
        });
    });
</script>

<script>
    // ==========================
    // Banner preview
    // ==========================
    const bannerInput = document.getElementById('banner');
    const bannerPreview = document.getElementById('image_banner_preview');

    bannerInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            bannerPreview.innerHTML = '';
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '300px';
            img.style.height = 'auto';
            img.style.borderRadius = '6px';
            bannerPreview.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
</script>

<script>
    // ==========================
    // Main image preview
    // ==========================
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image_preview');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.innerHTML = '';
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '300px';
            img.style.borderRadius = '6px';
            imagePreview.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
</script>

@endsection
