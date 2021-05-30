<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
        data-class="c-sidebar-show">
        <svg class="c-icon c-icon-lg">
            <use xlink:href="/packages/coreui/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
        </svg>
    </button>

    <a class="c-header-brand d-lg-none" href="#">
        <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="/packages/coreui/assets/brand/coreui.svg#full"></use>
        </svg>
    </a>

    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
        data-class="c-sidebar-lg-show" responsive="true">
        <svg class="c-icon c-icon-lg">
            <use xlink:href="/packages/coreui/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
        </svg>
    </button>

    <ul class="c-header-nav ml-auto mr-4">
        <li class="c-header-nav-item d-md-down-none mx-2">
            <a class="c-header-nav-link" href="#">
                <svg class="c-icon">
                    <use xlink:href="/packages/coreui/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                </svg>
            </a>
        </li>

        <li class="c-header-nav-item dropdown">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <div class="c-avatar">
                    <img class="c-avatar-img" src="/packages/coreui/assets/img/avatars/6.jpg" alt="user@email.com">
                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-right pt-0">
                <div class="dropdown-header bg-light py-2">
                    <strong>Settings</strong>
                </div>

                <a class="dropdown-item" href="#">
                    <svg class="c-icon mr-2">
                        <use xlink:href="/packages/coreui/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg> Profile
                </a>

                <a class="dropdown-item" href="#">
                    <svg class="c-icon mr-2">
                        <use xlink:href="/packages/coreui/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                    </svg> Settings
                </a>

                <div class="dropdown-divider"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="dropdown-item" type="submit">
                        <svg class="c-icon mr-2">
                            <use xlink:href="/packages/coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                            </use>
                        </svg> Logout
                    </button>

                </form>

            </div>
        </li>
    </ul>
    @yield('breadcrumb')
</header>
