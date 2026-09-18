@extends('admin.layouts.master')

@section('title', 'Edit Section')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Edit Section</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <x-admin.phead
                            title="Edit Section"
                            subtitle="Update section information from here."
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
                            action="{{ route('sections.update', $section->id) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PUT')

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
                                            {{ old('academic_class_id', $section->academic_class_id) == $academicClass->id ? 'selected' : '' }}
                                        >
                                            {{ $academicClass->name }}
                                            -
                                            {{ $academicClass->course->name }}
                                        </option>

                                    @endforeach

                                </select>

                                @error('academic_class_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Section Name --}}
                            <div class="form-group">
                                <label for="name">
                                    Section Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $section->name) }}"
                                    placeholder="Enter section name"
                                >

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Section Code --}}
                            <div class="form-group">
                                <label for="code">
                                    Section Code
                                </label>

                                <input
                                    type="text"
                                    name="code"
                                    id="code"
                                    class="form-control @error('code') is-invalid @enderror"
                                    value="{{ old('code', $section->code) }}"
                                    placeholder="Enter section code"
                                >

                                @error('code')
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
                                    placeholder="Enter section description"
                                >{{ old('description', $section->description) }}</textarea>

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
                                Update Section
                            </button>

                            <a
                                href="{{ route('sections.index') }}"
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