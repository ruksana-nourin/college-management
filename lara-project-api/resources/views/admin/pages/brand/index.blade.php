@extends('admin.layouts.master')

@section('title', 'Brands List')

@section('content')

  <x-admin.phead
    title="Brands"
    subtitle="Manage your product brands here.">

    <a href="{{ route('brands.create') }}"
       class="btn-custom btn-custom-secondary">
      <i class="bi bi-file-earmark-plus"></i> Add New Brand
    </a>

  </x-admin.phead>


  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}

      <button type="button"
              class="btn-close"
              data-bs-dismiss="alert">
      </button>
    </div>
  @endif


  @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}

      <button type="button"
              class="btn-close"
              data-bs-dismiss="alert">
      </button>
    </div>
  @endif


  <div class="table-card-custom">

    <!-- Header Controls -->
    <div class="table-header-control">

      <div class="table-search-box">
        <i class="bi bi-search table-search-icon"></i>

        <input type="text"
               class="table-search-input"
               placeholder="Search brands...">
      </div>

      <div class="table-filter-group">

        <button class="btn-table-action" type="button">
          <i class="bi bi-file-earmark-arrow-down"></i>
          Export
        </button>

      </div>

    </div>


    <!-- Table -->
    <div class="table-responsive">

      <table class="table-custom">

        <thead>
          <tr>
            <th>ID.</th>
            <th>Brand Name</th>
            <th>Created At</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>

        <tbody>

          @forelse ($brands as $item)

            <tr>

              <td class="table-order-id">
                {{ $item->id }}
              </td>

              <td class="table-product-name">
                {{ $item->name }}
              </td>

              <td class="table-product-name">
                {{ $item->created_at?->format('d M, Y') ?? 'N/A' }}
              </td>

              <td>

                <div class="d-flex justify-content-center gap-1">

                  <!-- Edit -->
                  <a href="{{ route('brands.edit', ['brand' => $item->id]) }}"
                     class="table-btn-action"
                     title="Edit brand">
                    <i class="bi bi-pencil"></i>
                  </a>

                  <!-- Delete -->
                  <button type="button"
                          class="table-btn-action delete"
                          data-id="{{ $item->id }}"
                          data-name="{{ $item->name }}"
                          data-bs-toggle="modal"
                          data-bs-target="#modalDelete"
                          title="Delete brand">

                    <i class="bi bi-trash"></i>

                  </button>

                </div>

              </td>

            </tr>

          @empty

            <tr>

              <td colspan="4" class="text-center py-4">

                <div class="text-muted">

                  <i class="bi bi-tags fs-2 d-block mb-2"></i>

                  No brands found.

                </div>

              </td>

            </tr>

          @endforelse

        </tbody>

      </table>

    </div>


    <!-- Pagination -->
    <div class="table-footer-control">

      {{ $brands->links() }}

    </div>

  </div>


  <!-- Delete Modal -->

  <x-admin.modal id="modalDelete" title="Delete Brand">

    <div class="text-center">

      <i class="bi bi-trash fs-1 text-danger"></i>

      <p class="mt-2">
        Are you sure you want to delete this brand?
      </p>

      <span class="name fw-bold badge border border-danger text-danger py-2 px-3">
        Brand Name
      </span>

      <hr>

      <form method="POST">

        @csrf
        @method('DELETE')

        <button type="button"
                class="btn btn-light px-4"
                data-bs-dismiss="modal">
          Cancel
        </button>

        <button type="submit"
                class="btn btn-danger px-4">
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

<script>

  document.querySelectorAll('.delete').forEach(button => {

    button.addEventListener('click', function () {

      let id = this.dataset.id;
      let name = this.dataset.name;

      document.querySelector('#modalDelete .name').innerText = name;

      document.querySelector('#modalDelete form').action =
        `{{ route('brands.destroy', ['brand' => ':id']) }}`
          .replace(':id', id);

    });

  });

</script>

@endsection