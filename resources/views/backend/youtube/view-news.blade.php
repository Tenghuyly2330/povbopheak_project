

@extends('backend.admin')

@section('site-title', 'Admin | LIST')
@section('page-main-title', 'View Link')

@section('content')
<style>
    .news-thumb {
    width: 48px;
    height: 48px;
    object-fit: cover;
}

.btn-icon {
    width: 34px;
    height: 34px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
</style>
<div class="container-fluid px-4 mt-3">
    <div class="card shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Linke Of Youtube</h5>
        </div>
         <div class="flex gap-3 justify-end">
            <a href="{{ route('youtube.create') }}">
                <input type="button"
                    class="px-6 py-2 border-2 border-[#0F4634] text-[#0F4634] font-semibold rounded-xl hover:bg-[#0F4634] hover:text-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-200"
                    value="+ Add New">
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="text-center">
                        {{-- <th width="5%">ID</th> --}}
                        <th width="20%">Link of Youtube</th>
                        <th width="10%">Created</th>
                        <th width="10%">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($link as $item)
                        <tr>
                            <td class="text-center fw-semibold d-none">{{ $item->id }}</td>
                            <td class="text-center">{{ $item->link }}</td>
                            <td class="text-center">
                                {{ $item->created_at->format('d M Y') }}
                            </td>

                            <!-- ACTION ICONS -->
                            <td class="text-center">
                                <a href="{{ route('youtube.edit', $item->id) }}"
                                   class="btn btn-icon btn-sm btn-outline-warning me-1"
                                   data-bs-toggle="tooltip"
                                   title="Edit">
                                    <i class="bx bx-edit-alt"></i>
                                </a>

                                <button class="btn btn-icon btn-sm btn-outline-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#basicModal"
                                        onclick="setRemoveId({{ $item->id }})"
                                        title="Delete">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                No news found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container-fluid px-4 mt-3">
    <div class="card shadow-sm border-0 p-4">
        <!-- Video Title -->
        <h3 class="text-lg font-semibold text-[#03244a] mb-2">
           How to get Link from Video Youtube for show on Website <br><br>
           Please Copy link on Src Select in "..." this
        </h3>

       <div class="grid grid-cols-1 md:grid-cols-2 mt-10">
         <!-- Video -->
        <video 
            src="{{ asset('assets/about_us/pov.mp4') }}" 
            controls 
            autoplay 
            muted 
            loop 
            class="w-full rounded-md shadow"
            poster="{{ asset('assets/about_us/pov_thumbnail.jpg') }}"
        >
            Your browser does not support the video tag.
        </video>
       </div>
    </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="deleteForm" action="{{ route('youtube.destroy', 0) }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h5 class="modal-title text-danger">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <p class="mb-0">Are you sure you want to delete this news?</p>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">
                        <i class="bx bx-trash"></i> Delete
                    </button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
<script>
    function setRemoveId(id) {
        let form = document.getElementById('deleteForm');
        form.action = form.action.replace(/\/\d+$/, '/' + id);
    }
</script>