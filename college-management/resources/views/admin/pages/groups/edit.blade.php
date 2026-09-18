@extends('admin.layouts.master')

@section('title', 'Edit Group')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Edit Group</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <x-admin.phead
                            title="Edit Group"
                            subtitle="Update group information from here."
                        >
                            <a
                                href="{{ route('groups.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Groups
                            </a>
                        </x-admin.phead>

                        <form
                            action="{{ route('groups.update', $group->id) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PUT')

                            {{-- Group Name --}}
                            <div class="form-group">

                                <label for="name">
                                    Group Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $group->name) }}"
                                    placeholder="Enter group name"
                                >

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            {{-- Group Code --}}
                            <div class="form-group">

                                <label for="code">
                                    Group Code
                                </label>

                                <input
                                    type="text"
                                    name="code"
                                    id="code"
                                    class="form-control @error('code') is-invalid @enderror"
                                    value="{{ old('code', $group->code) }}"
                                    placeholder="Enter group code"
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
                                    placeholder="Enter group description"
                                >{{ old('description', $group->description) }}</textarea>

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
                                Update Group
                            </button>

                            <a
                                href="{{ route('groups.index') }}"
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