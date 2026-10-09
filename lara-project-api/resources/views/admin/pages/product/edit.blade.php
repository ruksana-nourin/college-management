@extends('admin.layouts.master')

@section('title', 'Edit Product')

@section('content')
<x-admin.phead
title="Edit Product"
subtitle="Update the product information below."
>
<a href="{{ route('products.index') }}" class="btn-custom btn-custom-secondary">
<i class="bi bi-arrow-left"></i> Back to Products
</a>
</x-admin.phead>

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="table-card-custom">

    <!-- Header Controls -->
    <div class="table-header-control">
        <div class="table-search-box">
            <i class="bi bi-search table-search-icon"></i>
            <input
                type="text"
                class="table-search-input"
                placeholder="Search orders or products..."
            >
        </div>
    </div>

    <div class="card border-light shadow-sm p-4 h-100">
        <h5 class="card-title mb-4">Product Fields</h5>

        <form
            action="{{ route('products.update', $product->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <div class="row g-3">

                {{-- Name --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label for="basicText" class="form-label-custom">
                        Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control-custom"
                        id="basicText"
                        placeholder="Enter product name"
                        value="{{ old('name', $product->name) }}"
                    >

                    <x-admin.error-msg name="name" />
                </div>

                {{-- Price --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">
                        Price
                    </label>

                    <input
                        type="text"
                        name="price"
                        class="form-control-custom"
                        value="{{ old('price', $product->price) }}"
                    >

                    <x-admin.error-msg name="price" />
                </div>

                {{-- Quantity --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">
                        Quantity
                    </label>

                    <input
                        type="text"
                        name="quantity"
                        class="form-control-custom"
                        value="{{ old('quantity', $product->quantity) }}"
                    >

                    <x-admin.error-msg name="quantity" />
                </div>

                {{-- Reorder Level --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">
                        Reorder Level
                    </label>

                    <input
                        type="number"
                        name="reorder_level"
                        class="form-control-custom"
                        value="{{ old('reorder_level', $product->reorder_level) }}"
                    >

                    <x-admin.error-msg name="reorder_level" />
                </div>

                {{-- Category --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">
                        Category
                    </label>

                    <select name="category_id" class="form-select-custom">
                        <option value="" disabled>
                            Select one...
                        </option>

                        @foreach ($categories as $item)
                            <option
                                value="{{ $item->id }}"
                                @selected(old('category_id', $product->category_id) == $item->id)
                            >
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>

                    <x-admin.error-msg name="category_id" />
                </div>

                {{-- Brand --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">
                        Brand
                    </label>

                    <select name="brand_id" class="form-select-custom">
                        <option value="" disabled>
                            Select one...
                        </option>

                        @foreach ($brands as $item)
                            <option
                                value="{{ $item->id }}"
                                @selected(old('brand_id', $product->brand_id) == $item->id)
                            >
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>

                    <x-admin.error-msg name="brand_id" />
                </div>

                {{-- Description --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">
                        Desc
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="3"
                    >{{ old('description', $product->description) }}</textarea>

                    <x-admin.error-msg name="description" />
                </div>

                {{-- Image --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">
                        Image
                    </label>

                    <input
                        type="file"
                        name="image"
                        class="form-control-custom"
                    >

                    <x-admin.error-msg name="image" />

                    {{-- Existing Image --}}
                    @if ($product->image)
                        <div class="mt-2">
                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                width="100"
                                height="100"
                                style="object-fit: cover; border-radius: 8px;"
                            >
                        </div>
                    @endif
                </div>

                {{-- Active --}}
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="form-switch-custom">

                        <input
                            class="form-switch-input-custom"
                            type="checkbox"
                            id="switchOne"
                            name="active"
                            value="1"
                            @checked(old('active', $product->active))
                        >

                        <label
                            class="form-switch-label"
                            for="switchOne"
                        >
                            Active
                        </label>

                    </div>
                </div>

            </div>

            <div class="mb-3 text-end">
                <button
                    type="submit"
                    class="btn-custom btn-custom-secondary"
                >
                    Update Product
                </button>
            </div>

        </form>
    </div>

</div>


@endsection