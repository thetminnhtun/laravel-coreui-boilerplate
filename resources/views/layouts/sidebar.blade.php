<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="/packages/coreui/assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="/packages/coreui/assets/brand/coreui.svg#signet"></use>
        </svg>
    </div>

    <ul class="c-sidebar-nav">
        {{-- <li class="c-sidebar-nav-title">Components</li> --}}
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="/usersx">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="/packages/coreui/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                </svg> Users Management
            </a>

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('users.index') }}">
                        <span class="c-sidebar-nav-icon"></span>
                        Users List
                    </a>
                </li>

                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('users.create') }}">
                        <span class="c-sidebar-nav-icon"></span>
                        Add New User
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a class="c-sidebar-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit();">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="/packages/coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                    </svg>
                    Logout
                </a>

            </form>
        </li>
    </ul>
</div>
