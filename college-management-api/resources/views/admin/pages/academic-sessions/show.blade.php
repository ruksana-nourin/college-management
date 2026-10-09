@extends('admin.layouts.master')

@section('title', 'Academic Sessions - Details')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Academic Session Details</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <x-admin.phead
                            title="Academic Session Details"
                            subtitle="View academic session information from here."
                        >
                            <a
                                href="{{ route('academic-sessions.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Sessions
                            </a>
                        </x-admin.phead>

                        <div class="row mt-4">

                            {{-- Icon --}}
                            <div class="col-md-3 text-center">

                                <div class="profile-icon">
                                    <i class="mdi mdi-calendar-clock"></i>
                                </div>

                            </div>

                            <div class="col-md-9">

                                {{-- Session Name --}}
                                <div class="row mb-3">
                                    <div class="col-md-4 text-muted">
                                        Session Name
                                    </div>

                                    <div class="col-md-8">
                                        {{ $academicSession->name }}
                                    </div>
                                </div>

                                {{-- Session Code --}}
                                <div class="row mb-3">
                                    <div class="col-md-4 text-muted">
                                        Session Code
                                    </div>

                                    <div class="col-md-8">
                                        <span class="badge badge-outline-info">
                                            {{ $academicSession->code }}
                                        </span>
                                    </div>
                                </div>

                                {{-- Start Date --}}
                                <div class="row mb-3">
                                    <div class="col-md-4 text-muted">
                                        Start Date
                                    </div>

                                    <div class="col-md-8">
                                        {{ $academicSession->start_date->format('d M Y') }}
                                    </div>
                                </div>

                                {{-- End Date --}}
                                <div class="row mb-3">
                                    <div class="col-md-4 text-muted">
                                        End Date
                                    </div>

                                    <div class="col-md-8">
                                        {{ $academicSession->end_date->format('d M Y') }}
                                    </div>
                                </div>

                                {{-- Description --}}
                                <div class="row mb-3">
                                    <div class="col-md-4 text-muted">
                                        Description
                                    </div>

                                    <div class="col-md-8">
                                        {{ $academicSession->description ?? 'No description available.' }}
                                    </div>
                                </div>

                                {{-- ID --}}
                                <div class="row mb-3">
                                    <div class="col-md-4 text-muted">
                                        ID
                                    </div>

                                    <div class="col-md-8">
                                        {{ $academicSession->id }}
                                    </div>
                                </div>

                                {{-- Created At --}}
                                <div class="row mb-3">
                                    <div class="col-md-4 text-muted">
                                        Created At
                                    </div>

                                    <div class="col-md-8">
                                        {{ $academicSession->created_at->format('d M Y, h:i A') }}
                                    </div>
                                </div>

                                {{-- Updated At --}}
                                <div class="row mb-4">
                                    <div class="col-md-4 text-muted">
                                        Updated At
                                    </div>

                                    <div class="col-md-8">
                                        {{ $academicSession->updated_at->format('d M Y, h:i A') }}
                                    </div>
                                </div>

                                {{-- Edit Button --}}
                                <a
                                    href="{{ route('academic-sessions.edit', ['academic_session' => $academicSession->id]) }}"
                                    class="btn btn-primary btn-rounded btn-fw"
                                >
                                    <i class="mdi mdi-pencil"></i>
                                    Edit Session
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