@extends('backend.admin')
@section('content')

@section('site-title')
    Admin | View Projects
@endsection
@section('page-main-title')
    Views Project
@endsection

@section('content')
    <div class="row mx-4 my-2">
        <div class="card">
            <h5 class="card-header">
                @yield('site-title')
            </h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>Project Name</th>
                            <th>Type Of Project</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($projects as $project)
                            <tr>
                                {{-- Project Name --}}
                                <td>{{ $project->name_en }}</td>

                                {{-- Type --}}
                                <td>{{ $project->type_en }}</td>

                                {{-- Category --}}
                                <td class="">
                                    @if (!empty($project->category))
                                        @foreach ($project->category as $cat)
                                            <strong>{{ $cat['name']['en'] ?? '' }}</strong>
                                            {{-- @if (!empty($cat['cat_type']))
                                                <ul class="list-disc ml-4">
                                                    @foreach ($cat['cat_type'] as $type)
                                                        <li>{{ $type['title']['en'][1] ?? '' }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif --}}
                                        @endforeach
                                    @else
                                        <span class="text-muted">No categories</span>
                                    @endif
                                </td>

                                {{-- Created At --}}
                                <td>{{ $project->created_at->format('Y-m-d') }}</td>

                                {{-- Actions --}}
                                <td>
                                    <div class="dropdown position-static">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- Edit -->
                                            <a class="dropdown-item" href="{{ route('project.edit', $project->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>

                                            <form action="{{ route('project.destroy', $project->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    type="button"
                                                    class="dropdown-item text-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteProjectModal"
                                                    data-id="{{ $project->id }}"
                                                >
                                                    <i class="bx bx-trash me-1"></i> Delete
                                                </button>
                                            </form>


                                        </div>
                                    </div>
                                </td>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No projects found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                {{-- <small class="text-light fw-semibold">Default</small> --}}
                <div class="mt-3">

                    <!-- Modal -->
                    <div class="modal fade" id="deleteProjectModal" tabindex="-1" aria-labelledby="deleteProjectModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form id="deleteProjectForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteProjectModalLabel">Confirm Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this project?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


<script>
    const deleteModal = document.getElementById('deleteProjectModal');
    const deleteForm = document.getElementById('deleteProjectForm');

    deleteModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;
        const projectId = button.getAttribute('data-id');

        deleteForm.action = `{{ url('project') }}/${projectId}`;
    });
</script>

@endsection


