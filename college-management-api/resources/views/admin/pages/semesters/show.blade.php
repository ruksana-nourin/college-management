@extends('admin.layouts.master')

@section('title', 'Semesters - Details')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Semester Details</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        {{-- Page Header --}}
                        <x-admin.phead
                            title="Semester Details"
                            subtitle="View semester information from here."
                        >
                            <a
                                href="{{ route('semesters.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Semesters
                            </a>
                        </x-admin.phead>


                        {{-- Semester Information --}}
                        <div class="row mt-4">

                            {{-- Semester Name --}}
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>
                                        Semester Name
                                    </label>

                                    <h5>
                                        {{ $semester->name }}
                                    </h5>

                                </div>
                            </div>


                            {{-- Academic Session --}}
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>
                                        Academic Session
                                    </label>

                                    <h5>
                                        <span class="badge badge-outline-info">
                                            {{ $semester->academicSession->name }}
                                        </span>
                                    </h5>

                                </div>
                            </div>


                            {{-- Start Date --}}
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>
                                        Start Date
                                    </label>

                                    <h5>
                                        {{ $semester->start_date->format('d M Y') }}
                                    </h5>

                                </div>
                            </div>


                            {{-- End Date --}}
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>
                                        End Date
                                    </label>

                                    <h5>
                                        {{ $semester->end_date->format('d M Y') }}
                                    </h5>

                                </div>
                            </div>


                            {{-- Description --}}
                            <div class="col-md-12">
                                <div class="form-group">

                                    <label>
                                        Description
                                    </label>

                                    <p class="text-muted">
                                        {{ $semester->description ?? 'No description available.' }}
                                    </p>

                                </div>
                            </div>


                            {{-- ID --}}
                            <div class="col-md-4">
                                <div class="form-group">

                                    <label>
                                        ID
                                    </label>

                                    <p>
                                        {{ $semester->id }}
                                    </p>

                                </div>
                            </div>


                            {{-- Created At --}}
                            <div class="col-md-4">
                                <div class="form-group">

                                    <label>
                                        Created At
                                    </label>

                                    <p>
                                        {{ $semester->created_at->format('d M Y, h:i A') }}
                                    </p>

                                </div>
                            </div>


                            {{-- Updated At --}}
                            <div class="col-md-4">
                                <div class="form-group">

                                    <label>
                                        Updated At
                                    </label>

                                    <p>
                                        {{ $semester->updated_at->format('d M Y, h:i A') }}
                                    </p>

                                </div>
                            </div>

                        </div>


                        {{-- Actions --}}
                        <div class="mt-4">

                            <a
                                href="{{ route('semesters.edit', ['semester' => $semester->id]) }}"
                                class="btn btn-primary mr-2"
                            >
                                <i class="mdi mdi-pencil"></i>
                                Edit Semester
                            </a>

                            <a
                                href="{{ route('semesters.index') }}"
                                class="btn btn-dark"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back
                            </a>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection