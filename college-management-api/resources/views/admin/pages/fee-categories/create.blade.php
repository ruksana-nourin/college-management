@extends('admin.layouts.master')

@section('title', 'Add Fee Category')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Add Fee Category</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <x-admin.phead
                            title="Add Fee Category"
                            subtitle="Create a new fee category from here."
                        >
                            <a
                                href="{{ route('fee-categories.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Fee Categories
                            </a>
                        </x-admin.phead>

                        <form
                            action="{{ route('fee-categories.store') }}"
                            method="POST"
                        >

                            @csrf

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="name">
                                            Fee Category Name
                                        </label>

                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="form-control"
                                            value="{{ old('name') }}"
                                            placeholder="Enter fee category name"
                                        >

                                        @error('name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                            <div class="text-right">

                                <a
                                    href="{{ route('fee-categories.index') }}"
                                    class="btn btn-light px-4"
                                >
                                    Cancel
                                </a>

                                <button
                                    type="submit"
                                    class="btn btn-primary px-4"
                                >
                                    <i class="mdi mdi-content-save"></i>
                                    Save
                                </button>

                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection