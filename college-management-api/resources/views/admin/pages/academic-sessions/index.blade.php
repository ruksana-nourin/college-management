@extends('admin.layouts.master')

@section('title', 'Academic Sessions List')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Academic Sessions</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <x-admin.phead
                            title="Academic Sessions List"
                            subtitle="Manage academic sessions from here."
                        >
                            <a
                                href="{{ route('academic-sessions.create') }}"
                                class="btn btn-primary btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-plus"></i>
                                Add Session
                            </a>
                        </x-admin.phead>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}

                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="alert"
                                    aria-label="Close"
                                >
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ session('error') }}

                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="alert"
                                    aria-label="Close"
                                >
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Search academic session..."
                                >
                            </div>
                        </div>

                        <div class="table-responsive">

                            <table class="table table-hover">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Session</th>
                                        <th>Code</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @forelse($academicSessions as $item)

                                        <tr>

                                            <td>{{ $item->id }}</td>

                                            <td>
                                                {{ $item->name }}
                                            </td>

                                            <td>
                                                <span class="badge badge-outline-info">
                                                    {{ $item->code }}
                                                </span>
                                            </td>

                                            <td>
                                                {{ $item->start_date->format('d M Y') }}
                                            </td>

                                            <td>
                                                {{ $item->end_date->format('d M Y') }}
                                            </td>

                                            <td>

                                                <a
                                                    href="{{ route('academic-sessions.show', ['academic_session' => $item->id]) }}"
                                                    class="btn btn-sm btn-outline-info"
                                                    title="View"
                                                >
                                                    <i class="mdi mdi-eye"></i>
                                                </a>

                                                <a
                                                    href="{{ route('academic-sessions.edit', ['academic_session' => $item->id]) }}"
                                                    class="btn btn-sm btn-outline-primary"
                                                    title="Edit"
                                                >
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>

                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-outline-danger delete"
                                                    data-id="{{ $item->id }}"
                                                    data-name="{{ $item->name }}"
                                                    data-toggle="modal"
                                                    data-target="#modalDelete"
                                                    title="Delete"
                                                >
                                                    <i class="mdi mdi-delete"></i>
                                                </button>

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>
                                            <td colspan="6" class="text-center">
                                                No academic sessions found.
                                            </td>
                                        </tr>

                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                        <div class="pagination-wrapper">
                            {{ $academicSessions->links() }}
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
<x-admin.modal id="modalDelete" title="Delete Academic Session">

    <div class="text-center">

        <i class="bi bi-trash fs-1 text-danger"></i>

        <p class="mt-2">
            Are you sure you want to delete this academic session?
        </p>

        <span class="name fw-bold badge border border-danger text-danger py-2 px-3">
            Academic Session
        </span>

        <hr>

        <form method="POST">

            @csrf
            @method('DELETE')

            <button
                type="button"
                class="btn btn-light px-4"
                data-dismiss="modal"
            >
                Cancel
            </button>

            <button
                type="submit"
                class="btn btn-danger px-4"
            >
                Delete
            </button>

        </form>

    </div>

</x-admin.modal>
@section('scripts')
<script>
    $(document).on('click', '.delete', function () {

        let id = $(this).data('id');
        let name = $(this).data('name');

        $('#modalDelete .name').text(name);

        $('#modalDelete form').attr(
            'action',
            '/academic-sessions/' + id
        );
    });
</script>
@endsection