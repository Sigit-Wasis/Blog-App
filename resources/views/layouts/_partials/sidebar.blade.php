<div class="theme-setting-wrapper">
    <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
    <div id="theme-settings" class="settings-panel">
        <i class="settings-close typcn typcn-delete-outline"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>
            Light
        </div>
        <div class="sidebar-bg-options selected" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>
            Dark
        </div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles primary"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default border"></div>
        </div>
    </div>
</div>
<!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <div class="d-flex sidebar-profile">
                <div class="sidebar-profile-image">
                    <img src="{{ url('assets/images/face29.png') }}" alt="image">
                    <span class="sidebar-status-indicator"></span>
                </div>
                <div class="sidebar-profile-name">
                    <p class="sidebar-name">
                        Kenneth Osborne
                    </p>
                    <p class="sidebar-designation">
                        Welcome
                    </p>
                </div>
            </div>
            <div class="nav-search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Type to search..." aria-label="search"
                        aria-describedby="search">
                    <div class="input-group-append">
                        <span class="input-group-text" id="search">
                            <i class="typcn typcn-zoom"></i>
                        </span>
                    </div>
                </div>
            </div>
            <p class="sidebar-menu-title">Dash menu</p>
        </li>
        <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Dashboard </span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('kategori') || Route::is('kategori_blog.create') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kategori_blog.index') }}">
                <i class="typcn typcn-clipboard menu-icon"></i>
                <span class="menu-title">Kategori Blog </span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('blog') || Route::is('blog.create') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('blog') }}">
                <i class="typcn typcn-clipboard menu-icon"></i>
                <span class="menu-title">Blog </span>
            </a>
        </li>
        <li class="nav-item" {{ Route::is('user') || Route::is('user.create') ? 'active' : '' }}>
            <a class="nav-link" href="{{ route('user') }}">
                <i class="typcn typcn-group menu-icon"></i>
                <span class="menu-title">User </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link" id="logout-button">
                <i class="typcn typcn-power menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>

</nav>
