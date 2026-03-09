@extends('backend.admin')
@section('content')

    @section('site-title')
        Admin | Add Post
    @endsection
    @section('page-main-title')
        EDIT NEWS
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="{{ route('youtube.update', $youtube->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $youtube->id }}">
                        <div class="mb-3 col-12">
                            <label for="formFile" class="form-label text-[#0F4634]">Link Of Youtube</label>
                            <input class="form-control" type="text" name="link" value="{{ $youtube->link }}" />
                        </div>
                       

                    <!-- Actions -->
                    <div class="flex gap-3">
                        <a href="{{ route('youtube.index') }}"
                            class="px-6 py-3 border-2 border-[#0F4634] text-[#0F4634] rounded-xl hover:bg-[#0F4634] hover:text-white transition">
                            Cancel
                        </a>
                        <input type="submit" value="Update"
                            class="px-6 py-3 border-2 border-[#0F4634] text-[#0F4634] rounded-xl hover:bg-[#0F4634] hover:text-white transition">
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
