@extends('admin.layouts.master')

@section('title', 'Teachers List')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="page-header">
                <h3 class="page-title">Teachers</h3>
            </div>

            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <x-admin.phead title="Teachers" subtitle="Manage all of teachers from here.">

                                <a href="{{ route('teachers.create') }}" class="btn btn-success btn-rounded btn-fw">

                                    <i class="mdi mdi-plus"></i>
                                    Add Teacher

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


                            <div class="input-group w-25 mb-3">

                                <input type="text" class="form-control" placeholder="Search...">

                                <div class="input-group-append">

                                    <button class="btn btn-outline-primary" type="button">

                                        <i class="mdi mdi-magnify"></i>

                                    </button>

                                </div>

                            </div>


                            <div class="table-responsive">

                                <table class="table table-hover">

                                    <thead>

                                        <tr>

                                            <th>ID.</th>

                                            <th>Teacher</th>

                                            <th>Teacher ID</th>

                                            <th>Department</th>

                                            <th>Phone</th>

                                            <th>Created At</th>

                                            <th class="text-center">
                                                Actions
                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody>

                                        @forelse ($teachers as $item)
                                            <tr>

                                                <td>
                                                    {{ $item->id }}
                                                </td>



                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        @if ($item->img)
                                                            <img src="{{ asset($item->img) }}" alt="{{ $item->name }}"
                                                                width="40" height="40" class="rounded-circle me-2">
                                                        @endif

                                                        <span class="p-1">
                                                            {{ $item->name }}
                                                        </span>

                                                    </div>
                                                </td>


                                                <td>

                                                    <label class="badge badge-primary btn-rounded">

                                                        {{ $item->teacher_code }}

                                                    </label>

                                                </td>




                                                <td>
                                                    {{ $item->department->name ?? 'N/A' }}
                                                </td>


                                                <td>
                                                    {{ $item->phone }}
                                                </td>


                                                <td>
                                                    {{ $item->created_at->format('d M, Y') }}
                                                </td>


                                                <td class="text-center">

                                                    {{-- View --}}

                                                    <a href="{{ route('teachers.show', ['teacher' => $item->id]) }}"
                                                        class="btn btn-sm btn-outline-info">

                                                        <i class="mdi mdi-eye"></i>

                                                    </a>


                                                    {{-- Edit --}}

                                                    <a href="{{ route('teachers.edit', ['teacher' => $item->id]) }}"
                                                        class="btn btn-sm btn-outline-primary">

                                                        <i class="mdi mdi-pencil"></i>

                                                    </a>


                                                    {{-- Delete --}}

                                                    <button type="button" class="btn btn-sm btn-outline-danger delete"
                                                        data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                        data-toggle="modal" data-target="#modalDelete" title="Delete row">

                                                        <i class="mdi mdi-delete"></i>

                                                    </button>

                                                </td>

                                            </tr>

                                        @empty

                                            <tr>

                                                <td colspan="7" class="text-center">

                                                    No teachers found.

                                                </td>

                                            </tr>
                                        @endforelse

                                    </tbody>

                                </table>


                                <div class="pagination-wrapper">

                                    {{ $teachers->links() }}

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    {{-- Delete Modal --}}

    <x-admin.modal id="modalDelete" title="Delete Teacher">

        <div class="text-center">

            <i class="bi bi-trash fs-1 text-danger"></i>

            <p class="mt-2">

                Are you sure you want to delete this teacher?

            </p>

            <span class="name fw-bold badge border border-danger text-danger py-2 px-3">

                Teacher

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
        document.querySelectorAll('.delete').forEach(button => {

            button.addEventListener('click', function() {

                let id = this.dataset.id;

                let name = this.dataset.name;


                document.querySelector('#modalDelete .name').innerText = name;


                document.querySelector('#modalDelete form').action =

                    `{{ route('teachers.destroy', ['teacher' => ':id']) }}`
                    .replace(':id', id);

            });

        });
    </script>

@endsection
