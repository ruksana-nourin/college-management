@extends('admin.layouts.master')

@section('title', 'Sections List')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="page-header">
                <h3 class="page-title">Sections</h3>
            </div>

            <div class="row">
                <div class="col-12 grid-margin stretch-card">

                    <div class="card">
                        <div class="card-body">

                            <x-admin.phead title="Sections List" subtitle="Manage academic class sections from here.">
                                <a href="{{ route('sections.create') }}" class="btn btn-primary btn-rounded btn-fw">
                                    <i class="mdi mdi-plus"></i>
                                    Add Section
                                </a>
                            </x-admin.phead>

                            {{-- Success Message --}}
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session('success') }}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {{-- Error Message --}}
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ session('error') }}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {{-- Search --}}
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Search section...">
                                </div>
                            </div>

                            <div class="table-responsive">

                                <table class="table table-hover">

                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Section</th>
                                            <th>Code</th>
                                            <th>Academic Class</th>
                                            <th>Course</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @forelse($sections as $item)
                                            <tr>

                                                <td>
                                                    {{ $item->id }}
                                                </td>

                                                <td>
                                                    {{ $item->name }}
                                                </td>

                                                <td>
                                                    <span class="badge badge-outline-info">
                                                        {{ $item->code }}
                                                    </span>
                                                </td>

                                                <td>
                                                    {{ $item->academicClass->name }}
                                                </td>

                                                <td>
                                                    {{ $item->academicClass->course->name }}
                                                </td>

                                                <td>

                                                    {{-- View --}}
                                                    <a href="{{ route('sections.show', ['section' => $item->id]) }}"
                                                        class="btn btn-sm btn-outline-info" title="View">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>

                                                    {{-- Edit --}}
                                                    <a href="{{ route('sections.edit', ['section' => $item->id]) }}"
                                                        class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>

                                                    {{-- Delete --}}
                                                    <button type="button" class="btn btn-sm btn-outline-danger delete"
                                                        data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                        data-toggle="modal" data-target="#modalDelete" title="Delete">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>




                                                </td>

                                            </tr>

                                        @empty

                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    No sections found.
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                            {{-- Pagination --}}
                            <div class="pagination-wrapper">
                                {{ $sections->links() }}
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    {{-- Delete Modal --}}
    <x-admin.modal id="modalDelete" title="Delete Section">
        <div class="text-center">
            <i class="bi bi-trash fs-1 text-danger"></i>

            <p>
                Are you sure you want to delete this  Section
                ?
            </p>
            <span class="name fw-bold badge border border-danger text-danger py-2 px-3">
               <strong id="deleteName"></strong>
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
        $(document).on('click', '.delete', function() {

            let id = $(this).data('id');
            let name = $(this).data('name');

            $('#deleteName').text(name);

            $('#modalDelete form').attr(
                'action',
                '/sections/' + id
            );
        });
    </script>
@endsection
