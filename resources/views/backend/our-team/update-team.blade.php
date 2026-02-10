@extends('backend.admin')
@section('content')

    @section('site-title')
        Admin | Add Product
    @endsection
    @section('page-main-title')
        Add Team
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="{{ route('submit.update.team') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        @if (Session::has('message'))
                            <p class="text-danger text-center">{{ Session::get('message') }}</p>
                        @endif
                        <div class="card-body">

                            <div class="row">
                                <input type="hidden" name="update_id" value="{{$row[0]->id}}">
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Name English</label>
                                    <input class="form-control" type="text" name="update_name_en"
                                        value="{{ $row[0]->name_en }}" />
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Position English</label>
                                    <input class="form-control" type="text" name="update_position_en"
                                        value="{{ $row[0]->position_en }}" />
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Name Khmer</label>
                                    <input class="form-control" type="text" name="update_name_kh"
                                        value="{{ $row[0]->name_kh }}" />
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Position Khmer</label>
                                    <input class="form-control" type="text" name="update_position_kh"
                                        value="{{ $row[0]->position_kh }}" />
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Name Chinese</label>
                                    <input class="form-control" type="text" name="update_name_cn"
                                        value="{{ $row[0]->name_cn }}" />
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label text-[#0F4634]">Position Chinese</label>
                                    <input class="form-control" type="text" name="update_position_cn"
                                        value="{{ $row[0]->position_cn }}" />
                                </div>
                                <!-- UPDATE: show old image if exists -->
                                <div class="mb-5 col-12">
                                    <label class="block mb-2 text-sm font-medium text-[#0F4634]">Profile</label>

                                    <div class="flex mb-5">
                                        <label class="uploader flex flex-col items-center justify-center w-[200px] h-[200px] rounded-full
                       border-2 border-dashed border-[#0F4634]/40 cursor-pointer bg-[#F9FAFB] hover:bg-[#F3F4F6]
                       transition relative overflow-hidden">

                                            <!-- Show old image if present (server-side) -->
                                            <img class="preview-image absolute inset-0 m-auto w-[180px] h-[180px] object-cover rounded-full {{ $row[0]->profile ? '' : 'hidden' }}"
                                                src="{{ $row[0]->profile ? asset('assets/team/' . $row[0]->profile) : '' }}"
                                                alt="preview" />

                                            <!-- Placeholder -->
                                            <div
                                                class="upload-placeholder flex flex-col items-center justify-center text-center {{ $row[0]->profile ? 'hidden' : '' }}">
                                                <!-- svg -->
                                                <svg class="w-10 h-10 mb-2 text-[#0F4634]" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 15a4 4 0 014-4h1m0 0a4 4 0 014-4V3m0 4a4 4 0 014 4h1a4 4 0 014 4v1a4 4 0 01-4 4h-1m-4 0a4 4 0 01-4 4v1a4 4 0 01-4-4H7" />
                                                </svg>
                                                <p class="text-xs text-gray-500">Upload</p>
                                            </div>

                                            <!-- Reset button: shown if there is an existing image -->
                                            <button type="button"
                                                class="reset-btn {{ $row[0]->profile ? '' : 'hidden' }} absolute top-2 right-2 bg-white/80 rounded-full p-1 text-sm">✕</button>

                                            <!-- Keep old_profile value for backend -->
                                            <input type="hidden" name="old_profile" value="{{ $row[0]->profile }}" />

                                            <!-- File input covering the label (clickable) -->
                                            <input type="file" name="update_profile" accept="image/*"
                                                class="input-file absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
                                        </label>
                                    </div>
                                </div>


                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('view_team') }}"
                                    class="px-6 py-3 border-2 border-[#0F4634] text-[#0F4634] font-semibold rounded-xl hover:bg-[#0F4634] hover:text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-200">
                                    Cancel
                                </a>
                                <input type="submit"
                                    class="px-6 py-3 border-2 border-[#0F4634] text-[#0F4634] font-semibold rounded-xl hover:bg-[#0F4634] hover:text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-200"
                                    value="Edit Infor">
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