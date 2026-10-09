@extends('admin.layouts.master')

@section('title', 'Exam Results')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="page-header">
                <h3 class="page-title">Exam Results</h3>
            </div>

            <div class="row">
                <div class="col-12 grid-margin stretch-card">

                    <div class="card">
                        <div class="card-body">

                            <x-admin.phead title="Exam Results" subtitle="Manage student examination results from here.">
                                <a href="{{ route('exam-results.create') }}" class="btn btn-primary btn-rounded btn-fw">
                                    <i class="mdi mdi-plus"></i>
                                    Add Result
                                </a>
                            </x-admin.phead>


                            <div class="table-responsive">

                                <table class="table table-hover">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Exam</th>
                                            <th>Student ID</th>
                                            <th>Student</th>
                                            <th>Total Marks</th>
                                            <th>Obtained</th>
                                            <th>Grade</th>
                                            <th>Point</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @forelse ($results as $result)
                                            <tr>

                                                <td>
                                                    {{ $results->firstItem() + $loop->index }}
                                                </td>

                                                <td>
                                                    {{ $result->exam }}
                                                </td>

                                                <td>
                                                    {{ $result->student_id }}
                                                </td>

                                                <td>
                                                    {{ $result->student }}
                                                </td>

                                                <td>
                                                    {{ $result->total_marks }}
                                                </td>

                                                <td>
                                                    {{ $result->total_obtained }}
                                                </td>

                                                <td>
                                                    <span class="badge badge-success">
                                                        {{ $result->grade }}
                                                    </span>
                                                </td>

                                                <td>
                                                    {{ number_format($result->grade_point, 2) }}
                                                </td>

                                                <td>

                                                    <a href="{{ route('exam-results.show', $result->id) }}"
                                                        class="btn btn-info btn-sm" title="View">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>

                                                    <a href="{{ route('exam-results.edit', $result->id) }}"
                                                        class="btn btn-warning btn-sm" title="Edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>

                                                    <button type="button" class="btn btn-sm btn-danger delete"
                                                        data-id="{{ $result->id }}"
                                                        data-name="{{ $result->student }} - {{ $result->exam }}"
                                                        data-toggle="modal" data-target="#modalDelete"
                                                        title="Delete result">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>

                                                </td>

                                            </tr>

                                        @empty

                                            <tr>
                                                <td colspan="9" class="text-center">
                                                    No exam results found.
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>

                                </table>

                            </div>


                            {{-- Pagination --}}
                            <div class="mt-4">
                                {{ $results->links() }}
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <x-admin.modal id="modalDelete" title="Delete Result">

    <div class="text-center">

        <i class="bi bi-trash fs-1 text-danger"></i>

        <p class="mt-2">
            Are you sure you want to delete this result?
        </p>

        <span
            class="name fw-bold badge border border-danger text-danger py-2 px-3"
        >
            Result
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
@endsection

@section('scripts')

<script>

    $(document).on('click', '.delete', function () {

        let id = $(this).data('id');
        let name = $(this).data('name');

        $('#modalDelete .name').text(name);

        $('#modalDelete form').attr(
            'action',
            '/exam-results/' + id
        );

    });

</script>

@endsection
