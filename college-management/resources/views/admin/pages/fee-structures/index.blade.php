@extends('admin.layouts.master')

@section('content')
    <div class="main-panel">

        <div class="content-wrapper">

            <div class="page-header">

                <h3 class="page-title">
                    Fee Structures
                </h3>

            </div>

            <div class="row">

                <div class="col-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <x-admin.phead title="Fee Structures" subtitle="Manage fee structures from here.">
                                <a href="{{ route('fee-structures.create') }}" class="btn btn-primary btn-rounded btn-fw">
                                    <i class="mdi mdi-plus"></i>
                                    Add Fee Structure
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


                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>
                            @endif


                            <div class="table-responsive">

                                <table class="table">

                                    <thead>

                                        <tr>

                                            <th>
                                                ID
                                            </th>

                                            <th>
                                                Academic Session
                                            </th>

                                            <th>
                                                Semester
                                            </th>

                                            <th>
                                                Fee Category
                                            </th>

                                            <th>
                                                Amount
                                            </th>

                                            <th>
                                                Created At
                                            </th>

                                            <th>
                                                Action
                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody>

                                        @forelse ($feeStructures as $item)
                                            <tr>

                                                <td>
                                                    {{ $item->id }}
                                                </td>

                                                <td>
                                                    {{ $item->semester->academicSession->name }}
                                                </td>

                                                <td>
                                                    <label class="badge badge-primary btn-rounded">
                                                        {{ $item->semester->name }}
                                                    </label>
                                                </td>

                                                <td>
                                                    {{ $item->feeCategory->name }}
                                                </td>

                                                <td>
                                                    ৳{{ number_format($item->amount, 2) }}
                                                </td>

                                                <td>
                                                    {{ $item->created_at->format('d M, Y') }}
                                                </td>

                                                <td>

                                                    <a href="{{ route('fee-structures.edit', $item->id) }}"
                                                        class="btn btn-outline-primary btn-sm" title="Edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                        data-target="#modalDelete" data-id="{{ $item->id }}"
                                                        data-name="{{ $item->feeCategory->name }}" title="Delete">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>

                                                </td>

                                            </tr>

                                        @empty

                                            <tr>

                                                <td colspan="7" class="text-center">
                                                    No fee structures found.
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

    <x-admin.modal id="modalDelete" title="Delete Fee Structure">

        <div class="text-center">

            <i class="bi bi-trash fs-1 text-danger"></i>

            <p class="mt-2">
                Are you sure you want to delete this fee structure?
            </p>

            <span class="name fw-bold badge border border-danger text-danger py-2 px-3">
                Fee Structure
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
                "{{ url('fee-structures') }}/" + id
            );

        });
    </script>
@endsection
