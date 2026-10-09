@extends('admin.layouts.master')

@section('title', 'Categories List')

@section('content')

    <x-admin.phead title="Categories" subtitle="Manage your product categories here.">
        <a href="{{ route('categories.create') }}" class="btn-custom btn-custom-secondary">
            <i class="bi bi-file-earmark-plus"></i> Add New Category
        </a>
    </x-admin.phead>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif


    <div class="table-card-custom">
        <!-- Header Controls -->
        <div class="table-header-control">

            <!-- Search bar -->
            <div class="table-search-box">
                <i class="bi bi-search table-search-icon"></i>
                <input type="text" class="table-search-input" placeholder="Search categories...">
            </div>

            <!-- Action buttons -->
            <div class="table-filter-group">
                <button class="btn-table-action" type="button">
                    <i class="bi bi-file-earmark-arrow-down"></i> Export
                </button>
            </div>

        </div>

        <!-- Responsive Table Wrapper -->
        <div class="table-responsive">
            <table class="table-custom">

                <thead>
                    <tr>
                        <th>ID.</th>
                        <th>Category Name</th>
                        <th>Created At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($categories as $item)

                        <tr>

                            <td class="table-order-id">
                                {{ $item->id }}
                            </td>

                            <td class="table-product-name">
                                {{ $item->name }}
                            </td>

                            <td class="table-product-name">
                                {{ $item->created_at ? $item->created_at->format('d M, Y') : 'N/A' }}
                            </td>

                            <td>
                                <div class="d-flex justify-content-center gap-1">

                                    <!-- View -->
                                    {{-- <a href="{{ route('categories.show', ['category' => $item->id]) }}" class="table-btn-action"
                                        title="View details">
                                        <i class="bi bi-eye"></i>
                                    </a> --}}

                                    <!-- Edit -->
                                    <a href="{{ route('categories.edit', ['category' => $item->id]) }}" class="table-btn-action"
                                        title="Edit category">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <!-- Delete -->
                                    <button type="button" class="table-btn-action delete" data-id="{{ $item->id }}"
                                        data-name="{{ $item->name }}" data-bs-toggle="modal" data-bs-target="#modalDelete"
                                        title="Delete category">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="bi bi-folder-x fs-2 d-block mb-2"></i>
                                    No categories found.
                                </div>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

        <!-- Footer Controls / Pagination -->
        <div class="table-footer-control">

            {{ $categories->links() }}

        </div>

    </div> <!-- Delete Confirmation Modal -->

    <x-admin.modal id="modalDelete" title="Delete Category">

        <div class="text-center">

            <i class="bi bi-trash fs-1 text-danger"></i>

            <p class="mt-2">
                Are you sure you want to delete this category?
            </p>

            <span class="name fw-bold badge border border-danger text-danger py-2 px-3">
                Category Name
            </span>

            <hr>

            <form method="POST">

                @csrf
                @method('DELETE')

                <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">
                    Cancel
                </button>

                <button type="submit" class="btn btn-danger px-4">
                    Delete
                </button>

            </form>

        </div>


    </x-admin.modal>

@endsection

@section('styles')

    <style>
        .table-footer-control nav {
            width: 100%;
        }

        .table-footer-control nav div:last-child {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>

@endsection

@section('scripts')

    <script> document.querySelectorAll('.delete').forEach(button => {
            button.addEventListener('click', function () {
                let id = this.dataset.id; let name = this.dataset.name;
                // Set category name in modal 
                document.querySelector('#modalDelete .name').innerText = name;
                // Set delete form action 
                document.querySelector('#modalDelete form').action = `{{ route('categories.destroy', ['category' => ':id']) }}`.replace(':id', id);
            });
        }); 
    </script>

@endsection