@extends('admin.layouts.master')

@section('title', 'Groups - Details')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Group Details</h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <x-admin.phead
                            title="Group Details"
                            subtitle="View group information from here."
                        >
                            <a
                                href="{{ route('groups.index') }}"
                                class="btn btn-warning btn-rounded btn-fw"
                            >
                                <i class="mdi mdi-arrow-left"></i>
                                Back to Groups
                            </a>
                        </x-admin.phead>

                        <div class="row mt-4">

                            {{-- Icon --}}
                            <div class="col-md-3 text-center">

                                <div class="profile-icon">
                                    <i class="mdi mdi-account-group"></i>
                                </div>

                            </div>

                            {{-- Details --}}
                            <div class="col-md-9">

                                {{-- Group Name --}}
                                <div class="row mb-3">

                                    <div class="col-md-4 text-muted">
                                        Group Name
                                    </div>

                                    <div class="col-md-8">
                                        {{ $group->name }}
                                    </div>

                                </div>

                                {{-- Group Code --}}
                                <div class="row mb-3">

                                    <div class="col-md-4 text-muted">
                                        Group Code
                                    </div>

                                    <div class="col-md-8">

                                        <span class="badge badge-outline-info">
                                            {{ $group->code }}
                                        </span>

                                    </div>

                                </div>

                                {{-- Description --}}
                                <div class="row mb-3">

                                    <div class="col-md-4 text-muted">
                                        Description
                                    </div>

                                    <div class="col-md-8">
                                        {{ $group->description ?? 'No description available.' }}
                                    </div>

                                </div>

                                {{-- ID --}}
                                <div class="row mb-3">

                                    <div class="col-md-4 text-muted">
                                        ID
                                    </div>

                                    <div class="col-md-8">
                                        {{ $group->id }}
                                    </div>

                                </div>

                                {{-- Created At --}}
                                <div class="row mb-3">

                                    <div class="col-md-4 text-muted">
                                        Created At
                                    </div>

                                    <div class="col-md-8">
                                        {{ $group->created_at->format('d M Y, h:i A') }}
                                    </div>

                                </div>

                                {{-- Updated At --}}
                                <div class="row mb-4">

                                    <div class="col-md-4 text-muted">
                                        Updated At
                                    </div>

                                    <div class="col-md-8">
                                        {{ $group->updated_at->format('d M Y, h:i A') }}
                                    </div>

                                </div>

                                {{-- Edit --}}
                                <a
                                    href="{{ route('groups.edit', ['group' => $group->id]) }}"
                                    class="btn btn-primary btn-rounded btn-fw"
                                >
                                    <i class="mdi mdi-pencil"></i>
                                    Edit Group
                                </a>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection

