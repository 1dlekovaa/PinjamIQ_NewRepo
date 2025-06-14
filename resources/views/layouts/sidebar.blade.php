<aside
  class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
  id="sidenav-main"
>
  <div class="sidenav-header">
    <i
      class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
      aria-hidden="true"
      id="iconSidenav"
    ></i>
    <a
      class="navbar-brand m-0"
      href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
      target="_blank"
    >
      <img
        src="https://imgcdn.stablediffusionweb.com/2024/11/25/ec85563e-641a-45b6-8dee-9e93173b6d09.jpg"
        width="40px"
        height="45px"
        class="navbar-brand-img h-100"
        alt="main_logo"
      />
      <span class="ms-1 font-weight-bold">PinjamIQ</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0" />
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
    <li class="nav-item">
  <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
      <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
    </div>
    <span class="nav-link-text ms-1">Dashboard</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}" href="{{ route('students.index') }}">
    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
      <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
    </div>
    <span class="nav-link-text ms-1">Murid</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link {{ request()->routeIs('buku.*') ? 'active' : '' }}" href="{{ route('buku.index') }}">
    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
      <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
    </div>
    <span class="nav-link-text ms-1">Buku</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link {{ request()->routeIs('loans.*') ? 'active' : '' }}" href="{{ route('loans.index') }}">
    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
      <i class="ni ni-books text-dark text-sm opacity-10"></i>
    </div>
    <span class="nav-link-text ms-1">Peminjaman</span>
  </a>
</li>

    </ul>
  </div>
</aside>
