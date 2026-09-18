@extends('admin.layouts.master')

@section('title', 'Academic Classes List')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <x-admin.phead
                title="Academic Classes"
                subtitle="Academic Classes"
                desc="Manage all academic classes"
            />
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title mb-0">Academic Classes</h4>

                            <a href="{{ route('academic-classes.create') }}"
                               class="btn btn-success btn-rounded btn-fw">
                                <i class="mdi mdi-plus"></i>
                                Add Class
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Course</th>
                                        <th>Class Name</th>
                                        <th>Code</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @forelse($academicClasses as $item)

                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            
                                            <td>
                                                {{ $item->course->name }}
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
                                                <a href="{{ route('academic-classes.show', ['academic_class' => $item->id]) }}"
                                                   class="btn btn-sm btn-outline-info"
                                                   title="View">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>

                                                <a href="{{ route('academic-classes.edit', ['academic_class' => $item->id]) }}"
                                                   class="btn btn-sm btn-outline-primary"
                                                   title="Edit">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>

                                                <button type="button"
                                                        class="btn btn-sm btn-outline-danger delete"
                                                        data-id="{{ $item->id }}"
                                                        data-name="{{ $item->name }}"
                                                        data-toggle="modal"
                                                        data-target="#modalDelete"
                                                        title="Delete">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </td>
                                        </tr>

                                    @empty

                                        <tr>
                                            <td colspan="5" class="text-center">
                                                No academic classes found.
                                            </td>
                                        </tr>

                                    @endforelse

                                </tbody>

                            </table>
                        </div>

                        <div class="pagination-wrapper mt-3">
                            {{ $academicClasses->links() }}
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<x-admin.modal id="modalDelete" title="Delete Academic Class">

    <div class="text-center">

        <i class="bi bi-trash fs-1 text-danger"></i>

        <p class="mt-2">
            Are you sure you want to delete this academic class?
        </p>

        <span class="name fw-bold badge border border-danger text-danger py-2 px-3">
            Class
        </span>

        <hr>

        <form method="POST">

            @csrf
            @method('DELETE')

            <button type="button"
                    class="btn btn-light px-4"
                    data-dismiss="modal">
                Cancel
            </button>

            <button type="submit"
                    class="btn btn-danger px-4">
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
            `{{ route('academic-classes.destroy', ['academic_class' => ':id']) }}`
            .replace(':id', id);

    });

});

</script>

@endsection