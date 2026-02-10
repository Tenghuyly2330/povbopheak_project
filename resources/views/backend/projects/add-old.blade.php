@extends('backend.admin')
@section('content')

@section('site-title')
    Admin | Add Project
@endsection
@section('page-main-title')
    ADD PROJECT
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
        background: rgba(0,0,0,0.6);
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

    <form method="POST" action="{{ route('project.store') }}" x-data="projectForm()" class="space-y-8"
        enctype="multipart/form-data">
        @csrf

            <!-- PROJECT INFO -->
            <div class="section space-y-4">
                {{-- Show infor default --}}
            <h2 class="text-xl font-bold">Project Info show default</h2>
            <!-- Banner IMAGE -->
            <div class="mb-4">
                <label class="font-medium">Banner of Project</label>
                <input type="file" id="banner" name="banner" accept="image/*" class="form-control mt-2">
            </div>
            <div id="image_banner_preview" class="flex flex-wrap gap-2 mt-2">
                <!-- preview image will appear here -->
            </div>
            <!-- MULTIPLE IMAGES -->
            <div class="mb-4">
                <label class="font-medium">Show Default Images (Multiple) of Projects</label>
                <input type="file" id="image_default_input" name="image_default[]" multiple accept="image/*" class="form-control mt-2">
            </div>
            <div id="image_default_preview" class="flex flex-wrap gap-2 mt-2">
                <!-- preview images will appear here -->
            </div>
            <!-- MULTILINGUAL DESCRIPTION -->
            <div class="mb-4">
                <label class="font-bold">Description Show Default</label>
                <div class="desc-content">
                    <label class="font-medium">Description English</label>
                    <textarea name="description_default_en" id="desc_en" class="ckeditor"></textarea>
                    <label class="font-medium">Description Khmer</label>
                    <textarea name="description_default_kh" id="desc_kh" class="ckeditor hidden"></textarea>
                    <label class="font-medium">Description Chinese</label>
                    <textarea name="description_default_cn" id="desc_cn" class="ckeditor hidden"></textarea>
                </div>
            </div>
            <h2 class="text-xl font-bold">Project Info</h2>
            <div class="grid grid-cols-3 gap-4">
                <input name="name_en" placeholder="Project Name EN" class="input">
                <input name="name_kh" placeholder="Project Name KH" class="input">
                <input name="name_ch" placeholder="Project Name CH" class="input">
            </div>
            <div class="grid grid-cols-3 gap-4">
                <input name="type_en" placeholder="Project Type EN" class="input">
                <input name="type_kh" placeholder="Project Type KH" class="input">
                <input name="type_ch" placeholder="Project Type CH" class="input">
            </div>
            <input type="file" name="image" class="input mt-4" accept="image/*" onchange="previewImage(event)">

            <img id="imagePreview"
                class="mt-4 w-40 h-40 object-cover rounded-lg border hidden"
                alt="Preview">
                    </div>
        <!-- LOCATION -->
        <div class="section space-y-4">
            <h2 class="text-xl font-bold">Location</h2>
            <div class="grid grid-cols-3 gap-4">
                <input name="locate_text_en" placeholder="Location Text EN" class="input">
                <input name="locate_text_kh" placeholder="Location Text KH" class="input">
                <input name="locate_text_ch" placeholder="Location Text CH" class="input">
            </div>
            <input name="locate_link" placeholder="Google Map Link" class="input">

            <div class="mb-2">
                <label for="pdf" class="block text-gray-700 font-medium mt-4">Upload PDF</label>

                <input class="input mt-4"
                    type="file"
                    name="pdf"
                    accept="application/pdf"
                >
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

                    <!-- CATEGORY NAME -->
                    <div class="grid grid-cols-3 gap-2">
                        <input x-model="cat.name.en" @input="cat.slug = slugify(cat.name.en)" placeholder="Category EN"
                            class="input">
                        <input x-model="cat.name.kh" placeholder="Category KH" class="input">
                        <input x-model="cat.name.ch" placeholder="Category CH" class="input">
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

                            <div class="grid grid-cols-3 gap-2">
                                <input x-model="type.title.en" @input="type.slug = slugify(type.title.en)"
                                    placeholder="Title EN" class="input">
                                <input x-model="type.title.kh" placeholder="Title KH" class="input">
                                <input x-model="type.title.ch" placeholder="Title CH" class="input">
                            </div>

                            <input x-model="type.slug" readonly class="input bg-gray-100 d-none">

                            <!-- ABOUT SECTION -->
                            {{-- <div class="space-y-3 mt-4 border-t pt-3">
                                <h4 class="font-semibold">About</h4>

                                <template x-for="(about, aIndex) in type.about" :key="aIndex">
                                    <div class="border p-3 rounded space-y-2">

                                        <!-- TEXT -->
                                        <div class="grid grid-cols-3 gap-2">
                                            <input x-model="about.text.en"
                                                placeholder="Text EN"
                                                class="input">

                                            <input x-model="about.text.kh"
                                                placeholder="Text KH (optional)"
                                                class="input">

                                            <input x-model="about.text.ch"
                                                placeholder="Text CH (optional)"
                                                class="input">
                                        </div>

                                        <!-- NUMBER -->
                                        <input type="number"
                                            x-model="about.number"
                                            placeholder="Number"
                                            class="input">

                                        <!-- IMAGE -->
                                        <div class="flex items-center gap-2">
                                            <input type="file"
                                                :name="'category['+cIndex+'][cat_type]['+tIndex+'][about]['+aIndex+'][image]'"
                                                @change="previewAboutImage($event, cIndex, tIndex, aIndex)"
                                                class="form-control">

                                            <template x-if="about.imagePreview">
                                                <img :src="about.imagePreview"
                                                    class="img-thumbnail"
                                                    style="width:80px;height:80px;object-fit:cover;">
                                            </template>
                                        </div>

                                        <!-- REMOVE -->
                                        <button type="button"
                                                @click="removeAbout(cIndex, tIndex, aIndex)"
                                                class="btn btn-sm btn-danger">
                                            ✕ Remove
                                        </button>

                                    </div>
                                </template>

                                <!-- ADD BUTTON -->
                                <button type="button"
                                        @click="addAbout(cIndex, tIndex)"
                                        class="btn btn-sm btn-primary">
                                    + Add About
                                </button>
                            </div> --}}


                            <div class="grid grid-cols-3 gap-2">
                                <textarea x-model="type.des.en" placeholder="Desc EN" class="input"></textarea>
                                <textarea x-model="type.des.kh" placeholder="Desc KH" class="input"></textarea>
                                <textarea x-model="type.des.ch" placeholder="Desc CH" class="input"></textarea>
                            </div>

                            <!-- IMAGES -->
                            <div class="space-y-2">
                                <template x-for="(preview, iIndex) in type.imgPreview" :key="iIndex">
                                    <div class="d-flex align-items-center mb-2">
                                        <input type="file"
                                            :name="'category[' + cIndex + '][cat_type][' + tIndex + '][img][]'"
                                            @change="previewImage($event, cIndex, tIndex, iIndex)"
                                            class="form-control me-2">

                                        <template x-if="type.imgPreview[iIndex]">
                                            <img :src="type.imgPreview[iIndex]" class="img-thumbnail"
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

        <!-- SEND CATEGORY JSON -->
        <input type="hidden" name="category_json" :value="JSON.stringify(categories)">

        <button class="bg-black text-white px-8 py-3 rounded-xl">
            Save Project
        </button>

    </form>
