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
          @foreach ($products as $item)

            <!-- Row 1 -->
            <tr>
              <td class="table-order-id">{{ $item->id }}</td>
              <td>
                <div class="d-flex align-items-center gap-3">
                  @if ($item->image)
                    <img src="{{ $item->image }}" alt="" class="rounded-3" width="60" height="60">
                  @else
                    <img src="https://placehold.net/1.png" alt="" class="rounded-3" width="60" height="60">
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
              {{-- <td class="table-product-name">{{ $item->active }}</td> --}}
              {{-- <td>
                <span class="badge border {{ $item->active ==1 ? 'border-success text-success' : 'border-danger text-danger'}}">
                  {{ $item->active ==1 ? 'Active' : 'Inactive' }}
                </span>
              </td> --}}
              <td class="table-product-name">
                @if($item->active == 1)
                  <span class="badge bg-success">Active</span>
                @else
                  <span class="badge bg-danger">Inactive</span>
                @endif
              </td>

              <td>
                <div class="d-flex justify-content-center gap-1">
                  <a href="{{ route('users.show', ['user' => $item->id]) }}" class="table-btn-action"
                    title="View details"><i class="bi bi-eye"></i></a>
                  <a href="{{ route('users.edit', ['user' => $item->id]) }}" class="table-btn-action" title="Edit user"><i
                      class="bi bi-pencil"></i></a>

                  <button type="button" class="table-btn-action delete" data-id="{{ $item->id }}"
                    data-name="{{ $item->name }}" data-bs-toggle="modal" data-bs-target="#modalDelete" title="Delete row">
                    <i class="bi bi-trash"></i>
                  </button>


                </div>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>

    <!-- Footer Controls / Pagination -->
    <div class="table-footer-control">

      {{-- {{ $Users->links() }}

    </div>
  </div>


  <!-- Delete Confirmation Modal -->

  {{-- <form id="deleteForm" method="POST">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">

          <div class="modal-header">
            <h5 class="modal-title fw-semibold" id="deleteModalLabel">
              Delete Item
            </h5>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>

          <div class="modal-body text-center py-4">

            <div class="d-flex align-items-center justify-content-center
                                       mx-auto mb-3 rounded-circle bg-danger-subtle" style="width: 64px; height: 64px;">
              <i class="bi bi-trash3 text-danger fs-4"></i>
            </div>

            <h5 class="mb-2">Are you sure?</h5>

            <p class="text-body-secondary mb-0">
              Are you sure you want to delete
              <b class="text-bold fw-5">{{ $item->name }}</b>?
              This action cannot be undone.
            </p>


          </div>

          <div class="modal-footer justify-content-center border-0 pb-4">
            <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">
              Cancel
            </button>

            <button type="submit" class="btn btn-danger px-4" id="confirmDelete">
              Delete
            </button>
          </div>

        </div>
      </div>
    </div>

  </form> --}}
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
{{-- @section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {

    const deleteModal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');



    deleteModal.addEventListener('show.bs.modal', function (event) {


      const button = event.relatedTarget;

      const url = button.getAttribute('data-url');

      deleteForm.action = url;

    });

  });

</script>
@endsection --}}
@section('scripts')
  <script>
    document.querySelectorAll('.delete').forEach(button => {
      button.addEventListener('click', function () {
        let id = this.dataset.id;
        let name = this.dataset.name;
        // alert(id);
        document.querySelector('#modalDelete .name').innerText = name;
        // document.querySelector('#modalDelete form').action = '/users/' + id;
        document.querySelector('#modalDelete form').action = `{{ route('users.destroy', ['user' => ':id']) }}`.replace(':id', id);
      })
    })
  </script>
@endsection