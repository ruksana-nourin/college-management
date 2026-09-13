@extends('admin.layouts.master')

@section('title', 'Edit User')
@section('content')
    <x-admin.phead title="Edit User" subtitle="Update the user's information below.">
        <a href="{{ route('users.index') }}" class="btn-custom btn-custom-secondary">
            <i class="bi bi-arrow-left"></i> Back to Users
        </a>
    </x-admin.phead>

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

            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
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
                    <label for="basicText" class="form-label-custom">Username</label>
                    <input type="text" name = "name" class="form-control-custom" id="basicText" value="{{ $user->name }}" placeholder="Enter username">
                    <x-admin.error-msg name="name" />
                </div>

                <!-- Email input -->
                <div class="mb-3">
                    <label for="basicEmail" class="form-label-custom">Email Address</label>
                    <input type="text" name="email" class="form-control-custom" id="basicEmail" value="{{ $user->email }}"
                        placeholder="name@example.com">
                    <div class="text-muted">We'll never share your email with anyone else.</div>
                    <x-admin.error-msg name="email" />
                </div>
                <!-- Role input -->
                <div class="mb-3">
                    <label for="basicRole" class="form-label-custom">Role</label>
                    <select class="form-control-custom" id="basicRole" name="role_id">
                        <option value="0" selected disabled>Select a role</option>
                        @foreach ($roles as $item)

                            <option value="{{ $item->id }}" @selected($user->role_id == $item->id)>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-admin.error-msg name="role_id" />
                </div>

                
                <div class="mb-3 text-end">
                    <button type="submit" class="btn-custom btn-custom-secondary">Edit User</button>
                </div>
            </form>

        </div>
@endsection