</div>
<script>

function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<script>
function slugify(text) {
    return text.toLowerCase().trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');
}

function projectForm() {
    return {
        categories: [],

        addCategory() {
            this.categories.push({
                name: { en:'', kh:'', ch:'' },
                slug: '',
                cat_type: [this.newType()]
            })
        },

        removeCategory(i) {
            this.categories.splice(i, 1)
        },

        addType(c) {
            this.categories[c].cat_type.push(this.newType())
        },

        removeType(c, t) {
            this.categories[c].cat_type.splice(t, 1)
        },

        /* ================== IMAGES ================== */
        addImage(c, t) {
            this.categories[c].cat_type[t].imgPreview.push(null)
        },

        removeImage(c, t, i) {
            this.categories[c].cat_type[t].imgPreview.splice(i, 1)
        },

        previewImage(event, c, t, i) {
            const file = event.target.files[0]
            if (!file) return
            this.categories[c].cat_type[t].imgPreview[i] = URL.createObjectURL(file)
        },

        /* ================== ABOUT ================== */
        addAbout(c, t) {
            this.categories[c].cat_type[t].about.push({
                text: { en:'', kh:'', ch:'' },
                number: '',
                imagePreview: null
            })
        },

        removeAbout(c, t, a) {
            this.categories[c].cat_type[t].about.splice(a, 1)
        },

        previewAboutImage(event, c, t, a) {
            const file = event.target.files[0]
            if (!file) return

            const reader = new FileReader()
            reader.onload = e => {
                this.categories[c].cat_type[t].about[a].imagePreview = e.target.result
            }
            reader.readAsDataURL(file)
        },

        /* ================== TYPE ================== */
        newType() {
            return {
                title: { en:'', kh:'', ch:'' },
                slug: '',
                des: { en:'', kh:'', ch:'' },
                imgPreview: [],
                about: []   // 🔥 REQUIRED
            }
        }
    }
}
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    // Initialize CKEditor for all textareas
    document.querySelectorAll('.ckeditor').forEach(el => {
        ClassicEditor.create(el).catch(error => console.error(error));
    });

    // Simple language tab switch
    const tabs = document.querySelectorAll('.desc-tab');
    const editors = { en: document.getElementById('desc_en'), kh: document.getElementById('desc_kh'), cn: document.getElementById('desc_cn') };

    tabs.forEach(tab => {
        tab.addEventListener('click', function(e){
            e.preventDefault();
            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            Object.keys(editors).forEach(lang => {
                editors[lang].parentElement.style.display = lang === this.dataset.lang ? 'block' : 'none';
            });
        });
    });
