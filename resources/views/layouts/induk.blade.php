<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }

        .amcharts-g2 {
            stroke-dasharray: 3px 3px;
            stroke-linejoin: round;
            stroke-linecap: round;
            -webkit-animation: am-moving-dashes 1s linear infinite;
            animation: am-moving-dashes 1s linear infinite;
        }

        @-webkit-keyframes am-moving-dashes {
            100% {
                stroke-dashoffset: -31px;
            }
        }

        @keyframes am-moving-dashes {
            100% {
                stroke-dashoffset: -31px;
            }
        }

        .amcharts-graph-column-front {
            -webkit-transition: all .3s .3s ease-out;
            transition: all .3s .3s ease-out;
        }

        .amcharts-graph-column-front:hover {
            fill: #496375;
            stroke: #496375;
            -webkit-transition: all .3s ease-out;
            transition: all .3s ease-out;
        }

        .amcharts-g3 {
            stroke-linejoin: round;
            stroke-linecap: round;
            stroke-dasharray: 500%;
            stroke-dasharray: 0 /;
            /* fixes IE prob */
            stroke-dashoffset: 0 /;
            /* fixes IE prob */
            -webkit-animation: am-draw 40s;
            animation: am-draw 40s;
        }

        @-webkit-keyframes am-draw {
            0% {
                stroke-dashoffset: 500%;
            }

            100% {
                stroke-dashoffset: 0%;
            }
        }

        @keyframes am-draw {
            0% {
                stroke-dashoffset: 500%;
            }

            100% {
                stroke-dashoffset: 0%;
            }
        }

        .nav-item:hover {}

        .shadow-lg:hover {
            background: #0BB5EA;
        }

        .tooltip-inner {
            background-color: #4e73df !important;
            color: white;
        }

        .bs-tooltip-right .arrow::before,
        .bs-tooltip-auto[x-placement^="right"] .arrow::before {
            border-right-color: #4e73df !important;
        }

        .card:hover {
            border: 1px solid blue;
        }

    </style>

    {{-- <title>SIMPEG - Dashboard</title> --}}
    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('/sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{ asset('/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/sbadmin/vendor/jquery/jquery.min.js') }}"></script>
    <!-- adminpix -->
    <link href="{{ asset('/adminpix/base.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/adminpix/export.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/adminpix/style.css') }}" rel="stylesheet" type="text/css">

    <!-- Link Href Direktur -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/css/seluruhpegawai.css') }}">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <h3 class="text-primary">Dashboard <i style="color:#0BB5EA">SKY</i> PEG </h3>
                    {{-- <h6><sup class="text-success">V.1</sup></h6> --}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="cari form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="karyawanList"></div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                {{-- <img class="img-profile rounded-circle mb-2" style="width:40px; height:40px;"
                                    src="foto/{{ $pegawai->foto }}" /> --}}
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                {{-- <a class="dropdown-item" href="/pegawai/edit/{{ $p->id_peg }}"> --}}
                                <a class="dropdown-item" href="/profile/show/">
                                    {{ __('Profil Anda') }}
                                    <i class="fas fa-address-card"></i>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                @yield('konten')
            </div>
        </div>
        <!-- End of Content Wrapper -->
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script>
        function border() {
            document.getElementByClassName("ubahBorder").style.borderRadius = "10% 0% 61% 0% / 100% 73% 172% 13%";
        }
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip({
                animated: 'fade',
                html: true
            });
        });
    </script>

    <script src="{{ asset('/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $('.cari').select2({
            placeholder: 'Cari...',
            ajax: {
                url: '/cari',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.email,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/sbadmin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/sbadmin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('/sbadmin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/sbadmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('/sbadmin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('/sbadmin/js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('/sbadmin/js/demo/chart-bar-demo.js') }}"></script>
    <script src="{{ asset('/sbadmin/js/demo/datatables-demo.js') }}"></script>


    <!-- START CORE PLUGINS -->
    <!-- <script src="{{ asset('adminpix/jquery-slimscroll.js') }}"></script>
        <script src="{{ asset('adminpix/plugins/fastclick/fastclick.js') }}"></script>
        <script src="{{ asset('adminpix/plugins/metisMenu/metismenu.js') }}"></script>
        <script src="{{ asset('adminpix/plugins/lobipanel/lobipanel.js') }}"></script> -->
    <!-- Amcharts Js -->

    <!-- START THEME LABEL SCRIPT -->
    <!-- <script src="{{ asset('adminpix/theme.js') }}"></script> -->

    @include('sweetalert::alert')

</body>

</html>
