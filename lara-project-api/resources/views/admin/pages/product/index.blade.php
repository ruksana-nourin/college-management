@extends('admin.layouts.master')

@section('title', 'Products List')
@php
  // echo "<pre>";
  // print_r($Products);
  // echo "</pre>";
@endphp

@section('content')

  <x-admin.phead title="Products" subtitle="Manage your products and their information here.">
    <a href="{{ route('products.create') }}" class="btn-custom btn-custom-secondary">
      <i class="bi bi-file-earmark-plus"></i> Add New Product
    </a>
  </x-admin.phead>

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="table-card-custom">
    <!-- Header Controls -->
    <div class="table-header-control">
      <form action="{{ route('products.index') }}" class="d-flex flex-md-nowrap flex-wrap gap-2 w-100">
        <div class="input-group">
          <span class="input-group-text">
            <i class="bi bi-search"></i>
          </span>
          <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search products...">
        </div>
        <div class="input-group">
          <label class="input-group-text"><i class="bi bi-funnel me-1"></i> Category</label>
          <select class="form-select" id="inputGroupSelect01" name="category">
            <option selected="" disabled >Choose category...</option>
            @foreach ($categories as $item)
              <option value="{{ $item->id }}" @selected(request('category')== $item->id)>{{ $item->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="input-group">
          <label class="input-group-text"><i class="bi bi-funnel me-1"></i> Brand</label>
          <select class="form-select" id="inputGroupSelect01" name="brand">
            <option selected="" disabled>Choose brand...</option>
            @foreach ($brands as $item)
              <option value="{{ $item->id }}" value="{{ $item->id }}" @selected(request('brand')== $item->id)>{{ $item->name }}</option>
            @endforeach
          </select>
        </div>
        <!-- Action buttons / Filter options -->
        <div class="table-filter-group">
          <button class="btn-table-action" type="submit">
            <i class="bi bi-search"></i>Search <i class="bi bi-arrow-right"></i>
          </button>
        </div>
        <a href="{{ route('products.index') }}" class="btn-table-action text-nowrap"><i class="bi bi-recycle">clear filter</i></a>
      </form>
    </div>

    <!-- Responsive Table Wrapper -->
    <div class="table-responsive">
      <table class="table-custom">
        <thead>
          <tr>
            <th>ID.</th>
            <th>Product</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($products as $item)

            <!-- Row 1 -->
            <tr>
              <td class="table-order-id">{{ $item->id }}</td>
              <td>
                <div class="d-flex align-items-center gap-3">
                  @if ($item->image)
                    <img src="{{ $item->image }}" alt="" class="rounded-3" width="60" height="60">
                  @else
                    <img src="https://placehold.net/1.png" alt="placeholder" class="rounded-3" width="60" height="60">
                  @endif
                  <div>
                    <h5 class="mb-0 fw-normal">{{ $item->name }}</h5>
                    <p class="mb-0 text-muted">{{ $item->id }}</p>
                  </div>
                </div>
              </td>
              <td class="table-product-name">{{ $item->category->name ?? 'N/A' }}</td>
              <td class="table-product-name">{{ $item->brand->name ?? 'N/A' }}</td>
              <td class="table-product-name">{{ $item->price }}</td>
              <td class="table-product-name">{{ $item->quantity }}</td>

              <td class="table-product-name">
                @if($item->active == 1)
                  <span class="badge bg-success">Active</span>
                @else
                  <span class="badge bg-danger">Inactive</span>
                @endif
              </td>

              <td>
                <div class="d-flex justify-content-center gap-1">
                  <a href="{{ route('products.show', ['product' => $item->id]) }}" class="table-btn-action"
                    title="View details"><i class="bi bi-eye"></i></a>
                  <a href="{{ route('products.edit', ['product' => $item->id]) }}" class="table-btn-action"
                    title="Edit product"><i class="bi bi-pencil"></i></a>

                  <button type="button" class="table-btn-action delete" data-id="{{ $item->id }}"
                    data-name="{{ $item->name }}" data-bs-toggle="modal" data-bs-target="#modalDelete"
                    title="Delete product">
                    <i class="bi bi-trash"></i>
                  </button>


                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7" class="text-center">No products found.</td>
            </tr>
          @endforelse

        </tbody>
      </table>
    </div>

    <!-- Footer Controls / Pagination -->
    <div class="table-footer-control">

      {{ $products->links() }}

    </div>
  </div>

  <!-- Delete Confirmation Modal -->

  <x-admin.modal id="modalDelete" title="Delete User">
    <div class="text-center">
      <i class="bi bi-trash fs-1 text-danger"></i>
      <p class="mt-2">Are you sure you want to delete this user?</p>
      <span class="name fw-bold badge border border-danger text-danger py-2 px-3">Mina</span>
      <hr>
      <form method="POST">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger px-4">Delete</button>
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
  <script>
    document.querySelectorAll('.delete').forEach(button => {
      button.addEventListener('click', function () {
        let id = this.dataset.id;
        let name = this.dataset.name;
        // alert(id);
        document.querySelector('#modalDelete .name').innerText = name;
        // document.querySelector('#modalDelete form').action = '/products/' + id;
        document.querySelector('#modalDelete form').action = `{{ route('products.destroy', ['product' => ':id']) }}`.replace(':id', id);
      })
    })
  </script>
@endsection