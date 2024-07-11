<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="#" class="logo-link">
                        <img src="{{ asset('assets-admin/compiled/png/logo-bpbd.png') }}" alt="Logo" class="logo-img">
                        <span class="logo-text">SIG-BPBD</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item {{ request()->is('preview') ? 'active' : '' }} ">
                    <a href="/preview" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Preview</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub {{ request()->is('kejadian', 'tanggap', 'user') ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Kelola Data</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item {{ request()->is('kejadian') ? 'active' : '' }} ">
                            <a href="/kejadian" class="submenu-link">Kejadian Banjir</a>
                        </li>
                        <li class="submenu-item {{ request()->is('tanggap') ? 'active' : '' }} ">
                            <a href="/tanggap" class="submenu-link">Tanggap Bencana</a>
                        </li>
                        <li class="submenu-item {{ request()->is('user') ? 'active' : '' }} ">
                            <a href="/user" class="submenu-link">User</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  {{ request()->is('laporan') ? 'active' : '' }}">
                    <a href="/laporan" class='sidebar-link'>
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Laporan</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="/" class="sidebar-link">
                        <i class="icon-mid bi bi-box-arrow-left"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
