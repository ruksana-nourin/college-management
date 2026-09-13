@extends('admin.layouts.master')

@section('title', 'Create Products')
@section('content')
    <x-admin.phead title="Create Product" subtitle="Fill out the form below to add a new product to the system.">
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
            <!-- Search bar -->
            <div class="table-search-box">
                <i class="bi bi-search table-search-icon"></i>
                <input type="text" class="table-search-input" placeholder="Search orders or products...">
            </div>
            {{-- <!-- Action buttons / Filter options -->
            <div class="table-filter-group">
                <div class="dropdown">
                    <button class="btn-table-action dropdown-toggle" type="button" id="dropdownFilterStatus"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-funnel"></i> Status Filter
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownFilterStatus">
                        <li><a class="dropdown-item" href="#">All Statuses</a></li>
                        <li><a class="dropdown-item" href="#">Paid / Success</a></li>
                        <li><a class="dropdown-item" href="#">Processing</a></li>
                        <li><a class="dropdown-item" href="#">Cancelled / Failed</a></li>
                    </ul>
                </div>
                <button class="btn-table-action" type="button">
                    <i class="bi bi-file-earmark-arrow-down"></i> Export
                </button>
            </div> --}}
        </div>

        <div class="card border-light shadow-sm p-4 h-100">
            <h5 class="card-title mb-4">Product Fields</h5>

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif --}}
                {{-- {{ $errors }} --}}

                <div class="row g-3">
                    <div class="col-lg-4 col-sm-6 col-12">
                        <label for="basicText" class="form-label-custom">Name</label>
                        <input type="text" name="name" class="form-control-custom" id="basicText"
                            placeholder="Enter username" value="{{ old('name') }}">
                        <x-admin.error-msg name="name" />
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <label class="form-label-custom">Price</label>
                        <input type="text" name="price" class="form-control-custom">
                        <x-admin.error-msg name="price" />
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <label class="form-label-custom">Quantity</label>
                        <input type="text" name="quantity" class="form-control-custom">
                        <x-admin.error-msg name="quantity" />

                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <label class="form-label-custom">Reorder Level</label>
                        <input type="number" name="reorder_level" class="form-control-custom">
                        <x-admin.error-msg name="reorder_level" />

                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <label class="form-label-custom">Category</label>
                        <select name="category_id" class="form-select-custom">
                            <option value="0" selected disabled>Select one...</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" @selected(old('category_id') == $item->id)>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <x-admin.error-msg name="category_id" />

                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <label class="form-label-custom">Brand</label>
                        <select name="brand_id" class="form-select-custom">
                            <option value="0" selected disabled>Select one...</option>
                            @foreach ($brands as $item)
                                <option value="{{ $item->id }}" @selected(old('brand_id') == $item->id)>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <x-admin.error-msg name="brand_id" />

                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <label class="form-label-custom">Desc</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <label class="form-label-custom">Image</label>
                        <input type="file" name="image" class="form-control-custom">
                        <x-admin.error-msg name="image" />
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-switch-custom">
                            <input class="form-switch-input-custom" type="checkbox" id="switchOne" checked="" name="active">
                            <label class="form-switch-label" for="switchOne">Active</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3 text-end">
                    <button type="submit" class="btn-custom btn-custom-secondary">Create product</button>
                </div>
            </form>
        </div>



    </div>
@endsection