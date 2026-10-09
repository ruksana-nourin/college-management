@extends('admin.layouts.master')

@section('title', 'Product Details')

@section('content')

    <x-admin.phead title="Product Details" subtitle="View product information.">
        <a href="{{ route('products.index') }}" class="btn-custom btn-custom-secondary">
            <i class="bi bi-arrow-left"></i>
            Back to Products
        </a>

        <a href="{{ route('products.edit', $product->id) }}" class="btn-custom btn-custom-primary">
            <i class="bi bi-pencil"></i>
            Edit Product
        </a>
    </x-admin.phead>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-card-custom">

        <div class="card border-light shadow-sm p-4">

            <div class="row g-4">

                {{-- Product Image --}}
                <div class="col-lg-4 col-md-5">

                    <div class="text-center">
                        @if ($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="300" height="300"
                                style="object-fit: cover; border-radius: 12px;">
                        @else
                            <p>No image available.</p>
                        @endif


                    </div>

                </div>

                {{-- Product Information --}}
                <div class="col-lg-8 col-md-7">

                    <h3 class="mb-4">
                        {{ $product->name }}
                    </h3>

                    <div class="row g-3">

                        {{-- Price --}}
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block">
                                    Price
                                </small>

                                <strong class="fs-5">
                                    {{ number_format($product->price, 2) }}
                                </strong>
                            </div>
                        </div>

                        {{-- Quantity --}}
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block">
                                    Quantity
                                </small>

                                <strong class="fs-5">
                                    {{ $product->quantity }}
                                </strong>
                            </div>
                        </div>

                        {{-- Reorder Level --}}
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block">
                                    Reorder Level
                                </small>

                                <strong>
                                    {{ $product->reorder_level }}
                                </strong>
                            </div>
                        </div>

                        {{-- Category --}}
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block">
                                    Category
                                </small>

                                <strong>
                                    {{ $product->category?->name ?? 'N/A' }}
                                </strong>
                            </div>
                        </div>

                        {{-- Brand --}}
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block">
                                    Brand
                                </small>

                                <strong>
                                    {{ $product->brand?->name ?? 'N/A' }}
                                </strong>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block">
                                    Status
                                </small>

                                @if ($product->active)
                                    <span class="badge bg-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="col-12">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block mb-2">
                                    Description
                                </small>

                                <p class="mb-0">
                                    {{ $product->description ?: 'No description available.' }}
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection