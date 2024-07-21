<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('backend/img/logo.png') }}" alt="AdminLTE Logo" style="height: 50px;">
        <span class="brand-text font-weight-bold">PT JAKARTA</span>
    </a>
    <div class="sidebar">
        <br>
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @if (in_array($role, ['admin']))
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                @endif

                @if (in_array($role, ['admin']))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-layer-group"></i>
                            <p>Master Data<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('pegawai.index') }}"
                                    class="nav-link {{ request()->routeIs('pegawai.index') ? 'active' : '' }}">
                                    <p>Pegawai Aktif</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pegawai.index2') }}"
                                    class="nav-link {{ request()->routeIs('pegawai.index2') ? 'active' : '' }}">
                                    <p>Pegawai Non Aktif</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('potongan.index') }}"
                                    class="nav-link {{ request()->routeIs('potongan.index') ? 'active' : '' }}">
                                    <p>Potongan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (in_array($role, ['user', 'admin']))
                    <li class="nav-header">Slip Gaji</li>
                @endif

                @if (in_array($role, ['user', 'admin']))
                    <li class="nav-item">
                        <a href="{{ route('slipgaji.index') }}"
                            class="nav-link {{ request()->routeIs('slipgaji.index') ? 'active' : '' }}">
                            <i class="fas fa-money-bill-wave"></i>
                            <p>Slip Gaji</p>
                        </a>
                    </li>
                @endif

                @if (in_array($role, ['admin']))
                    <li class="nav-header">Settings</li>
                @endif

                @if (in_array($role, ['admin']))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>Feature<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}"
                                    class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}">
                                    <p>Akun Pegawai</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('about.edit', 1) }}"
                                    class="nav-link {{ request()->routeIs('about.index', 1) ? 'active' : '' }}">
                                    <p>Settings</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
