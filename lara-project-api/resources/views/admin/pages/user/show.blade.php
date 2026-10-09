@extends('admin.layouts.master')

@section('title', 'Users - Details')

@section('content')
    <x-admin.phead title="Users - Details" subtitle="Show details information.">
        @if ((auth()->user()->role_id == 5))

            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn-custom btn-custom-secondary">
                <i class="bi bi-pencil"></i> Edit User
            </a>

        @else

            <a href="{{ route('users.index') }}" class="btn-custom btn-custom-outline-secondary" type="button">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        @endif

    </x-admin.phead>

    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-user-cell">
                <span
                    class="bg-dark rounded bg-brand-lime d-flex align-items-center justify-content-center text-lime fw-bold fs-2 px-4 py-3"
                    width="100">{{ Str::substr($user->name, 0, 1) }}</span>
                <div>
                    <div class="h3">{{ $user->name }}</div>
                    <div class="h5 text-muted fw-normal">{{ $user->email }}</div>
                </div>
            </div>
            <hr>
            <p><strong>Name:</strong>{{ $user->name }} </p>
            <p><strong>Email:</strong> {{ $user->email }} </p>
            <p><strong>Role:</strong> {{ $user->role }} </p>

        </div>
        @if (auth()->user()->role_id != 5)
            <div class="mb-3 text-end">
                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn-custom btn-custom-secondary">Edit User</a>
            </div>
        @endif
    </div>
@endsection