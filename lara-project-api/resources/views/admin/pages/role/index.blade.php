@extends('admin.layouts.master')

@section('title', 'Roles List')
@php
  // echo "<pre>";
  // print_r($roles);
  // echo "</pre>";
@endphp
@section('content')
  <x-admin.phead title="Roles" subtitle="Manage your roles and their information here.">
    <a href="{{ route('roles.create') }}" class="btn-custom btn-custom-secondary">
      <i class="bi bi-file-earmark-plus"></i> Add New Role
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
        <input type="search" class="table-search-input" placeholder="Search roles...">
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
            <th>ID</th>
            <th>Role</th>
            <th class="">Actions</th>
          </tr>
        </thead>
        <tbody id="tbody">
          @foreach ($roles as $item)

            <!-- Row 1 -->
            <tr>
              <td class="table-order-id">{{ $roles->firstItem() + $loop->index }}</td>
              <td>
                <div class="table-role-cell">

                  <div>
                    <div class="table-role-name">{{ $item->name }}</div>
                  </div>
                </div>
              </td>

              <td>
                <div class="">

                  <a href="{{ route('roles.edit', ['role' => $item->id]) }}" class="table-btn-action" title="Edit role"><i
                      class="bi bi-pencil"></i></a>

                  @if (auth()->user()->role_id == 1)
                    <button type="button" class="table-btn-action delete" data-id="{{ $item->id }}"
                      data-name="{{ $item->name }}" data-bs-toggle="modal" data-bs-target="#modalDelete" title="Delete row">
                      <i class="bi bi-trash"></i>
                    </button>
                  @endif


                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Footer Controls / Pagination -->
    <div class="table-footer-control">

      {{ $roles->links() }}

    </div>
  </div>



  <x-admin.modal id="modalDelete" title="Delete role">
    <div class="text-center">
      <i class="bi bi-trash fs-1 text-danger"></i>
      <p class="mt-2">Are you sure you want to delete this role?</p>
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
    // document.querySelectorAll('.delete').forEach(button => {
    //   button.addEventListener('click', function () {
    $(document).on('click', '.delete', function () {

        let id = this.dataset.id;
        let name = this.dataset.name;
        // alert(id);
        document.querySelector('#modalDelete .name').innerText = name;
        // document.querySelector('#modalDelete form').action = '/roles/' + id;
        document.querySelector('#modalDelete form').action = `{{ route('roles.destroy', ['role' => ':id']) }}`.replace(':id', id);
      })
    // })
  </script>
  <script>
    let searchInput = $('.table-search-input');
    searchInput.on('input', function () {

      // console.log(searchInput.val());

      $.ajax({
        url: '{{ route('roles.search') }}',
        method: 'GET',
        data: {
          search: $(this).val(),
        },
        success: function (res) {
          // console.log(res.data);
          let rows = res.data;
          let html = '';
          const editUrl = "{{ route('roles.edit', ['role' => ':id']) }}";
          rows.forEach((item, index) => {

            let url = editUrl.replace(':id', item.id);



            html += `
            <tr>
                <td class="table-order-id">${index + 1}</td>

                <td>
                    ${item.name}
                </td>

                <td>
                    <div>

                        <a href="${url}"
                           class="table-btn-action"
                           title="Edit role">
                            <i class="bi bi-pencil"></i>
                        </a>

                        @if (auth()->user()->role_id == 1)
                          <button type="button"
                                  class="table-btn-action delete"
                                  data-id="${item.id}"
                                  data-name="${item.name}"
                                  data-bs-toggle="modal"
                                  data-bs-target="#modalDelete"
                                  title="Delete row">
                              <i class="bi bi-trash"></i>
                          </button>
                        @endif

                    </div>
                </td>
            </tr>
        `;
          });

          $("#tbody").html(html);
        },
        error: function (error) {
          console.log(error);
        }
      })
    })
  </script>
@endsection