{{-- sidebar menu-active --}}
@php
  function activeLink($route_name)
  {
    return request()->routeIs("$route_name") ? 'active' : "";
  }
@endphp

<div class="sidebar-wrapper" id="sidebar">
  <!-- Brand Logo / Identity -->
  <a href="index.html" class="sidebar-brand">
    <i class="bi bi-asterisk"></i>
    <span>E-Commerce</span>
  </a>
  @if (auth()->user()->role_id != 5)


    <!-- Navigation Menu -->
    <div class="flex-grow-1 overflow-y-auto">
      <!-- Group: Menu -->
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">Menu</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="{{ route('dashboard') }}" {{--
              class="sidebar-menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" id="menu-overview"
              title="Overview"> --}}
              class="sidebar-menu-link {{ activeLink('dashboard') }}" id="menu-overview"
              title="Overview">
              <i class="bi bi-grid-fill"></i>
              <span>Dashboard</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">System</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="{{ route('users.index') }}" {{--
              class="sidebar-menu-link {{ request()->routeIs('users*') ? 'active' : '' }}" id="menu-blankpage"
              title="Blank Page"> --}}
              class="sidebar-menu-link {{ activeLink('users*') }}" id="menu-blankpage"
              title="Blank Page">
              <i class="bi bi-people"></i>
              <span>Users</span>
            </a>
          </li>
          @if (auth()->user()->role_id != 5)
            <li class="sidebar-menu-item">
              <a href="{{ route('roles.index') }}" 
                class="sidebar-menu-link {{ activeLink('roles*') }}" id="menu-blankpage"
                title="Blank Page">
                <i class="bi bi-file-earmark-person"></i>
                <span>Roles</span>
              </a>
            </li>

            <li class="sidebar-menu-item">
              <a href="{{ route('products.index') }}" {{--
                class="sidebar-menu-link {{ request()->routeIs('products*') ? 'active' : '' }}" id="menu-blankpage"
                title="Blank Page"> --}}
                class="sidebar-menu-link {{ activeLink('products*') }}" id="menu-blankpage"
                title="Blank Page">
                <i class="bi bi-cart"></i>
                <span>Products</span>
              </a>
            </li>
            <li class="sidebar-menu-item">
              <a href="{{ route('categories.index') }}" {{--
                class="sidebar-menu-link {{ request()->routeIs('products*') ? 'active' : '' }}" id="menu-blankpage"
                title="Blank Page"> --}}
                class="sidebar-menu-link {{ activeLink('categories*') }}" id="menu-blankpage"
                title="Blank Page">
                <i class="bi bi-tags"></i>
                <span>Category</span>
              </a>
            </li>
            <li class="sidebar-menu-item">
              <a href="{{ route('brands.index') }}" {{--
                class="sidebar-menu-link {{ request()->routeIs('products*') ? 'active' : '' }}" id="menu-blankpage"
                title="Blank Page"> --}}
                class="sidebar-menu-link {{ activeLink('brands*') }}" id="menu-blankpage"
                title="Blank Page">
                <i class="bi-brands bi-bootstrap"></i>
                <span>Brand</span>
              </a>
            </li>
          @endif

        </ul>
      </div>




      {{-- <!-- Group: Pages -->
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">users</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="{{ route('users.index') }}" class="sidebar-menu-link" id="menu-blankpage" title="Blank Page">
              <i class="bi bi-people"></i>
              <span>Users</span>
            </a>
          </li>

        </ul>
      </div> --}}

    </div>
  @else
    <li class="sidebar-menu-item">
      <a href="{{ route('users.show', ['user' => auth()->user()->id]) }}" class="sidebar-menu-link" id="menu-blankpage"
        title="Blank Page">
        <i class="bi bi-person"></i>
        <span>Your Profile</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="{{ route('users.edit', ['user' => auth()->user()->id]) }}" class="sidebar-menu-link" id="menu-blankpage"
        title="Blank Page">
        <i class="bi bi-pencil"></i>
        <span>Edit Profile</span>
      </a>
    </li>
  @endif



  <!-- Sidebar Profile Card (Dynamic Footer) -->
  <div class="sidebar-profile">
    <img src="{{ asset('assets/images/avatar.png') }}" alt="{{ auth()->user()->name }}" class="sidebar-profile-img"
      onerror="this.src='https:/images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=256&auto=format&fit=crop'">
    {{-- <span
      class="table-user-avatar bg-brand-lime d-flex align-items-center justify-content-center text-lime fw-bold fs-5">{{
      Str::substr($user->name, 0, 1) }}
    </span> --}}
    <div class="sidebar-profile-info">
      <div class="sidebar-profile-name">{{ auth()->user()->name }}</div>
      <div class="sidebar-profile-email">{{ auth()->user()->email }}</div>
    </div>
  </div>
</div>