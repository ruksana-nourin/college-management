@extends('admin.layouts.master')

@section('title', 'Edit Semester')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Edit Semester</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        {{-- Page Header --}}
                        <x-admin.phead
                            title="Edit Semester"
                            subtitle="Update semester information from here."
                        >
                            <a
                                href="{{ route('semesters.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Semesters
                            </a>
                        </x-admin.phead>


                        {{-- Edit Semester Form --}}
                        <form
                            action="{{ route('semesters.update', ['semester' => $semester->id]) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PUT')

                            <div class="row">

                                {{-- Academic Session --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="academic_session_id">
                                            Academic Session
                                        </label>

                                        <select
                                            name="academic_session_id"
                                            id="academic_session_id"
                                            class="form-control @error('academic_session_id') is-invalid @enderror"
                                        >

                                            <option value="">
                                                Select Academic Session
                                            </option>

                                            @foreach($academicSessions as $academicSession)

                                                <option
                                                    value="{{ $academicSession->id }}"
                                                    {{ old('academic_session_id', $semester->academic_session_id) == $academicSession->id ? 'selected' : '' }}
                                                >
                                                    {{ $academicSession->name }}
                                                </option>

                                            @endforeach

                                        </select>

                                        @error('academic_session_id')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                </div>


                                {{-- Semester Name --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="name">
                                            Semester Name
                                        </label>

                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            value="{{ old('name', $semester->name) }}"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="e.g. 1st Semester"
                                        >

                                        @error('name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                </div>


                                {{-- Start Date --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="start_date">
                                            Start Date
                                        </label>

                                        <input
                                            type="date"
                                            name="start_date"
                                            id="start_date"
                                            value="{{ old('start_date', $semester->start_date->format('Y-m-d')) }}"
                                            class="form-control @error('start_date') is-invalid @enderror"
                                        >

                                        @error('start_date')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                </div>


                                {{-- End Date --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="end_date">
                                            End Date
                                        </label>

                                        <input
                                            type="date"
                                            name="end_date"
                                            id="end_date"
                                            value="{{ old('end_date', $semester->end_date->format('Y-m-d')) }}"
                                            class="form-control @error('end_date') is-invalid @enderror"
                                        >

                                        @error('end_date')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                </div>


                                {{-- Description --}}
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="description">
                                            Description
                                        </label>

                                        <textarea
                                            name="description"
                                            id="description"
                                            rows="5"
                                            class="form-control @error('description') is-invalid @enderror"
                                            placeholder="Enter semester description"
                                        >{{ old('description', $semester->description) }}</textarea>

                                        @error('description')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                            </div>


                            {{-- Buttons --}}
                            <button
                                type="submit"
                                class="btn btn-primary mr-2"
                            >
                                <i class="mdi mdi-content-save"></i>
                                Update Semester
                            </button>

                            <a
                                href="{{ route('semesters.index') }}"
                                class="btn btn-dark"
                            >
                                Cancel
                            </a>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection