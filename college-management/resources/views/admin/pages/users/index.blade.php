@extends('admin.layouts.master')

@section('content')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
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
                                            <th>Username</th>
                                            <th class="w-25">Email</th>
                                            <th>Role</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item )
                                            
                                        <tr>
                                            <td>Messsy</td>
                                            <td>Flash</td>
                                            <td><label class="badge badge-warning">In progress</label></td>
                                            <td class="text-center">
                                                <a href="show.html" class="btn btn-sm btn-outline-info"><i
                                                        class="mdi mdi-eye"></i></a>
                                                <a href="edit.html" class="btn btn-sm btn-outline-primary"><i
                                                        class="mdi mdi-pencil"></i></a>
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Delete this record?');"><i
                                                        class="mdi mdi-delete"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <p class="text-muted small mt-2 mb-0">Showing 5 sample records — connect this page to a backend
                            to load real data.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2026 College
                Management System</span>
        </div>
    </footer>
</div>

@endsection
