

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-end me-2 rotate-caret bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute start-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <span id="title" class="me-1 text-sm text-dark">جوهرة الشرق</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse px-0 w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-dark {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-dark text-white' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="material-symbols-rounded opacity-10">dashboard</i>
                <span class="nav-link-text me-1">لوحة التحكم</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark {{ request()->routeIs('admin.products.*') ? 'bg-gradient-dark text-white' : '' }}" href="{{ route('admin.products.index') }}">
                <i class="material-symbols-rounded opacity-10">inventory</i>
                <span class="nav-link-text me-1">المنتجات</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-dark text-white' : '' }}" href="{{ route('admin.categories.index') }}">
                <i class="material-symbols-rounded opacity-10">category</i>
                <span class="nav-link-text me-1">الأصناف</span>
            </a>
        </li>
      </ul>
    </div>

    <div>
        <hr class="horizontal dark my-2">
        <ul class="navbar-nav  mb-6">
            <li class="nav-item">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="nav-link text-dark btn btn-link w-100 text-start" style="text-decoration: none; padding: 0;">
                        <i class="material-symbols-rounded opacity-10">logout</i>
                        <span class="nav-link-text me-1">
                            تسجيل الخروج
                        </span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
  </aside>
