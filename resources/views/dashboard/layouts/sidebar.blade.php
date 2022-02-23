<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                    @if (Request::is('dashboard'))
                        <i class='bi bi-house-fill'></i>
                    @else
                        <i class='bi bi-house'></i>
                    @endif
                    Beranda
                </a>
            </li>
        </ul>
        <h6 class="sidebar-heading text-muted px-3 mt-3 d-flex justify-content-between align-items-center">
            <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/admin') ? 'active' : '' }}" href="/dashboard">
                    @if (Request::is('dashboard/admin'))
                        <i class="bi bi-gear-fill"></i>
                    @else
                        <i class="bi bi-gear"></i>
                    @endif
                    Admin
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/user') ? 'active' : '' }}" href="/dashboard">
                    @if (Request::is('dashboard/user'))
                        <i class="bi bi-people-fill"></i>
                    @else
                        <i class="bi bi-people"></i>
                    @endif
                    User
                </a>
            </li>
        </ul>
    </div>
</nav>
