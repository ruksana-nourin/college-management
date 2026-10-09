@extends('admin.layouts.master')

@section('title', 'Teachers - Details')

@section('styles') <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

```
<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Teacher Details</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        {{-- Page Header --}}
                        <x-admin.phead title="Teacher Details"
                            subtitle="View teacher information from here.">

                            <a href="{{ route('teachers.index') }}"
                                class="btn btn-warning btn-rounded btn-fw">
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Teachers
                            </a>

                        </x-admin.phead>


                        {{-- Teacher Details --}}
                        <div class="row">

                            {{-- Teacher Profile --}}
                            <div class="col-md-3 text-center mb-4 mb-md-0">

                                <div class="user-profile">

                                    @if ($teacher->img)

                                        <img src="{{ asset($teacher->img) }}"
                                            alt="{{ $teacher->name }}"
                                            class="img-fluid rounded"
                                            style="max-width: 180px;">

                                    @else

                                        <div>
                                            <i class="mdi mdi-account-circle"
                                                style="font-size: 120px;">
                                            </i>
                                        </div>

                                    @endif

                                    <h4 class="mt-3 mb-1">
                                        {{ $teacher->name }}
                                    </h4>

                                    <p class="text-muted">
                                        Teacher #{{ $teacher->teacher_code }}
                                    </p>

                                </div>

                            </div>


                            {{-- Teacher Information --}}
                            <div class="col-md-9">

                                <div class="row">

                                    {{-- Teacher Name --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-account"></i>
                                                Teacher Name
                                            </span>

                                            <h4 class="info-value">
                                                {{ $teacher->name }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Teacher Code --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-identifier"></i>
                                                Teacher Code
                                            </span>

                                            <h4 class="info-value">
                                                {{ $teacher->teacher_code }}
                                            </h4>

                                        </div>

                                    </div>


                                    {{-- Phone --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-phone"></i>
                                                Phone
                                            </span>

                                            <h6 class="info-value">
                                                {{ $teacher->phone }}
                                            </h6>

                                        </div>

                                    </div>


                                    {{-- Email --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-email"></i>
                                                Email
                                            </span>

                                            <h6 class="info-value">
                                                {{ $teacher->email ?? 'N/A' }}
                                            </h6>

                                        </div>

                                    </div>

                                </div>


                                {{-- Academic Information --}}
                                <div class="row mt-2">

                                    <div class="col-12 mb-3">
                                        <h4 class="card-title">
                                            Academic Information
                                        </h4>
                                    </div>


                                    {{-- Department --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-domain"></i>
                                                Department
                                            </span>

                                            <h6 class="info-value">
                                                {{ $teacher->department ?? 'N/A' }}
                                            </h6>

                                        </div>

                                    </div>


                                    {{-- Created At --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-calendar-plus"></i>
                                                Created At
                                            </span>

                                            <h6 class="info-value">
                                                {{ $teacher->created_at
                                                    ? $teacher->created_at->format('d M, Y h:i A')
                                                    : 'N/A'
                                                }}
                                            </h6>

                                        </div>

                                    </div>


                                    {{-- Updated At --}}
                                    <div class="col-md-6 mb-4">

                                        <div class="user-info-box">

                                            <span class="info-label">
                                                <i class="mdi mdi-calendar-edit"></i>
                                                Updated At
                                            </span>

                                            <h6 class="info-value">
                                                {{ $teacher->updated_at
                                                    ? $teacher->updated_at->format('d M, Y h:i A')
                                                    : 'N/A'
                                                }}
                                            </h6>

                                        </div>

                                    </div>

                                </div>


                                {{-- Actions --}}
                                <div class="text-right">

                                    <a href="{{ route('teachers.edit', ['teacher' => $teacher->id]) }}"
                                        class="btn btn-primary me-2">
                                        <i class="mdi mdi-pencil"></i>
                                        Edit Teacher
                                    </a>

                                    <a href="{{ route('teachers.index') }}"
                                        class="btn btn-dark">
                                        Back to Teachers
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
```

@endsection
