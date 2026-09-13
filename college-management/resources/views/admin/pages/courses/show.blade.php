@extends('admin.layouts.master')

@section('title', 'Courses - Details')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Course Details</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <x-admin.phead
                            title="Course Details"
                            subtitle="View course information from here."
                        >
                            <a
                                href="{{ route('courses.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Courses
                            </a>
                        </x-admin.phead>

                        <div class="row">

                            {{-- Course Profile --}}
                            <div class="col-md-3 text-center mb-4 mb-md-0">

                                <div class="user-profile">

                                    <div class="user-avatar">
                                        <i class="mdi mdi-book-open-page-variant"></i>
                                    </div>

                                    <h4 class="mt-3 mb-1">
                                        {{ $course->name }}
                                    </h4>

                                    <p class="text-muted">
                                        Course #{{ $course->id }}
                                    </p>

                                </div>

                            </div>


                            {{-- Course Information --}}
                            <div class="col-md-9">

                                <div class="row">

                                    {{-- Course Name --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-book-open-variant"></i>
                                                Course Name
                                            </span>

                                            <h4 class="info-value">
                                                {{ $course->name }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Course Code --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-identifier"></i>
                                                Course Code
                                            </span>

                                            <h4 class="info-value">
                                                {{ $course->code }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Department --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-domain"></i>
                                                Department
                                            </span>

                                            <h4 class="info-value">
                                                {{ $course->department }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Duration --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-calendar-clock"></i>
                                                Duration
                                            </span>

                                            <h4 class="info-value">
                                                {{ $course->duration }} Years
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Course ID --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-pound"></i>
                                                Course ID
                                            </span>

                                            <h6 class="info-value">
                                                #{{ $course->id }}
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
                                                {{ \Carbon\Carbon::parse($course->created_at)->format('d M, Y') }}
                                            </h6>

                                        </div>

                                    </div>


                                    {{-- Description --}}
                                    <div class="col-md-12 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-text-box"></i>
                                                Description
                                            </span>

                                            <h6 class="info-value">
                                                {{ $course->description ?? 'No description available.' }}
                                            </h6>

                                        </div>

                                    </div>

                                </div>


                                {{-- Actions --}}
                                <div class="text-right">

                                    <a
                                        href="{{ route('courses.edit', ['course' => $course->id]) }}"
                                        class="btn btn-primary me-2"
                                    >
                                        <i class="mdi mdi-pencil"></i>
                                        Edit Course
                                    </a>

                                    <a
                                        href="{{ route('courses.index') }}"
                                        class="btn btn-dark"
                                    >
                                        Back to Courses
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