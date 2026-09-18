@extends('admin.layouts.master')

@section('title', 'Sections - Details')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Section Details</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <x-admin.phead
                            title="Section Details"
                            subtitle="View section information from here."
                        >
                            <a
                                href="{{ route('sections.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Sections
                            </a>
                        </x-admin.phead>

                        <div class="row mt-4">

                            {{-- Icon --}}
                            <div class="col-md-3 text-center">

                                <div class="profile-icon">
                                    <i class="mdi mdi-google-classroom"></i>
                                </div>

                            </div>

                            {{-- Details --}}
                            <div class="col-md-9">

                                {{-- Section Name --}}
                                <div class="row mb-3">

                                    <div class="col-md-4 text-muted">
                                        Section Name
                                    </div>

                                    <div class="col-md-8">
                                        {{ $section->name }}
                                    </div>

                                </div>

                                {{-- Section Code --}}
                                <div class="row mb-3">

                                    <div class="col-md-4 text-muted">
                                        Section Code
                                    </div>

                                    <div class="col-md-8">

                                        <span class="badge badge-outline-info">
                                            {{ $section->code }}
                                        </span>

                                    </div>

                                </div>

                                {{-- Academic Class --}}
                                <div class="row mb-3">

                                    <div class="col-md-4 text-muted">
                                        Academic Class
                                    </div>

                                    <div class="col-md-8">
                                        {{ $section->academicClass->name }}
                                    </div>

                                </div>

                                {{-- Course --}}
                                <div class="row mb-3">

                                    <div class="col-md-4 text-muted">
                                        Course
                                    </div>

                                    <div class="col-md-8">
                                        {{ $section->academicClass->course->name }}
                                    </div>

                                </div>

                                {{-- Description --}}
                                <div class="row mb-3">

                                    <div class="col-md-4 text-muted">
                                        Description
                                    </div>

                                    <div class="col-md-8">
                                        {{ $section->description ?? 'No description available.' }}
                                    </div>

                                </div>

                                {{-- ID --}}
                                <div class="row mb-3">

                                    <div class="col-md-4 text-muted">
                                        ID
                                    </div>

                                    <div class="col-md-8">
                                        {{ $section->id }}
                                    </div>

                                </div>

                                {{-- Created At --}}
                                <div class="row mb-3">

                                    <div class="col-md-4 text-muted">
                                        Created At
                                    </div>

                                    <div class="col-md-8">
                                        {{ $section->created_at->format('d M Y, h:i A') }}
                                    </div>

                                </div>

                                {{-- Updated At --}}
                                <div class="row mb-4">

                                    <div class="col-md-4 text-muted">
                                        Updated At
                                    </div>

                                    <div class="col-md-8">
                                        {{ $section->updated_at->format('d M Y, h:i A') }}
                                    </div>

                                </div>

                                {{-- Edit --}}
                                <a
                                    href="{{ route('sections.edit', ['section' => $section->id]) }}"
                                    class="btn btn-primary btn-rounded btn-fw"
                                >
                                    <i class="mdi mdi-pencil"></i>
                                    Edit Section
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