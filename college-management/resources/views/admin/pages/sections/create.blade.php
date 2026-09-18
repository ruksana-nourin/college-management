@extends('admin.layouts.master')

@section('title', 'Sections - Create')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Create Section</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <x-admin.phead
                            title="Create Section"
                            subtitle="Add a new section from here."
                        >
                            <a
                                href="{{ route('sections.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Sections
                            </a>
                        </x-admin.phead>

                        <form
                            action="{{ route('sections.store') }}"
                            method="POST"
                        >

                            @csrf

                            {{-- Academic Class --}}
                            <div class="form-group">
                                <label for="academic_class_id">
                                    Academic Class
                                </label>

                                <select
                                    name="academic_class_id"
                                    id="academic_class_id"
                                    class="form-control @error('academic_class_id') is-invalid @enderror"
                                >
                                    <option value="">
                                        Select Academic Class
                                    </option>

                                    @foreach($academicClasses as $academicClass)
                                        <option
                                            value="{{ $academicClass->id }}"
                                            {{ old('academic_class_id') == $academicClass->id ? 'selected' : '' }}
                                        >
                                            {{ $academicClass->name }}
                                            -
                                            {{ $academicClass->course->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('academic_class_id')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Section Name --}}
                            <div class="form-group">
                                <label for="name">Section Name</label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter section name"
                                >

                                @error('name')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Section Code --}}
                            <div class="form-group">
                                <label for="code">Section Code</label>

                                <input
                                    type="text"
                                    name="code"
                                    id="code"
                                    value="{{ old('code') }}"
                                    class="form-control @error('code') is-invalid @enderror"
                                    placeholder="Enter section code"
                                >

                                @error('code')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="form-group">
                                <label for="description">Description</label>

                                <textarea
                                    name="description"
                                    id="description"
                                    rows="4"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Enter description"
                                >{{ old('description') }}</textarea>

                                @error('description')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button
                                type="submit"
                                class="btn btn-primary btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-content-save"></i>
                                Create Section
                            </button>

                            <a
                                href="{{ route('sections.index') }}"
                                class="btn btn-dark btn-rounded btn-fw"
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