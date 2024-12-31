<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
          <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
      </ul>
      <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
        Selamat Datang, {{auth()->user()->name}}
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
              aria-expanded="false">
              <img src="{{ asset('assets/images/profile/user.png') }}" alt="" width="50" height="50" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
              <div class="message-body">
                <form action="/logout" method="POST">
                  @csrf
                    <button type="submit" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-logout fs-6"></i>
                      <p class="mb-0 fs-3">Logout</p>
                    </button>
                </form>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header> 