</script>
<script>
    const input = document.getElementById('image_default_input');
const previewContainer = document.getElementById('image_default_preview');
let imageFiles = []; // array to keep track of files

input.addEventListener('change', function(event) {
    const files = Array.from(event.target.files);

    files.forEach(file => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const wrapper = document.createElement('div');
            wrapper.classList.add('preview-img-wrapper');

            const img = document.createElement('img');
            img.src = e.target.result;

            const btn = document.createElement('button');
            btn.innerText = '✕';
            btn.classList.add('remove-btn');

            // Remove image
            btn.addEventListener('click', function() {
                const index = imageFiles.indexOf(file);
                if (index > -1) imageFiles.splice(index, 1);
                wrapper.remove();
                updateInputFiles();
            });

            wrapper.appendChild(img);
            wrapper.appendChild(btn);
            previewContainer.appendChild(wrapper);

            imageFiles.push(file);
            updateInputFiles();
        };
        reader.readAsDataURL(file);
    });

    // Reset input to allow same file again
    input.value = '';
});

// Update the actual input's files before submitting
function updateInputFiles() {
    const dataTransfer = new DataTransfer();
    imageFiles.forEach(file => dataTransfer.items.add(file));
    input.files = dataTransfer.files;
}

</script>

<script>
    const bannerInput = document.getElementById('banner');
const bannerPreview = document.getElementById('image_banner_preview');

bannerInput.addEventListener('change', function(event) {
    const file = event.target.files[0]; // single file only
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(e) {
        // Clear previous preview
        bannerPreview.innerHTML = '';

        // Create image element
        const img = document.createElement('img');
        img.src = e.target.result;
        img.classList.add('preview-banner-img');
        img.style.width = '200px';   // adjust size
        img.style.height = 'auto';
        img.style.borderRadius = '6px';

        bannerPreview.appendChild(img);
    };
    reader.readAsDataURL(file);
});

</script>

@endsection
