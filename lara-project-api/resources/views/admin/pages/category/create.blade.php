@extends('admin.layouts.master')

@section('title', 'Add Category')

@section('content')

<x-admin.phead
title="Add Category"
subtitle="Create a new product category here.">

<a href="{{ route('categories.index') }}"
   class="btn-custom btn-custom-secondary">
  <i class="bi bi-arrow-left"></i> Back to Categories
</a>


</x-admin.phead>

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('success') }}

  <button type="button"
          class="btn-close"
          data-bs-dismiss="alert"
          aria-label="Close">
  </button>
</div>


@endif

{{-- @if ($errors->any())
<div class="alert alert-danger">

  <strong>Please fix the following errors:</strong>

  <ul class="mb-0 mt-2">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>

</div>


@endif --}}

<div class="table-card-custom">
<div class="p-4">

  <form action="{{ route('categories.store') }}" method="POST">

    @csrf

    <div class="row">

      <div class="col-md-8 mb-3">

        <label for="name" class="form-label">
          Category Name <span class="text-danger">*</span>
        </label>

        <input
          type="text"
          name="name"
          id="name"
          class="form-control @error('name') is-invalid @enderror"
          value="{{ old('name') }}"
          placeholder="Enter category name"
          required
        >

        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror

      </div>

    </div>


    <div class="d-flex gap-2 mt-3">

      <button type="submit" class="btn btn-primary px-4">
        <i class="bi bi-check-circle"></i>
        Save Category
      </button>

      <a href="{{ route('categories.index') }}"
         class="btn btn-light px-4">
        Cancel
      </a>

    </div>

  </form>

</div>

</div>

@endsection