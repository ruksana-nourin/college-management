@extends('admin.layouts.master')

@section('title', 'Departments - Details')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Department Details</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        {{-- Page Header --}}
                        <x-admin.phead
                            title="Department Details"
                            subtitle="View department information from here."
                        >
                            <a
                                href="{{ route('departments.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Departments
                            </a>
                        </x-admin.phead>


                        {{-- Department Details --}}
                        <div class="row">

                            {{-- Department Profile --}}
                            <div class="col-md-3 text-center mb-4 mb-md-0">

                                <div class="user-profile">

                                    <div class="user-avatar">
                                        <i class="mdi mdi-domain"></i>
                                    </div>

                                    <h4 class="mt-3 mb-1">
                                        {{ $department->name }}
                                    </h4>

                                    <p class="text-muted">
                                        Department #{{ $department->id }}
                                    </p>

                                </div>

                            </div>


                            {{-- Department Information --}}
                            <div class="col-md-9">

                                <div class="row">

                                    {{-- Department Name --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-domain"></i>
                                                Department Name
                                            </span>

                                            <h4 class="info-value">
                                                {{ $department->name }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Department Code --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-identifier"></i>
                                                Department Code
                                            </span>

                                            <h4 class="info-value">
                                                {{ $department->code }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Department ID --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-pound"></i>
                                                Department ID
                                            </span>

                                            <h6 class="info-value">
                                                #{{ $department->id }}
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
                                                {{ $department->created_at->format('d M, Y') }}
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
                                                {{ $department->updated_at->format('d M, Y') }}
                                            </h6>

                                        </div>

                                    </div>

                                </div>


                                {{-- Actions --}}
                                <div class="text-right">

                                    <a
                                        href="{{ route('departments.edit', ['department' => $department->id]) }}"
                                        class="btn btn-primary me-2"
                                    >
                                        <i class="mdi mdi-pencil"></i>
                                        Edit Department
                                    </a>

                                    <a
                                        href="{{ route('departments.index') }}"
                                        class="btn btn-dark"
                                    >
                                        Back to Departments
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