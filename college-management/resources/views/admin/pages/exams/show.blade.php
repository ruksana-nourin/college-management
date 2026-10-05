@extends('admin.layouts.master')

@section('title', 'Exams - Details')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Exam Details</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        {{-- Page Header --}}
                        <x-admin.phead
                            title="Exam Details"
                            subtitle="View examination information from here."
                        >
                            <a
                                href="{{ route('exams.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Exams
                            </a>
                        </x-admin.phead>


                        {{-- Exam Details --}}
                        <div class="row">

                            {{-- Exam Profile --}}
                            <div class="col-md-3 text-center mb-4 mb-md-0">

                                <div class="user-profile">

                                    <div class="user-avatar">
                                        <i class="mdi mdi-file-document-outline"></i>
                                    </div>

                                    <h4 class="mt-3 mb-1">
                                        {{ $exam->name }}
                                    </h4>

                                    <p class="text-muted">
                                        Exam #{{ $exam->id }}
                                    </p>

                                </div>

                            </div>


                            {{-- Exam Information --}}
                            <div class="col-md-9">

                                <div class="row">

                                    {{-- Exam Name --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-file-document-outline"></i>
                                                Exam Name
                                            </span>

                                            <h4 class="info-value">
                                                {{ $exam->name }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Academic Session --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-calendar-range"></i>
                                                Academic Session
                                            </span>

                                            <h4 class="info-value">
                                                {{ $exam->academic_session }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Semester --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-book-open-page-variant"></i>
                                                Semester
                                            </span>

                                            <h4 class="info-value">
                                                {{ $exam->semester }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Course --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-book-multiple"></i>
                                                Course
                                            </span>

                                            <h4 class="info-value">
                                                {{ $exam->course }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Academic Class --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-google-classroom"></i>
                                                Academic Class
                                            </span>

                                            <h4 class="info-value">
                                                {{ $exam->academic_class }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Section --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-view-grid-outline"></i>
                                                Section
                                            </span>

                                            <h4 class="info-value">
                                                {{ $exam->section }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Group --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-account-group"></i>
                                                Group
                                            </span>

                                            <h4 class="info-value">
                                                {{ $exam->group }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Exam Date --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-calendar"></i>
                                                Exam Date
                                            </span>

                                            <h4 class="info-value">
                                                {{ \Carbon\Carbon::parse($exam->exam_date)->format('d M, Y') }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Exam ID --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-pound"></i>
                                                Exam ID
                                            </span>

                                            <h6 class="info-value">
                                                #{{ $exam->id }}
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
                                                {{ $exam->created_at->format('d M, Y') }}
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
                                                {{ $exam->updated_at->format('d M, Y') }}
                                            </h6>

                                        </div>

                                    </div>

                                </div>


                                {{-- Actions --}}
                                <div class="text-right">

                                    <a
                                        href="{{ route('exams.edit', ['exam' => $exam->id]) }}"
                                        class="btn btn-primary me-2"
                                    >
                                        <i class="mdi mdi-pencil"></i>
                                        Edit Exam
                                    </a>

                                    <a
                                        href="{{ route('exams.index') }}"
                                        class="btn btn-dark"
                                    >
                                        Back to Exams
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