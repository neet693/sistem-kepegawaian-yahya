        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-light accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/logo-gram-sky.png') }}" alt="Logo" style="width: 50px">
                </div>
                <div class="sidebar-brand-text text-white mx-3">SKYPEG</div>
            </a>

            <!-- Heading -->
            <div class="sidebar-heading text-white">
                Manage
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item " data-toggle="tooltip" data-placement="right">
                <div class=" shadow-lg">
                    <a class="nav-link collapsed text-white" href="{{ route('dashboard') }}">
                        <i class="fas fa-fw fa-cog text-white"></i>
                        <span>Dashboard </span>
                    </a>
                </div>
            </li>

            <!-- Nav Item - Role dibawah Admin -->
            @if (Auth::user()->role_id == 2)
                <li class="nav-item " data-toggle="tooltip" data-placement="right">
                    <div class=" shadow-lg">
                        <a class="nav-link collapsed text-white" href="{{ route('seluruhpegawai') }}">
                            <i class="fas fa-users text-white"></i>
                            <span> Pegawai</span>
                        </a>
                    </div>
                </li>
            @else
                @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 4)
                    <li class="nav-item " data-toggle="tooltip" data-placement="right">
                        <div class=" shadow-lg">
                            <a class="nav-link collapsed text-white" href="{{ route('kumpulanpegawai') }}">
                                <i class="fas fa-users text-white"></i>
                                <span> Pegawai</span>
                            </a>
                        </div>
                    </li>
                @endif
            @endif

            <!-- Nav Item - Pages Collapse Menu -->
            @if (Auth::user()->role_id == 1)
                <li class="nav-item " data-toggle="tooltip" data-placement="right">
                    <div class=" shadow-lg">
                        {{-- <a class="nav-link collapsed text-white" href="/list"> --}}
                        <a class="nav-link collapsed text-white" href="{{ route('list') }}">
                            <i class="fas fa-users text-white"></i>
                            <span> Pegawai</span>
                        </a>
                    </div>
                </li>
                <!-- Nav Item - Pages Collapse Menu -->

                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <div class="shadow-lg ">
                        <a class="nav-link collapsed text-white" href="#" data-toggle="collapse"
                            data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                            <i class="fas fa-fw fa-building text-white"></i>
                            <span>Data Master</span>
                        </a>
                        <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Master :</h6>
                                {{-- <a class="collapse-item" href="/data/tmagama/tambah">Agama</a> --}}
                                <a class="collapse-item" href="{{ route('agama.list') }}">Agama</a>
                                {{-- <a class="collapse-item" href="/pegawai/tmdiklat/tambah">Diklat</a> --}}
                                <a class="collapse-item" href="{{ route('diklat.list') }}">Diklat</a>
                                {{-- <a class="collapse-item" href="/pegawai/tmgapok/tambah">Gapok</a> --}}
                                <a class="collapse-item" href="{{ route('gapok.list') }}">Gapok</a>
                                {{-- <a class="collapse-item" href="/pegawai/tmgolongan/tambah">Golongan</a> --}}
                                <a class="collapse-item" href="{{ route('golongan.list') }}">Golongan</a>
                                {{-- <a class="collapse-item" href="/pegawai/tmjabatans/tambah">Jabatan Struktural</a> --}}
                                <a class="collapse-item" href="{{ route('jabatans.list') }}">Jabatan Struktural</a>
                                {{-- <a class="collapse-item" href="/pegawai/tmjabatanf/tambah">Jabatan Fungsional</a> --}}
                                <a class="collapse-item" href="{{ route('jabatanf.list') }}">Jabatan Fungsional</a>
                                {{-- <a class="collapse-item" href="/pegawai/tmjabatanft/tambah">Jabatan Tambahan</a> --}}
                                <a class="collapse-item" href="{{ route('jabatanft.list') }}">Jabatan Tambahan</a>
                                {{-- <a class="collapse-item" href="/data/tmpendidikan/tambah">Pendidikan</a> --}}
                                <a class="collapse-item" href="{{ route('pendidikan.list') }}">Pendidikan</a>
                                {{-- <a class="collapse-item" href="/data/tmunitkerja/tambah">Unit Kerja</a> --}}
                                <a class="collapse-item" href="{{ route('unitkerja.list') }}">Unit Kerja</a>
                            </div>
                        </div>
                    </div>
                </li>
            @endif

            <!-- Heading -->
            <div class="sidebar-heading text-white">
                Laporan
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Charts -->
            <li class="nav-item mb-3" data-toggle="tooltip" data-placement="right">
                <div class=" shadow-lg ">
                    {{-- <a class="nav-link text-white" href="/pegawai/grafik"> --}}
                    <a class="nav-link text-white" href="{{ route('grafik.list') }}">
                        <i class="fas fa-fw fa-chart-area text-white"></i>
                        <span>Grafik Kepegawaian</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <footer class="text-center text-white bg-gradient-primary">
                <!-- Grid container -->
                <div class="container">
                    <!-- Section: Social media -->
                    <section class="mb-1">
                        <!-- Facebook -->
                        <a class="btn btn-link btn-floating btn-lg text-white" title="Facebook Sekolah Kristen Yahya"
                            href="https://www.facebook.com/SekolahKristenYahya/" role="button"
                            data-mdb-ripple-color="white"><i class="fab fa-facebook-f"></i></a>
                        <!-- Whatsapp -->
                        <a class="btn btn-link btn-floating btn-lg text-white" href="https://wa.me/+6281214400997"
                            role="button" data-mdb-ripple-color="white"><i class="fab fa-whatsapp"></i></a>
                        <!-- Instagram -->
                        <a class="btn btn-link btn-floating btn-lg text-white" title="Instagram Sekolah Kristen Yahya"
                            href="https://www.instagram.com/sekolahyahya/" role="button"
                            data-mdb-ripple-color="white"><i class="fab fa-instagram"></i></a>
                    </section>
                    <!-- Section: Social media -->
                </div>
                <!-- Grid container -->

                <!-- Copyright -->
                <div class="text-center text-white">
                    &copy;
                    <script>
                        document.write(/\d{4}/.exec(Date())[0])
                    </script>
                    Copyright:
                    <a class="text-white" href="https://sekolahyahya.sch.id/">Sekolah Kristen Yahya</a>
                </div>
                <!-- Copyright -->
            </footer>
        </ul>
        <!-- End of Sidebar -->
