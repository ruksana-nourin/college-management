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
                        <x-admin.phead title="Add User" subtitle="Add a new user from here.">
                            <a href="{{ route('users.index') }}" class="btn btn-warning btn-rounded btn-fw">
                                <i class="mdi mdi-arrow-left"> </i>
                                Back to Users</a>
                        </x-admin.phead>
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">

                                    {{-- <h4 class="card-title">Create User</h4> --}}
                                    <p class="card-description">Fill all the fields for a new user</p>

                                    <form class="forms-sample" action="{{ route('users.store') }}" method="POST">
                                        @csrf

                                        {{-- Username --}}
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="name"
                                                value="{{ old('name') }}" placeholder="Enter username">
                                            <x-admin.error-msg name="name" />

                                        </div>

                                        {{-- Email --}}
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                value="{{ old('email') }}" placeholder="Enter email address">
                                            <x-admin.error-msg name="email" />

                                        </div>

                                        {{-- Role --}}
                                        <div class="form-group">
                                            <label for="roleName">Role Name</label>
                                            <select name="role_id" id="role_id" class="form-control text-white">
                                                <option value="">Select a role</option>

                                                @foreach ($roles as $item)
                                                    <option value="{{ $item->id }}" @selected(old('role_id') == $item->id)>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-admin.error-msg name="role_id" />

                                        </div>

                                        {{-- Password --}}
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Enter password">
                                            <x-admin.error-msg name="password" />

                                        </div>

                                        {{-- Confirm Password --}}
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" placeholder="Confirm password">
                                            <x-admin.error-msg name="password_confirmation" />

                                        </div>

                                        {{-- Buttons --}}

                                        <div class="text-right">

                                            <button type="submit" class="btn btn-primary mr-2 ">
                                                Create User
                                            </button>

                                            <a href="{{ route('users.index') }}" class="btn btn-dark">
                                                Cancel
                                            </a>
                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
