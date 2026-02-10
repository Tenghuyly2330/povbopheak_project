

@extends('backend.admin')

@section('site-title', 'Admin | View News')
@section('page-main-title', 'View News')

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
            <h5 class="mb-0">Latest News</h5>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="text-center">
                        <th width="5%">ID</th>
                        <th width="20%">Title</th>
                        <th width="30%">Description</th>
                        <th width="20%">Images</th>
                        <th width="10%">Created</th>
                        <th width="10%">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($newslatests as $item)
                        <tr>
                            <td class="text-center fw-semibold">{{ $item->id }}</td>

                            <td>
                                <div class="fw-semibold text-dark">
                                    {{ $item->title_en }}
                                </div>
                            </td>

                            <td class="text-muted">
                                {{ Str::limit(strip_tags($item->description_en), 80) }}
                            </td>

                            <td>
                                @if (is_array($item->images) && count($item->images))
                                    <div class="d-flex gap-2 flex-wrap">
                                        @foreach ($item->images as $image)
                                            <img src="{{ asset($image) }}"
                                                 class="rounded border news-thumb">
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-muted fst-italic">No image</span>
                                @endif
                            </td>

                            <td class="text-center">
                                {{ $item->created_at->format('d M Y') }}
                            </td>

                            <!-- ACTION ICONS -->
                            <td class="text-center">
                                <a href="{{ route('newslatest.edit', $item->id) }}"
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

<!-- DELETE MODAL -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="deleteForm" action="{{ route('newslatest.destroy', 0) }}" method="POST">
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