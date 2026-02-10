@extends('backend.admin')
@section('content')

    @section('site-title')
        Admin | Add Post
    @endsection
    @section('page-main-title')
        EDIT CUSTOMER
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="{{ route('customer.update', $customer->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $customer->id }}">
                    <!-- Upload New Images -->
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-[#0F4634]">
                            Upload New Images (When update image needed close old image for show new image)
                        </label>
                        <input id="images" type="file" name="edit_images[]" multiple accept="image/*"
                            class="form-control block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" />
                    </div>

                    <!-- Old Images Preview -->
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-[#0F4634]">Old Images</label>
                        <div id="old-preview" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                            @foreach ($customer->images ?? [] as $img)
                                <div class="relative w-full h-[200px]">
                                    <img src="{{ asset($img) }}" class="w-full h-full object-cover rounded-lg shadow-md">
                                    <button type="button"
                                            class="remove-old absolute top-1 right-1 bg-white text-red-600 rounded-full w-6 h-6 flex items-center justify-center text-lg font-bold shadow hover:bg-red-100"
                                            data-path="{{ $img }}">×</button>
                                    <!-- hidden input to keep this image -->
                                    <input type="hidden" name="keep_old_images[]" value="{{ $img }}">
                                </div>
                            @endforeach

                        </div>
                    </div>


                    <!-- New Images Preview -->
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-[#0F4634]">New Images Preview</label>
                        <div id="new-preview" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4"></div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-3">
                        <a href="{{ route('customer.index') }}"
                            class="px-6 py-3 border-2 border-[#0F4634] text-[#0F4634] rounded-xl hover:bg-[#0F4634] hover:text-white transition">
                            Cancel
                        </a>
                        <input type="submit" value="Update Now"
                            class="px-6 py-3 border-2 border-[#0F4634] text-[#0F4634] rounded-xl hover:bg-[#0F4634] hover:text-white transition">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        // Preview image when upload multiple image
        // Preview new images
        document.getElementById('images').addEventListener('change', function (event) {
            const preview = document.getElementById('new-preview');
            preview.innerHTML = "";

            [...event.target.files].forEach(file => {
                if (!file.type.startsWith("image/")) return;

                const reader = new FileReader();
                reader.onload = e => {
                    const wrapper = document.createElement("div");
                    wrapper.className = "relative w-full h-[200px]";

                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.className = "w-full h-full object-cover rounded-lg shadow-md";

                    const btn = document.createElement("button");
                    btn.innerHTML = "×";
                    btn.type = "button";
                    btn.className = "absolute top-1 right-1 bg-white text-red-600 rounded-full w-6 h-6 flex items-center justify-center font-bold shadow hover:bg-red-100";

                    btn.addEventListener("click", () => wrapper.remove());

                    wrapper.appendChild(img);
                    wrapper.appendChild(btn);
                    preview.appendChild(wrapper);
                };
                reader.readAsDataURL(file);
            });
        });

        // Remove old image (removes its hidden input too)
        document.querySelectorAll('.remove-old').forEach(btn => {
            btn.addEventListener('click', function () {
                this.parentElement.remove();
            });
        });
    </script>
    <script>
        document.querySelectorAll('.remove-old').forEach(btn => {
    btn.addEventListener('click', function () {
        // remove hidden input too
        const input = this.parentElement.querySelector('input[name="keep_old_images[]"]');
        if (input) input.remove();

        // remove image preview
        this.parentElement.remove();
    });
});

    </script>
@endsection