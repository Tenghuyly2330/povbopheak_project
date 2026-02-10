@extends('backend.admin')
@section('content')

    @section('site-title')
        Admin | Add About Us
    @endsection
    @section('page-main-title')
        ADD ABOUT US
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="{{ route('submit.update.about') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        @if (Session::has('message'))
                            <p class="text-danger text-center">{{ Session::get('message') }}</p>
                        @endif
                        <div class="card-body">

                            <div class="row">
                                <input type="hidden" name="update_id" value="{{ $row[0]->id }}">

                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Title English</label>
                                    <input class="form-control" type="text" name="update_title_en" value="{{ $row[0]->title_en }}" />
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Description English</label>
                                    <textarea name="update_description_en" class="form-control" id="update_description_en">{{ $row[0]->description_en }}</textarea>
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Title Khmer</label>
                                    <input class="form-control" type="text" name="update_title_kh" value="{{ $row[0]->title_kh }}" />
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Description Khmer</label>
                                    <textarea name="update_description_kh" class="form-control" id="update_description_kh">{{ $row[0]->description_kh }}</textarea>
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Title Chinese</label>
                                    <input class="form-control" type="text" name="update_title_cn" value="{{ $row[0]->title_cn }}" />
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Description Chinese</label>
                                    <textarea name="update_description_cn" class="form-control" id="update_description_en">{{ $row[0]->description_cn }}</textarea>
                                </div>


                                <div class="mb-5 col-12">
                                    <label class="block mb-2 text-sm font-medium text-[#0F4634]">Image</label>

                                    <div class="flex">
                                        <label class="uploader relative flex flex-col items-center justify-center 
                                            w-[500px] h-[300px] rounded-lg border-2 border-dashed border-[#0F4634]/40 
                                            cursor-pointer bg-[#F9FAFB] hover:bg-[#F3F4F6] transition overflow-hidden">

                                            <!-- Preview (show old image if exists) -->
                                            <img 
                                                class="preview-image absolute inset-0 m-auto w-[400px] h-[280px] object-cover rounded-lg 
                                                {{ $row[0]->image ? '' : 'hidden' }}"
                                                src="{{ $row[0]->image ? asset('assets/about_us/'.$row[0]->image) : '' }}"
                                            />

                                            <!-- Placeholder -->
                                            <div class="upload-placeholder flex flex-col items-center justify-center text-center
                                                        {{ $row[0]->image ? 'hidden' : '' }}">
                                                <svg class="w-10 h-10 mb-2 text-[#0F4634]" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 15a4 4 0 014-4h1m0 0a4 4 0 014-4V3m0 4a4 4 0 014 4h1a4 4 0 014 4v1a4 4 0 01-4 4h-1m-4 0a4 4 0 01-4 4v1a4 4 0 01-4-4H7" />
                                                </svg>
                                                <p class="text-xs text-gray-500">Upload</p>
                                            </div>

                                            <!-- Reset -->
                                            <button type="button"
                                                class="reset-btn absolute top-2 right-2 bg-white/80 rounded-full p-1 text-sm
                                                {{ $row[0]->image ? '' : 'hidden' }}">✕</button>

                                            <!-- Hidden Old Image -->
                                            <input type="hidden" name="old_image" value="{{ $row[0]->image }}">

                                            <!-- File input -->
                                            <input type="file" name="update_image" accept="image/*"
                                                class="file-input absolute inset-0 w-full h-full opacity-0 cursor-pointer" />

                                        </label>
                                    </div>
                                </div>



                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('view_about') }}"
                                    class="px-6 py-3 border-2 border-[#0F4634] text-[#0F4634] font-semibold rounded-xl hover:bg-[#0F4634] hover:text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-200">
                                    Cancel
                                </a>
                                <input type="submit"
                                    class="px-6 py-3 border-2 border-[#0F4634] text-[#0F4634] font-semibold rounded-xl hover:bg-[#0F4634] hover:text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-200"
                                    value="Update New">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".uploader").forEach(uploader => {

        const fileInput = uploader.querySelector(".file-input");
        const preview = uploader.querySelector(".preview-image");
        const placeholder = uploader.querySelector(".upload-placeholder");
        const resetBtn = uploader.querySelector(".reset-btn");

        const oldImage = preview.src ? preview.src : "";

        // When selecting new image
        fileInput.addEventListener("change", function () {
            const file = this.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                preview.classList.remove("hidden");
                placeholder.classList.add("hidden");
                resetBtn.classList.remove("hidden");
            };
            reader.readAsDataURL(file);
        });

        // Reset button clicked
        resetBtn.addEventListener("click", function (e) {
            e.preventDefault();
            fileInput.value = "";

            if (oldImage) {
                // Restore old image
                preview.src = oldImage;
                preview.classList.remove("hidden");
                placeholder.classList.add("hidden");
            } else {
                // No old image originally
                preview.src = "";
                preview.classList.add("hidden");
                placeholder.classList.remove("hidden");
                resetBtn.classList.add("hidden");
            }
        });
    });
});
</script>

@endsection
