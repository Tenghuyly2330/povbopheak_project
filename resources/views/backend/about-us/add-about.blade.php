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
                <form action="{{ route('submit.add.about') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        @if (Session::has('message'))
                            <p class="text-danger text-center">{{ Session::get('message') }}</p>
                        @endif
                        <div class="card-body">

                            <div class="row">

                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Title English</label>
                                    <input class="form-control" type="text" name="title_en" />
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Description English</label>
                                    <textarea name="description_en" class="form-control" id="description_en"></textarea>
                                </div>

                                 <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Title Khmer</label>
                                    <input class="form-control" type="text" name="title_kh" />
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Description Khmer</label>
                                    <textarea name="description_kh" class="form-control" id="description_kh"></textarea>
                                </div>

                                 <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Title Chinese</label>
                                    <input class="form-control" type="text" name="title_cn" />
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Description Chinese</label>
                                    <textarea name="description_cn" class="form-control" id="description_cn"></textarea>
                                </div>
                        
                                <!-- ADD: no old image initially -->
                                <div class="mb-5 col-12">
                                    <label class="block mb-2 text-sm font-medium text-[#0F4634]">Image</label>

                                    <div class="flex">
                                        <label class="uploader flex flex-col items-center justify-center w-[500px] h-[300px] rounded-lg
                       border-2 border-dashed border-[#0F4634]/40 cursor-pointer bg-[#F9FAFB] hover:bg-[#F3F4F6]
                       transition relative overflow-hidden">

                                            <!-- Preview (empty for add) -->
                                            <img class="preview-image hidden absolute inset-0 m-auto w-[400px] h-[280px] object-cover rounded-lg"
                                                alt="preview" />

                                            <!-- Placeholder -->
                                            <div
                                                class="upload-placeholder flex flex-col items-center justify-center text-center">
                                                <!-- svg -->
                                                <svg class="w-10 h-10 mb-2 text-[#0F4634]" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 15a4 4 0 014-4h1m0 0a4 4 0 014-4V3m0 4a4 4 0 014 4h1a4 4 0 014 4v1a4 4 0 01-4 4h-1m-4 0a4 4 0 01-4 4v1a4 4 0 01-4-4H7" />
                                                </svg>
                                                <p class="text-xs text-gray-500">Upload</p>
                                            </div>

                                            <!-- Reset button (hidden for add until chosen) -->
                                            <button type="button"
                                                class="reset-btn hidden absolute top-2 right-2 bg-white/80 rounded-full p-1 text-sm">✕</button>

                                            <!-- File input — NOT display:none. It covers the whole label and is clickable. -->
                                            <input type="file" name="image" accept="image/*"
                                                class="input-file absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
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
                                    value="Add New">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.uploader').forEach(uploader => {
    const inputFile = uploader.querySelector("input[type='file']");
    const previewImage = uploader.querySelector(".preview-image");
    const placeholder = uploader.querySelector(".upload-placeholder");
    const resetBtn = uploader.querySelector(".reset-btn");

    // store old src (for update case)
    if (previewImage && previewImage.src) {
      previewImage.dataset.old = previewImage.src || '';
      // if there was an old image shown server-side, ensure placeholder hidden
      if (previewImage.dataset.old && !previewImage.classList.contains('hidden')) {
        if (placeholder) placeholder.classList.add('hidden');
        if (resetBtn) resetBtn.classList.remove('hidden');
      }
    }

    if (!inputFile) return; // safety

    inputFile.addEventListener('change', function () {
      const file = this.files && this.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = function (e) {
        if (previewImage) {
          previewImage.src = e.target.result;
          previewImage.classList.remove('hidden');
        }
        if (placeholder) placeholder.classList.add('hidden');
        if (resetBtn) resetBtn.classList.remove('hidden');
      };
      reader.readAsDataURL(file);
    });

    if (resetBtn) {
      resetBtn.addEventListener('click', function (ev) {
        ev.preventDefault();
        // Clear file selection
        if (inputFile) inputFile.value = '';

        const oldSrc = previewImage ? previewImage.dataset.old || '' : '';

        if (oldSrc) {
          // restore old image (update form)
          previewImage.src = oldSrc;
          previewImage.classList.remove('hidden');
          if (placeholder) placeholder.classList.add('hidden');
          // keep reset visible (user may still want to clear)
        } else {
          // no old image => clear preview and show placeholder
          if (previewImage) {
            previewImage.src = '';
            previewImage.classList.add('hidden');
          }
          if (placeholder) placeholder.classList.remove('hidden');
          resetBtn.classList.add('hidden');
        }
      });
    }
  });
});
</script>