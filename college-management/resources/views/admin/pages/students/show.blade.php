@extends('admin.layouts.master')

@section('title', 'Students - Details')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="page-header">
                <h3 class="page-title">Student Details</h3>
            </div>

            <div class="row">
                <div class="col-12 grid-margin stretch-card">

                    <div class="card">
                        <div class="card-body">

                            {{-- Page Header --}}
                            <x-admin.phead title="Student Details" subtitle="View student information from here.">
                                <a href="{{ route('students.index') }}" class="btn btn-warning btn-rounded btn-fw">
                                    <i class="mdi mdi-arrow-left"></i>
                                    Back to Students
                                </a>
                            </x-admin.phead>


                            {{-- Student Details --}}
                            <div class="row">

                                {{-- Student Profile --}}
                                <div class="col-md-3 text-center mb-4 mb-md-0">

                                    <div class="user-profile">

                                        

                                            @if ($student->image)

                                                <img src="{{ asset($student->image) }}" alt="{{ $student->name }}"
                                                    class="img-fluid rounded" style="max-width: 180px;">

                                            @else

                                                <div>
                                                    <i class="mdi mdi-account-circle" style="font-size: 120px;">
                                                    </i>
                                                </div>

                                            @endif

                                        

                                        <h4 class="mt-3 mb-1">
                                            {{ $student->name }}
                                        </h4>

                                        <p class="text-muted">
                                            Student #{{ $student->student_id }}
                                        </p>

                                    </div>

                                </div>


                                {{-- Student Information --}}
                                <div class="col-md-9">

                                    <div class="row">

                                        {{-- Student Name --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-account"></i>
                                                    Student Name
                                                </span>

                                                <h4 class="info-value">
                                                    {{ $student->name }}
                                                </h4>

                                            </div>

                                        </div>


                                        {{-- Student ID --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-identifier"></i>
                                                    Student ID
                                                </span>

                                                <h4 class="info-value">
                                                    {{ $student->student_id }}
                                                </h4>

                                            </div>

                                        </div>


                                        {{-- Phone --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-phone"></i>
                                                    Phone
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->phone }}
                                                </h6>

                                            </div>

                                        </div>


                                        {{-- Email --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-email"></i>
                                                    Email
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->email ?? 'N/A' }}
                                                </h6>

                                            </div>

                                        </div>


                                        {{-- Gender --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-gender-male-female"></i>
                                                    Gender
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->gender }}
                                                </h6>

                                            </div>

                                        </div>


                                        {{-- Date of Birth --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-calendar"></i>
                                                    Date of Birth
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->date_of_birth
        ? $student->date_of_birth->format('d M, Y')
        : 'N/A'
                                                    }}
                                                </h6>

                                            </div>

                                        </div>


                                        {{-- Blood Group --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-water"></i>
                                                    Blood Group
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->blood_group ?? 'N/A' }}
                                                </h6>

                                            </div>

                                        </div>


                                        {{-- Address --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-map-marker"></i>
                                                    Address
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->address ?? 'N/A' }}
                                                </h6>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- Academic Information --}}
                                    <div class="row mt-2">

                                        <div class="col-12 mb-3">
                                            <h4 class="card-title">
                                                Academic Information
                                            </h4>
                                        </div>


                                        {{-- Department --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-domain"></i>
                                                    Department
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->department->name ?? 'N/A' }}
                                                </h6>

                                            </div>

                                        </div>


                                        {{-- Course --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-book-open-page-variant"></i>
                                                    Course
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->course->name ?? 'N/A' }}
                                                </h6>

                                            </div>

                                        </div>


                                        {{-- Academic Class --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-google-classroom"></i>
                                                    Academic Class
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->academicClass->name ?? 'N/A' }}
                                                </h6>

                                            </div>

                                        </div>


                                        {{-- Section --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-view-grid"></i>
                                                    Section
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->section->name ?? 'N/A' }}
                                                </h6>

                                            </div>

                                        </div>


                                        {{-- Group --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-account-group"></i>
                                                    Group
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->group->name ?? 'N/A' }}
                                                </h6>

                                            </div>

                                        </div>


                                        {{-- Academic Session --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-calendar-range"></i>
                                                    Academic Session
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->academicSession->name ?? 'N/A' }}
                                                </h6>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- Admission & Guardian Information --}}
                                    <div class="row mt-2">

                                        <div class="col-12 mb-3">
                                            <h4 class="card-title">
                                                Admission & Guardian Information
                                            </h4>
                                        </div>


                                        {{-- Admission Date --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-calendar-plus"></i>
                                                    Admission Date
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->admission_date
        ? $student->admission_date->format('d M, Y')
        : 'N/A'
                                                    }}
                                                </h6>

                                            </div>

                                        </div>


                                        {{-- Student Status --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-account-check"></i>
                                                    Student Status
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->studentStatus->name ?? 'N/A' }}
                                                </h6>

                                            </div>

                                        </div>


                                        {{-- Guardian Name --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-account-supervisor"></i>
                                                    Guardian Name
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->guardian_name }}
                                                </h6>

                                            </div>

                                        </div>


                                        {{-- Guardian Phone --}}
                                        <div class="col-md-6 mb-4">

                                            <div class="user-info-box">

                                                <span class="info-label">
                                                    <i class="mdi mdi-phone"></i>
                                                    Guardian Phone
                                                </span>

                                                <h6 class="info-value">
                                                    {{ $student->guardian_phone }}
                                                </h6>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- Actions --}}
                                    <div class="text-right">

                                        <a href="{{ route('students.edit', ['student' => $student->id]) }}"
                                            class="btn btn-primary me-2">
                                            <i class="mdi mdi-pencil"></i>
                                            Edit Student
                                        </a>

                                        <a href="{{ route('students.index') }}" class="btn btn-dark">
                                            Back to Students
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