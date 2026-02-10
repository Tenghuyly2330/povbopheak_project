@extends('backend.admin')
@section('content')

    @section('site-title')
        Admin | Add Post
    @endsection
    @section('page-main-title')
        ADD CUSTOMER
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        @if (Session::has('message'))
                            <p class="text-danger text-center">{{ Session::get('message') }}</p>
                        @endif
                        <div class="card-body">
                            <div class="row col-12">
                                <div class="mb-5">
                                    <label for="images" class="block mb-2 text-sm font-medium text-[#0F4634]">
                                        Upload Images (Can Multiple) 
                                    </label>

                                    <input id="images" type="file" name="images[]" multiple accept="image/*" class="form-control block w-full text-sm text-gray-700 border border-gray-300 
                    rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 
                    focus:ring-[#0F4634] focus:border-[#0F4634]" />

                                    <!-- Preview container -->
                                    <div id="preview" class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-3">
                                <a href=""
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
    <script>
        // Preview image when upload multiple image
        document.getElementById('images').addEventListener('change', function (event) {
            const preview = document.getElementById('preview');
            preview.innerHTML = ""; // clear previous previews

            const files = event.target.files;
            if (files) {
                [...files].forEach((file, index) => {
                    if (!file.type.startsWith("image/")) return;

                    const reader = new FileReader();
                    reader.onload = e => {
                        // Wrapper div for image and close button
                        const wrapper = document.createElement("div");
                        wrapper.className = "relative w-full h-[200px]";

                        // Image element
                        const img = document.createElement("img");
                        img.src = e.target.result;
                        img.className = "w-full h-full object-cover rounded-lg shadow-md";

                        // Close button (X)
                        const btn = document.createElement("button");
                        btn.innerHTML = "×";
                        btn.type = "button";
                        btn.className = "absolute top-1 right-1 bg-white text-red-600 rounded-full w-6 h-6 flex items-center justify-center text-lg font-bold shadow hover:bg-red-100 transition";

                        // Remove image preview on click
                        btn.addEventListener("click", () => wrapper.remove());

                        wrapper.appendChild(img);
                        wrapper.appendChild(btn);
                        preview.appendChild(wrapper);
                    };
                    reader.readAsDataURL(file);
                });
            }
        });

    </script>
@endsection