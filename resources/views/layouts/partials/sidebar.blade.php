        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/logo-gram-sky.png') }}" alt="Logo" style="width: 50px">
                </div>
                <div class="sidebar-brand-text mx-3">SIMPEG SKY</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Master
            </div>

            <!-- Nav Item - Role dibawah Admin -->
            @if (Auth::user()->role_id == 2)
                <li class="nav-item {{ request()->is('seluruhpegawai') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('seluruhpegawai') }}">
                        <i class="fas fa-users"></i>
                        <span>Seluruh Pegawai</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Pegawai per Unit</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('pegawaitk') }}">Unit TK</a>
                            <a class="collapse-item" href="{{ route('pegawaisd') }}">Unit SD</a>
                            <a class="collapse-item" href="{{ route('pegawaismp') }}">Unit SMP</a>
                            <a class="collapse-item" href="{{ route('pegawaisma') }}">Unit SMA</a>
                        </div>
                    </div>
                </li>
            @else
                @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 4)
                    <li class="nav-item {{ request()->is('kumpulanpegawai') ? 'active' : '' }} "
                        data-toggle="tooltip" data-placement="right">
                        <div class=" shadow-lg">
                            <a class="nav-link collapsed text-white" href="{{ route('kumpulanpegawai') }}">
                                <i class="fas fa-users text-white"></i>
                                <span> Pegawai</span>
                            </a>
                        </div>
                    </li>
                @endif
            @endif

            @if (Auth::user()->role_id == 1)
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Data Master</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('agama.list') }}">Agama</a>
                            <a class="collapse-item" href="{{ route('unitkerja.list') }}">Unit Kerja</a>
                            <a class="collapse-item" href="{{ route('pendidikan.list') }}">Pendidikan</a>
                            <a class="collapse-item" href="{{ route('diklat.list') }}">Diklat</a>
                            <a class="collapse-item" href="{{ route('gapok.list') }}">Gapok</a>
                            <a class="collapse-item" href="{{ route('golongan.list') }}">Golongan</a>
                            <a class="collapse-item" href="{{ route('jabatans.list') }}">Jabatan Struktural</a>
                            <a class="collapse-item" href="{{ route('jabatanf.list') }}">Jabatan Fungsional</a>
                            <a class="collapse-item" href="{{ route('jabatanft.list') }}">Jabatan Tambahan</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pegawai -->
                <li class="nav-item {{ request()->is('list') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('list') }}">
                        <i class="fas fa-users"></i>
                        <span>Pegawai</span></a>
                </li>
            @endif
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item {{ request()->is('grafik.list') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('grafik.list') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Grafik Kepegawaian</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
