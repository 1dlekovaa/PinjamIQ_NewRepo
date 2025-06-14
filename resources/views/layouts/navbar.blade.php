<nav
  class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl"
  id="navbarBlur"
  data-scroll="false"
>
  <div class="container-fluid py-1 px-3">
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm">
      <a class="opacity-5 text-white" href="javascript:;">Pages</a>
    </li>
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">
      {{ $pageTitle ?? request()->routeIs('students.*') ? 'Students' :
          (request()->routeIs('buku.*') ? 'Buku' : 'Dashboard') }}
    </li>
  </ol>
</nav>

    <div
      class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4"
      id="navbar"
    >
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        <div class="input-group">
          <span class="input-group-text text-body"
            ><i class="fas fa-search" aria-hidden="true"></i
          ></span>
          <input
            type="text"
            class="form-control"
            placeholder="Type here..."
          />
        </div>
      </div>
    </div>
  </div>
</nav>
