@extends('admin.layouts.master')

@section('title', 'Users -Details')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    
@endsection
@section('content')


    <div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">User Details</h3>
        </div>


        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        {{-- Page Header --}}
                        <x-admin.phead
                            title="User Details"
                            subtitle="View user information from here."
                        >
                            <a
                                href="{{ route('users.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Users
                            </a>
                        </x-admin.phead>


                        {{-- User Details --}}
                        <div class="row">

                            {{-- User Profile --}}
                            <div class="col-md-3 text-center mb-4 mb-md-0">

                                <div class="user-profile">

                                    <div class="user-avatar">
                                        <i class="mdi mdi-account"></i>
                                    </div>

                                    <h4 class="mt-3 mb-1">
                                        {{ $user->name }}
                                    </h4>

                                    <p class="text-muted">
                                        User #{{ $user->id }}
                                    </p>

                                </div>

                            </div>


                            {{-- User Information --}}
                            <div class="col-md-9">

                                <div class="row">

                                    {{-- Username --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-account-outline"></i>
                                                Username
                                            </span>

                                            <h4 class="info-value">
                                                {{ $user->name }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Email --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-email-outline"></i>
                                                Email Address
                                            </span>

                                            <h6 class="info-value">
                                                {{ $user->email }}
                                            </h6>

                                        </div>

                                    </div>


                                    {{-- Role --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-account-key-outline"></i>
                                                Role
                                            </span>

                                            <div class="mt-2">

                                                <span class="badge badge-primary">
                                                    {{ $user->role }}
                                                </span>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- User ID --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-identifier"></i>
                                                User ID
                                            </span>

                                            <h6 class="info-value">
                                                #{{ $user->id }}
                                            </h6>

                                        </div>

                                    </div>


                                    {{-- Created At --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-calendar-plus"></i>
                                                Created At
                                            </span>

                                            <h6 class="info-value">
                                                {{ $user->created_at->format('d M, Y') }}
                                            </h6>

                                        </div>

                                    </div>


                                    {{-- Last Updated --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-calendar-edit"></i>
                                                Last Updated
                                            </span>

                                            <h6 class="info-value">
                                                {{ $user->updated_at->format('d M, Y') }}
                                            </h6>

                                        </div>

                                    </div>

                                </div>


                                {{-- Actions --}}
                                <div class="text-right">

                                    <a
                                        href="{{ route('users.edit', ['user' => $user->id]) }}"
                                        class="btn btn-primary me-2"
                                    >
                                        <i class="mdi mdi-pencil"></i>
                                        Edit User
                                    </a>

                                    <a
                                        href="{{ route('users.index') }}"
                                        class="btn btn-dark"
                                    >
                                        Back to Users
                                    </a>

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
