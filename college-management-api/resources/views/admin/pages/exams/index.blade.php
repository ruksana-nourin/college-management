@extends('admin.layouts.master')

@section('title', 'Exams List')

@section('content')
@section('styles')
@endsection

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Exams</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <x-admin.phead
                            title="Exams"
                            subtitle="Manage all examinations from here."
                        >
                            <a href="{{ route('exams.create') }}"
                                class="btn btn-success btn-rounded btn-fw">
                                <i class="mdi mdi-plus"></i>
                                Add Exam
                            </a>
                        </x-admin.phead>


                        {{-- Success Message --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show"
                                role="alert">

                                {{ session('success') }}

                                <button type="button"
                                    class="close"
                                    data-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                        @endif


                        {{-- Search --}}
                        <div class="input-group w-25 mb-3">
                            <input type="text"
                                class="form-control"
                                placeholder="Search...">

                            <div class="input-group-append">
                                <button class="btn btn-outline-primary"
                                    type="button">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                            </div>
                        </div>


                        {{-- Exam Table --}}
                        <div class="table-responsive">

                            <table class="table table-hover">

                                <thead>
                                    <tr>
                                        <th>ID.</th>
                                        <th>Exam Name</th>
                                        <th class="text-center">Course</th>
                                        <th>Academic Session</th>
                                        <th>Semester</th>
                                        <th >Class</th>
                                        <th>Exam Date</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @forelse ($exams as $item)

                                        <tr>

                                            <td>
                                                {{ $item->id }}
                                            </td>

                                            <td>
                                                {{ $item->name }}
                                            </td>
                                            <td>
                                                {{ $item->course }}
                                            </td>

                                            <td>
                                                {{ $item->academic_session }}
                                            </td>

                                            <td>
                                                {{ $item->semester }}
                                            </td>

                                            <td>
                                                {{ $item->academic_class }}
                                            </td>

                                            <td>
                                                {{ \Carbon\Carbon::parse($item->exam_date)->format('d M, Y') }}
                                            </td>

                                            <td class="text-center">

                                                {{-- View --}}
                                                <a href="{{ route('exams.show', ['exam' => $item->id]) }}"
                                                    class="btn btn-sm btn-outline-info"
                                                    title="View">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>

                                                {{-- Edit --}}
                                                <a href="{{ route('exams.edit', ['exam' => $item->id]) }}"
                                                    class="btn btn-sm btn-outline-primary"
                                                    title="Edit">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>

                                                {{-- Delete --}}
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-danger delete"
                                                    data-id="{{ $item->id }}"
                                                    data-name="{{ $item->name }}"
                                                    data-toggle="modal"
                                                    data-target="#modalDelete"
                                                    title="Delete row">

                                                    <i class="mdi mdi-delete"></i>

                                                </button>

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>
                                            <td colspan="7"
                                                class="text-center">
                                                No exams found.
                                            </td>
                                        </tr>

                                    @endforelse

                                </tbody>

                            </table>


                            {{-- Pagination --}}
                            <div class="pagination-wrapper">
                                {{ $exams->links() }}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


{{-- Delete Modal --}}
<x-admin.modal id="modalDelete" title="Delete Exam">

    <div class="text-center">

        <i class="bi bi-trash fs-1 text-danger"></i>

        <p class="mt-2">
            Are you sure you want to delete this exam?
        </p>

        <span class="name fw-bold badge border border-danger text-danger py-2 px-3">
            Exam
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
                `{{ route('exams.destroy', ['exam' => ':id']) }}`
                .replace(':id', id);

        });

    });
</script>

@endsection