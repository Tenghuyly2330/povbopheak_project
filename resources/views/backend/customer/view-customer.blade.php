@extends('backend.admin')
@section('content')

@section('site-title')
    Admin | View Event
@endsection
@section('page-main-title')
    Views Customer
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
                            <th>ID</th>
                            <th>Picture of Cutomer</th>
                            <th>Created_AT</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>

                                <td>
                                    @if (is_array($customer->images) && count($customer->images) > 0)
                                        <div class="d-flex gap-2 flex-wrap">
                                            @foreach ($customer->images as $image)
                                                <img src="{{ asset($image) }}" class="rounded border" width="60" height="60"
                                                    style="object-fit: cover;">
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <td>{{ $customer->created_at->format('d M Y') }}</td>

                                <td>
                                    <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <button class="btn btn-sm btn-danger d-none" data-bs-toggle="modal" data-bs-target="#basicModal"
                                        onclick="setRemoveId({{ $customer->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    No customers found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <small class="text-light fw-semibold">Default</small>
                <div class="mt-3">

                    <!-- Modal -->
                    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="deleteForm" action="{{ route('customer.destroy', 0) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Are you sure to remove this customer?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Confirm</button>
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
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