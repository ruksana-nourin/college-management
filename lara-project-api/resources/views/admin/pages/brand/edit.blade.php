@extends('admin.layouts.master')

@section('title', 'Edit Brand')

@section('content')

  <x-admin.phead
    title="Edit Brand"
    subtitle="Update your product brand information here.">

    <a href="{{ route('brands.index') }}"
       class="btn-custom btn-custom-secondary">
      <i class="bi bi-arrow-left"></i>
      Back to Brands
    </a>

  </x-admin.phead>


  @if ($errors->any())

    <div class="alert alert-danger">

      <strong>Please fix the following errors:</strong>

      <ul class="mb-0 mt-2">

        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach

      </ul>

    </div>

  @endif


  <div class="table-card-custom">

    <div class="p-4">

      <form action="{{ route('brands.update', ['brand' => $brand->id]) }}"
            method="POST">

        @csrf
        @method('PUT')

        <div class="row">

          <div class="col-md-4 mb-3">

            <label class="form-label">
              Brand ID
            </label>

            <input type="text"
                   class="form-control"
                   value="{{ $brand->id }}"
                   disabled>

          </div>


          <div class="col-md-8 mb-3">

            <label for="name" class="form-label">
              Brand Name <span class="text-danger">*</span>
            </label>

            <input
              type="text"
              name="name"
              id="name"
              class="form-control @error('name') is-invalid @enderror"
              value="{{ old('name', $brand->name) }}"
              placeholder="Enter brand name"
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
            Update Brand
          </button>

          <a href="{{ route('brands.index') }}"
             class="btn btn-light px-4">
            Cancel
          </a>

        </div>

      </form>

    </div>

  </div>

@endsection