@extends('admin.layouts.master')

@section('title', 'Subject Details')

@section('content')

<div class="main-panel">

    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Subject Details</h3>
        </div>


        <div class="row">

            <div class="col-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <x-admin.phead
                            title="Subject Details"
                            subtitle="View subject information from here.">

                            <a href="{{ route('subjects.index') }}"
                                class="btn btn-warning btn-rounded btn-fw">

                                <i class="mdi mdi-arrow-left"></i>

                                Back to Subjects

                            </a>

                        </x-admin.phead>


                        <div class="row">

                            {{-- Subject Name --}}
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="form-group">

                                    <label>
                                        Subject Name
                                    </label>

                                    <input type="text"
                                        class="form-control"
                                        value="{{ $subject->name }}"
                                        readonly>

                                </div>

                            </div>


                            {{-- Course --}}
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="form-group">

                                    <label>
                                        Course
                                    </label>

                                    <input type="text"
                                        class="form-control"
                                        value="{{ $subject->course->name ?? 'N/A' }}"
                                        readonly>

                                </div>

                            </div>


                            {{-- Created At --}}
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="form-group">

                                    <label>
                                        Created At
                                    </label>

                                    <input type="text"
                                        class="form-control"
                                        value="{{ $subject->created_at->format('d M, Y') }}"
                                        readonly>

                                </div>

                            </div>


                            {{-- Updated At --}}
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="form-group">

                                    <label>
                                        Updated At
                                    </label>

                                    <input type="text"
                                        class="form-control"
                                        value="{{ $subject->updated_at->format('d M, Y') }}"
                                        readonly>

                                </div>

                            </div>

                        </div>


                        <div class="mt-3">

                            <a href="{{ route('subjects.edit', $subject->id) }}"
                                class="btn btn-primary">

                                <i class="mdi mdi-pencil"></i>

                                Edit

                            </a>

                            <a href="{{ route('subjects.index') }}"
                                class="btn btn-dark">

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