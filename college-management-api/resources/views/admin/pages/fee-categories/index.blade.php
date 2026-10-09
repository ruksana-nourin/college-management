@extends('admin.layouts.master')

@section('title', 'Fee Categories')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="page-header">
                <h3 class="page-title">Fee Categories</h3>
            </div>

            <div class="row">
                <div class="col-12 grid-margin stretch-card">

                    <div class="card">
                        <div class="card-body">

                            <x-admin.phead title="Fee Categories" subtitle="Manage fee categories from here.">
                                <a href="{{ route('fee-categories.create') }}" class="btn btn-primary btn-rounded btn-fw">
                                    <i class="mdi mdi-plus"></i>
                                    Add Fee Category
                                </a>
                            </x-admin.phead>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="table-responsive">

                                <table class="table table-hover">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @forelse ($feeCategories as $item)
                                            <tr>

                                                <td>{{ $item->id }}</td>

                                                <td>
                                                    {{ $item->name }}
                                                </td>

                                                <td>
                                                    {{ $item->created_at->format('d M, Y') }}
                                                </td>

                                                <td>

                                                    {{-- <a href="{{ route('fee-categories.show', $item->id) }}"
                                                        class="btn btn-info btn-sm" title="View">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a> --}}

                                                    <a href="{{ route('fee-categories.edit', $item->id) }}"
                                                        class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>

                                                    <button type="button" class="btn btn-outline-danger btn-sm delete"
                                                        data-toggle="modal" data-target="#modalDelete"
                                                        data-id="{{ $item->id }}" data-name="{{ $item->name }}">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>

                                                </td>

                                            </tr>

                                        @empty

                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    No fee categories found.
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    {{-- Delete Modal --}}

    <x-admin.modal id="modalDelete" title="Delete Fee Category">

        <div class="text-center">

            <i class="bi bi-trash fs-1 text-danger"></i>

            <p class="mt-2">
                Are you sure you want to delete this fee category?
            </p>

            <span class="name fw-bold badge border border-danger text-danger py-2 px-3">
                Fee Category
            </span>

            <hr>

            <form method="POST">

                @csrf
                @method('DELETE')

                <button type="button" class="btn btn-light px-4" data-dismiss="modal">
                    Cancel
                </button>

                <button type="submit" class="btn btn-danger px-4">
                    Delete
                </button>

            </form>

        </div>

    </x-admin.modal>

@endsection
@section('scripts')

    <script>
        $('#modalDelete').on('show.bs.modal', function(event) {

            let button = $(event.relatedTarget);

            let id = button.data('id');
            let name = button.data('name');

            let modal = $(this);

            modal.find('.name').text(name);

            modal.find('form').attr(
                'action',
                "{{ url('fee-categories') }}/" + id
            );

        });
    </script>

@endsection
