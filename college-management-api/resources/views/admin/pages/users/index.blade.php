@extends('admin.layouts.master')

@section('title', 'Users List')

@section('content')
@section('styles')
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"> --}}
@endsection

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Users</h3>

        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <x-admin.phead title="Users" subtitle="Manage all of users from here.">
                            <a href="{{ route('users.create') }}" class="btn btn-success btn-rounded btn-fw">
                                <i class="mdi mdi-plus"> </i>
                                Add User</a>
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
                                <button class="btn btn-outline-primary" type="button"><i
                                        class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID.</th>
                                            <th>Username</th>
                                            <th class="w-25">Email</th>
                                            <th>Role</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    @if ($item->role == 'Admin')
                                                        <label class="badge role-admin btn-rounded">
                                                            {{ $item->role }}
                                                        </label>
                                                    @elseif ($item->role == 'Teacher')
                                                        <label class="badge role-teacher btn-rounded">
                                                            {{ $item->role }}
                                                        </label>
                                                    @elseif ($item->role == 'Student')
                                                        <label class="badge role-student btn-rounded">
                                                            {{ $item->role }}
                                                        </label>
                                                    @else
                                                        <label class="badge role-default btn-rounded">
                                                            {{ $item->role }}
                                                        </label>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('users.show', ['user' => $item->id]) }}"
                                                        class="btn btn-sm btn-outline-info"><i
                                                            class="mdi mdi-eye"></i></a>
                                                    <a href="{{ route('users.edit', ['user' => $item->id]) }}"
                                                        class="btn btn-sm btn-outline-primary"><i
                                                            class="mdi mdi-pencil"></i></a>
                                                    <button type="button" class="btn btn-sm btn-outline-danger delete"
                                                        data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                        data-toggle="modal" data-target="#modalDelete"
                                                        title="Delete row"><i class="mdi mdi-delete"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="pagination-wrapper">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
{{-- Delete Modal --}}
<x-admin.modal id="modalDelete" title="Delete User">
    <div class="text-center">
        <i class="bi bi-trash fs-1 text-danger"></i>
        <p class="mt-2">Are you sure you want to delete this user?</p>
        <span class="name fw-bold badge border border-danger text-danger py-2 px-3">Mina</span>
        <hr>
        <form method="POST">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-light px-4" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger px-4">Delete</button>
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
            // alert(id);
            document.querySelector('#modalDelete .name').innerText = name;
            // document.querySelector('#modalDelete form').action = '/users/' + id;
            document.querySelector('#modalDelete form').action =
                `{{ route('users.destroy', ['user' => ':id']) }}`.replace(':id', id);
        })
    })
</script>
@endsection
