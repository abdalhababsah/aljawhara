<nav class="navbar navbar-main navbar-expand-lg fixed-top px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <!-- Navbar content -->
        <div class="collapse navbar-collapse mt-sm-0 mt-2 px-0 " id="navbar">
            <!-- Centered icons -->
            <div class="d-flex justify-content-center w-100">
                <div class="icon-group d-flex align-items-center">
                    <a href="#" class="nav-link px-2">
                        <img src="{{ asset('assets/img/logos/kitchen-bg.png') }}" alt="Icon 2" class="icon-img">
                    </a>
                    <a href="#" class="nav-link px-2">
                        <img src="{{ asset('assets/img/logos/sweets-bg.png') }}" alt="Icon 1" class="icon-img">
                    </a>
                    <a href="#" class="nav-link px-2">
                        <img src="{{ asset('assets/img/logos/zara-edit-bg.png') }}" alt="Icon 3" class="icon-img">
                    </a>
                </div>
            </div>
        </div>
        @unless (Request::is('/')) <!-- Checks if the current route is not "/" -->
            <a href="javascript:;" class="nav-link text-body p-0 d-xl-none" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
            </a>
        @endunless
    </div>
</nav>

<style>
    .navbar {
        background-color: #f8f9fa; /* Light gray */
        border-bottom: 1px solid #ddd; /* Optional border for a clean look */
    }

    .icon-img {
        height: auto;
        width: 50px; /* Keep icons square */
    }

    .icon-group a {
        margin: 0 2px; /* Add space between icons */
    }
</style>