@extends('backend.admin')
@section('content')
    <div class="content-wrapper">
        @section('site-title')
            Admin | List Post
        @endsection
        @section('page-main-title')
            LIST TEAMS
        @endsection

        <div class="container-xxl flex-grow-1 container-p-y" x-data="reorderTable()" x-init="initSortable()">
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" x-ref="tableBody">
                            @foreach ($row as $index => $team)
                                <tr draggable="true" x-bind:data-id="{{ $team->id }}" class="cursor-move"
                                    @dragstart="dragStart($event, {{ $team->id }})" @dragover.prevent
                                    @drop="drop($event, {{ $team->id }})">
                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                            <img src="../assets/team/{{ $team->profile }}" alt="Avatar" class="rounded-circle"
                                                style="width: 50px;
                                                                        object-fit: cover;
                                                                        border-radius: 0px !important;
                                                                    ">
                                        </ul>
                                    </td>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $team->name_en }}</strong>
                                    </td>
                                    <td>{{$team->position_en}}</td>
                                    <td><span class="badge bg-label-primary me-1">{{ $team->created_at }}</span></td>

                                    <td>
                                        <div class="dropdown position-static">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="{{ route('update.team', ['id'=>$team->id]) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                 <a href="javascript:void(0);" class="dropdown-item remove-post-key"
                                                    data-id="{{ $team->id }}" data-bs-toggle="modal"
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
                <form action="{{ route('remove.our.team') }}" method="post">
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

     <script>
        function reorderTable() {
            return {
                initSortable() {
                    this.$nextTick(() => {
                        let tableBody = this.$refs.tableBody;
                        new Sortable(tableBody, {
                            animation: 150,
                            ghostClass: "bg-gray-100",
                            onEnd: async (event) => {
                                let newOrder = [...tableBody.children].map((row, index) => ({
                                    id: row.getAttribute("data-id"),
                                    order: index + 1
                                }));

                                let response = await fetch("{{ route('team.reorder') }}", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                    },
                                    body: JSON.stringify({
                                        newOrder
                                    })
                                });

                                if (response.ok) {
                                    location.reload();
                                } else {
                                    console.error("Failed to reorder.");
                                }
                            }
                        });
                    });
                }
            };
        }
    </script>
@endsection