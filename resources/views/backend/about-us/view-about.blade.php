@extends('backend.admin')
@section('content')
    <div class="content-wrapper">
        @section('site-title')
            Admin | List about
        @endsection
        @section('page-main-title')
            LIST ABOUT US
        @endsection

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($row as $about)
                                <tr>
                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                            <img src="../assets/about_us/{{ $about->image }}" alt="Avatar" class="rounded-circle"
                                                style="width: 50px;
                                                                    object-fit: cover;
                                                                    border-radius: 0px !important;
                                                                    ">
                                        </ul>
                                    </td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $about->title_en }}</strong>
                                    </td>
                                    <td>
                                        <div x-data="{ expanded: false }">
                                            <!-- Short Preview -->
                                            <span x-show="!expanded">
                                                {{ Str::limit($about->description_en, 20) }}
                                            </span>

                                            <!-- Full Text -->
                                            <span x-show="expanded">
                                                {{ $about->description_en }}
                                            </span>

                                            <!-- Buttons -->
                                            @if(strlen($about->description_en) > 20)
                                                <button 
                                                    class="text-blue-600 underline ml-1"
                                                    x-show="!expanded"
                                                    @click="expanded = true">
                                                    Read more
                                                </button>

                                                <button 
                                                    class="text-blue-600 underline ml-1"
                                                    x-show="expanded"
                                                    @click="expanded = false">
                                                    Read less
                                                </button>
                                            @endif
                                        </div>
                                    </td>

                                    <td><span class="badge bg-label-primary me-1">{{ $about->created_at }}</span></td>

                                    <td>
                                        <div class="dropdown position-static">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="{{ route('update.about', ['id'=>$about->id]) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                 <a href="javascript:void(0);" class="dropdown-item remove-post-key d-none"
                                                    data-id="{{ $about->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#basicModal">
                                                    <i class="bx bx-trash me-1"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-3">
                <form action="{{ route('remove.about') }}" method="post">
                    @csrf
                    <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Are you sure to remove this post?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" class="remove-val" name="remove_id" id="remove_id">
                                    <button type="submit" class="btn btn-danger">Confirm</button>
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>

            <hr class="my-5" />
        </div>
        <!-- / Content -->
    </div>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
</script>

@endsection