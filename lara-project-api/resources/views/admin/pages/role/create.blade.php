@extends('admin.layouts.master')

@section('title', 'Create Role')
@section('content')
    <x-admin.phead title="Create User" subtitle="Fill out the form below to add a new user to the system.">
        <a href="{{ route('roles.index') }}" class="btn-custom btn-custom-secondary">
            <i class="bi bi-arrow-left"></i> Back to Roles
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
            <!-- Action buttons / Filter options -->
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
            </div>
        </div>

        <div class="card border-light shadow-sm p-4 h-100">
            <h5 class="card-title mb-4">Basic Fields</h5>

            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif --}}
                {{-- {{ $errors }} --}}

                <!-- Text input -->
                <div class="mb-3">
                    <label for="basicText" class="form-label-custom">Role Name</label>
                    <input type="text" name="name" class="form-control-custom" id="basicText" value="{{ old('name') }}"
                        placeholder="Enter rolename">
                    <x-admin.error-msg name="name" />
                </div>

               
               
               
                
                <div class="mb-3 text-end">
                    <button type="submit" class="btn-custom btn-custom-secondary">Create Role</button>
                </div>
            </form>
        </div>



    </div>
@endsection