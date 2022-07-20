<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="DeyDey" content="">
    <title>SKYPEG - Cetak Pegawai</title>

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


    <link rel="stylesheet" href="profile-css.css">
</head>

<body>
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <img src="{{ asset('img/new-logo-yahya.png') }}" alt="Logo Yahya" style="max-width: 100%">
                </div>
            </div>
            <hr>
            <div class="col-md-12 mx-auto">
                <h1 class="text-center text-150">CETAK DETAIL PEGAWAI</h1>
            </div>
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="../../foto/{{ $pegawai->foto }}" alt="Foto Pegawai" width="180">
                                <div class="mt-3">
                                    <h4>{{ $pegawai->nama }}</h4>
                                    <p class="text-secondary mb-1"><i class="fa fa-phone"></i>
                                        {{ $pegawai->no_telp }}</p>
                                    <p class="text-muted font-size-sm mb-3">{{ $pegawai->alamat }}</p>
                                    {{-- <button type="button" class="btn btn-primary">
                                        Unit Kerja <span
                                            class="badge badge-light">{{ $pegawai->unitkerja->nama_unit }}</span>
                                        <span class="sr-only">unread messages</span>
                                    </button>
                                    <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-outline-primary">Message</button> --}}
                                    <button class="btn btn-primary">Unit Kerja
                                        {{ $pegawai->unitkerja->nama_unit }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nama Lengkap</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $pegawai->nama }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tempat Tanggal Lahir</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $pegawai->t_lahir }}, {{ $pegawai->tgl_lahir }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Jenis Kelamin</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if ($pegawai->jns_kelamin == 'L')
                                        Laki-laki
                                    @else
                                        Perempuan
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Agama</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $pegawai->agama->agama }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Alamat</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $pegawai->alamat }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Status Pernikahan</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $pegawai->sts_marital }}
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <div class="row gutters-sm">
                        <!-- Kolom Informasi Yahya -->
                        <div class="col-sm mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3">Informasi
                                        <i class="material-icons text-info mr-2"> Terkait Yahya</i>
                                    </h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Tahun Masuk</h6>
                                        </div>
                                        <div class="col-sm text-secondary">
                                            {{ $pegawai->thmsk }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Unit Kerja</h6>
                                        </div>
                                        <div class="col-sm text-secondary">
                                            {{ $pegawai->unitkerja->nama_unit }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Status Pegawai</h6>
                                        </div>
                                        <div class="col-sm text-secondary">
                                            {{ $pegawai->sts_pegawai }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Tahun Sertifikasi</h6>
                                        </div>
                                        <div class="col-sm text-secondary">
                                            {{ $pegawai->sertifikasi }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Mata Pelajaran</h6>
                                        </div>
                                        <div class="col-sm text-secondary">
                                            {{ $pegawai->mapel }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Mengajar</h6>
                                        </div>
                                        <div class="col-sm text-secondary">
                                            {{ $pegawai->mengajar }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Kolom Informasi Yahya -->
                        <div class="col-sm mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"> Informasi
                                        <i class="material-icons text-success mr-2"> Terkait Pendidikan</i>
                                    </h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Universitas / PT</h6>
                                        </div>
                                        <div class="col-sm text-secondary">
                                            @if ($pegawai->universitaspt == '')
                                                Tidak Ada Data
                                            @else
                                                {{ $pegawai->universitaspt }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Pendidikan</i></h6>
                                        </div>
                                        <div class="col-sm text-secondary">
                                            @foreach ($pegawai->pendidikan as $pp)
                                                <span class="badge badge-primary">{{ $pp->pendidikan }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Jurusan</h6>
                                        </div>
                                        <div class="col-sm text-secondary">
                                            {{ $pegawai->jurusan }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-0">Fakultas</h6>
                                        </div>
                                        <div class="col-sm text-secondary">
                                            {{ $pegawai->fakultas }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>


    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
