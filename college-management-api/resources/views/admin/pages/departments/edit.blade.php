@extends('admin.layouts.master')

@section('title', 'Edit Department')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Edit Department</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <x-admin.phead
                            title="Edit Department"
                            subtitle="Update department information from here."
                        >
                            <a href="{{ route('departments.index') }}"
                                class="btn btn-warning btn-rounded btn-fw">
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Departments
                            </a>
                        </x-admin.phead>


                        {{-- Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        {{-- Edit Department Form --}}
                        <form
                            class="forms-sample"
                            action="{{ route('departments.update', ['department' => $department->id]) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PUT')


                            {{-- Department Name --}}
                            <div class="form-group">

                                <label for="name">
                                    Department Name
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', $department->name) }}"
                                    placeholder="Enter department name"
                                >

                            </div>


                            {{-- Department Code --}}
                            <div class="form-group">

                                <label for="code">
                                    Department Code
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="code"
                                    name="code"
                                    value="{{ old('code', $department->code) }}"
                                    placeholder="Enter department code"
                                >

                            </div>


                            {{-- Buttons --}}
                            <button type="submit"
                                class="btn btn-primary me-2">
                                <i class="mdi mdi-content-save"></i>
                                Update Department
                            </button>

                            <a href="{{ route('departments.index') }}"
                                class="btn btn-dark">
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