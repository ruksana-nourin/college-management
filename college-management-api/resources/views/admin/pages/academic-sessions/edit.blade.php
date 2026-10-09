@extends('admin.layouts.master')

@section('title', 'Edit Academic Session')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Edit Academic Session</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <x-admin.phead
                            title="Edit Academic Session"
                            subtitle="Update academic session information from here."
                        >
                            <a
                                href="{{ route('academic-sessions.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Sessions
                            </a>
                        </x-admin.phead>

                        <form
                            action="{{ route('academic-sessions.update', $academicSession->id) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PUT')

                            {{-- Session Name --}}
                            <div class="form-group">
                                <label for="name">
                                    Session Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $academicSession->name) }}"
                                    placeholder="Example: 2028-2029"
                                >

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Session Code --}}
                            <div class="form-group">
                                <label for="code">
                                    Session Code
                                </label>

                                <input
                                    type="text"
                                    name="code"
                                    id="code"
                                    class="form-control @error('code') is-invalid @enderror"
                                    value="{{ old('code', $academicSession->code) }}"
                                    placeholder="Example: 2028-29"
                                >

                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Start Date --}}
                            <div class="form-group">
                                <label for="start_date">
                                    Start Date
                                </label>

                                <input
                                    type="date"
                                    name="start_date"
                                    id="start_date"
                                    class="form-control @error('start_date') is-invalid @enderror"
                                    value="{{ old('start_date', $academicSession->start_date->format('Y-m-d')) }}"
                                >

                                @error('start_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- End Date --}}
                            <div class="form-group">
                                <label for="end_date">
                                    End Date
                                </label>

                                <input
                                    type="date"
                                    name="end_date"
                                    id="end_date"
                                    class="form-control @error('end_date') is-invalid @enderror"
                                    value="{{ old('end_date', $academicSession->end_date->format('Y-m-d')) }}"
                                >

                                @error('end_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="form-group">
                                <label for="description">
                                    Description
                                </label>

                                <textarea
                                    name="description"
                                    id="description"
                                    rows="5"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Enter academic session description"
                                >{{ old('description', $academicSession->description) }}</textarea>

                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Buttons --}}
                            <button
                                type="submit"
                                class="btn btn-primary mr-2"
                            >
                                <i class="mdi mdi-content-save"></i>
                                Update Session
                            </button>

                            <a
                                href="{{ route('academic-sessions.index') }}"
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