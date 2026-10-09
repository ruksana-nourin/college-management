@extends('admin.layouts.master')

@section('title', 'Academic Classes - Details')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Academic Class Details</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        {{-- Page Header --}}
                        <x-admin.phead
                            title="Academic Class Details"
                            subtitle="View academic class information from here."
                        >
                            <a
                                href="{{ route('academic-classes.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Academic Classes
                            </a>
                        </x-admin.phead>

                        <div class="row mt-4">

                            <div class="col-md-3 text-center">
                                <div class="profile-icon">
                                    <i class="mdi mdi-google-classroom"></i>
                                </div>
                            </div>

                            <div class="col-md-9">

                                <div class="row mb-3">
                                    <div class="col-md-4 text-muted">
                                        Class Name
                                    </div>

                                    <div class="col-md-8">
                                        {{ $academicClass->name }}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4 text-muted">
                                        Class Code
                                    </div>

                                    <div class="col-md-8">
                                        <span class="badge badge-outline-info">
                                            {{ $academicClass->code }}
                                        </span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4 text-muted">
                                        Course
                                    </div>

                                    <div class="col-md-8">
                                        {{ $academicClass->course->name }}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4 text-muted">
                                        Description
                                    </div>

                                    <div class="col-md-8">
                                        {{ $academicClass->description ?? 'No description available.' }}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4 text-muted">
                                        ID
                                    </div>

                                    <div class="col-md-8">
                                        {{ $academicClass->id }}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4 text-muted">
                                        Created At
                                    </div>

                                    <div class="col-md-8">
                                        {{ $academicClass->created_at->format('d M Y, h:i A') }}
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-4 text-muted">
                                        Updated At
                                    </div>

                                    <div class="col-md-8">
                                        {{ $academicClass->updated_at->format('d M Y, h:i A') }}
                                    </div>
                                </div>

                                <a
                                    href="{{ route('academic-classes.edit', ['academic_class' => $academicClass->id]) }}"
                                    class="btn btn-primary btn-rounded btn-fw"
                                >
                                    <i class="mdi mdi-pencil"></i>
                                    Edit Class
                                </a>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection