@extends('layouts.fix')
@section('title', 'SKYPEG - Dashboard')
@section('konten')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }} <br />
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Pegawai</h6>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"></i>
                </button>
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" role="grid"
                                aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending">Foto</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending">Unit
                                            Kerja
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending">TTL</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending">JK</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" style="width: 100px;"
                                            aria-label="Office: activate to sort column ascending">No.Telp</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending">Aksi</th>
                                </thead>
                                <tfoot>
                                </tfoot>
                                <tbody>
                                    @foreach ($pegawai as $p)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">
                                                {{-- <a href="/pegawai/profile/{{ $p->id_peg }}" target="_blank"> --}}
                                                <a href="{{ route('pegawai.profile', $p->id_peg) }}" target="_blank">
                                                    <img src="foto/{{ $p->foto }}" width="100px" />
                                                </a>
                                            </td>
                                            <td>{{ $p->unitkerja->nama_unit }}</td>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->t_lahir }}, {{ $p->tgl_lahir }}</td>
                                            <td>
                                                @if ($p->jns_kelamin == 'L')
                                                    Laki-laki
                                                @else
                                                    Perempuan
                                                @endif
                                            </td>
                                            <td>{{ $p->no_telp }}</td>
                                            <td><a title="Lihat Detail {{ $p->nama }}" class="btn btn-secondary"
                                                    href="{{ route('pegawai.profile', $p->id_peg) }}"><i
                                                        class="fa fa-list"></i></a>
                                                <button title="Edit {{ $p->nama }}" type="button"
                                                    class="btn btn-primary" data-toggle="modal"
                                                    data-target="#ModalEdit{{ $p->id_peg }}"><i
                                                        class="fa fa-edit"></i></button>
                                                <button title="Hapus {{ $p->nama }}" type="button"
                                                    class="btn btn-danger mt-1" data-toggle="modal"
                                                    data-target="#ModalDelete{{ $p->id_peg }}"><i
                                                        class="fa fa-trash"></i></button>
                                                <a target="_blank" title="Cetak {{ $p->nama }}"
                                                    class="btn btn-warning" href="/pegawai/cetak/{{ $p->id_peg }}"><i
                                                        class="fa fa-print"></i></a>
                                            </td>
                                        </tr>


                                        <!-- modal edit -->

                                        <div class="modal fade" id="ModalEdit{{ $p->id_peg }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form -->
                                                        @if (count($errors) > 0)
                                                            <div class="alert alert-danger">
                                                                @foreach ($errors->all() as $error)
                                                                    {{ $error }} <br />
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="home-tab"
                                                                    data-toggle="tab" href="#home{{ $p->id_peg }}"
                                                                    role="tab"
                                                                    aria-controls="home{{ $p->id_peg }}"
                                                                    aria-selected="true">Home</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                                    href="#profile{{ $p->id_peg }}" role="tab"
                                                                    aria-controls="profile{{ $p->id_peg }}"
                                                                    aria-selected="false">Detail 1</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="contact-tab" data-toggle="tab"
                                                                    href="#contact{{ $p->id_peg }}" role="tab"
                                                                    aria-controls="contact{{ $p->id_peg }}"
                                                                    aria-selected="false">Detail 2</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="mapel-tab" data-toggle="tab"
                                                                    href="#mapel{{ $p->id_peg }}" role="tab"
                                                                    aria-controls="mapel{{ $p->id_peg }}"
                                                                    aria-selected="false">Detail 3</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active"
                                                                id="home{{ $p->id_peg }}" role="tabpanel"
                                                                aria-labelledby="home-tab{{ $p->id_peg }}">
                                                                {{-- <form action="/pegawai/edit/{{ $p->id_peg }}" --}}
                                                                <form action="{{ route('pegawai.edit', $p->id_peg) }}"
                                                                    method="post" enctype="multipart/form-data">
                                                                    {{ csrf_field() }}

                                                                    <!-- Start tab 1 -->
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label for="inputStatus">Unit Kerja</label>
                                                                            <select name="unitkerja" id="inputUser"
                                                                                class="form-control" required>
                                                                                <option selected>Pilih Unit Kerja</option>
                                                                                @foreach ($ukrj as $unit)
                                                                                    <option
                                                                                        value="{{ $unit->kode_unitkerja }}"
                                                                                        @if ($p->kode_unitkerja == $unit->kode_unitkerja) selected @endif>
                                                                                        {{ $unit->nama_unit }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputNama">Nama</label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $p->nama }}"
                                                                                id="inputNama" name="nama" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-3">
                                                                            <label for="inputTtl">Tempat</label>
                                                                            <input type="text" name="t_lahir"
                                                                                value="{{ $p->t_lahir }}"
                                                                                class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-5">
                                                                            <label for="inputTgl">Tanggal Lahir</label>
                                                                            <input type="date" name="tgl_lahir"
                                                                                value="{{ $p->tgl_lahir }}"
                                                                                class="form-control">
                                                                        </div>

                                                                        <div class="form-group col-md-4">
                                                                            <label for="inputKelamin">Jenis Kelamin</label>
                                                                            <select name="kelamin" id="inputKelamin"
                                                                                class="form-control" required>
                                                                                <option selected>Pilih Jenis Kelamin
                                                                                </option>
                                                                                <option value="L"
                                                                                    @if ($p->jns_kelamin == 'L') selected @endif>
                                                                                    Laki-laki</option>
                                                                                <option value="P"
                                                                                    @if ($p->jns_kelamin == 'P') selected @endif>
                                                                                    Perempuan</option>
                                                                            </select>
                                                                        </div>

                                                                    </div>

                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-5">
                                                                            <label for="inputNoTelp">No.Telp</label>
                                                                            <input type="number" id="inputNoTelp"
                                                                                name="no_telp"
                                                                                value="{{ $p->no_telp }}"
                                                                                class="form-control">
                                                                        </div>

                                                                        <div class="form-group col-md-4">
                                                                            <label for="inputStatus">Status Pegawai</label>
                                                                            <select name="sts_pegawai" id="inputStatus"
                                                                                class="form-control" required>
                                                                                <option selected>Pilih Status Pegawai
                                                                                </option>
                                                                                <option value="Tetap"
                                                                                    @if ($p->sts_pegawai == 'Tetap') selected @endif>
                                                                                    Tetap</option>
                                                                                <option value="Tidak tetap"
                                                                                    @if ($p->sts_pegawai == 'Tidak Tetap') selected @endif>
                                                                                    Tidak Tetap</option>
                                                                            </select>
                                                                        </div>
                                                                        <!-- form row -->
                                                                    </div>

                                                                    <div class="form-row mb-3">
                                                                        <label for="inputAlamat">Alamat</label>
                                                                        <input type="text" id="inputAlamat"
                                                                            name="alamat" value="{{ $p->alamat }}"
                                                                            class="form-control">
                                                                    </div>

                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputStatus">User</label>
                                                                            <select name="user" id="inputUser"
                                                                                class="form-control" required>
                                                                                <option selected>Pilih Jenis User</option>
                                                                                @foreach ($user as $u)
                                                                                    <option value="{{ $u->id }}"
                                                                                        @if ($p->id_user == $u->id) selected @endif>
                                                                                        {{ $u->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputFoto">Foto</label>
                                                                            <input type="file" class="form-control"
                                                                                name="foto" id="inputFoto">
                                                                        </div>
                                                                    </div>
                                                                    <!-- Tab 1 end -->

                                                            </div>
                                                            <div class="tab-pane fade" id="profile{{ $p->id_peg }}"
                                                                role="tabpanel"
                                                                aria-labelledby="profile-tab{{ $p->id_peg }}">

                                                                <!-- Tab 2 -->
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputStatus">Agama</label>
                                                                        <select name="agama" id="inputUser"
                                                                            class="form-control" required>
                                                                            <option selected>Pilih Agama</option>
                                                                            @foreach ($agama as $agama2)
                                                                                <option
                                                                                    value="{{ $agama2->kode_agama }}"
                                                                                    @if ($p->kode_agama == $agama2->kode_agama) selected @endif>
                                                                                    {{ $agama2->agama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputStatus">Pendidikan</label>
                                                                        <select name="pendidikan" id="inputUser"
                                                                            class="form-control" required>
                                                                            <option selected>Pilih Pendidikan</option>
                                                                            @foreach ($pendidikan as $pend)
                                                                                <option value="{{ $pend->kode_pdd }}"
                                                                                    @if ($p->kode_pdd == $pend->kode_pdd) selected @endif>
                                                                                    {{ $pend->pendidikan }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputNip">Nama Sekolah</label>
                                                                        <input type="text" class="form-control"
                                                                            id="inputNip"
                                                                            value="{{ $p->nama_sekolah }}"
                                                                            name="namasekolah" required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputKarsu">Jurusan</label>
                                                                        <input type="text" name="jurusan"
                                                                            value="{{ $p->jurusan }}" id="inputKarsu"
                                                                            class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputAskes">Fakultas</label>
                                                                        <input type="text" name="fakultas"
                                                                            id="inputAskes" value="{{ $p->fakultas }}"
                                                                            class="form-control" required>
                                                                    </div>
                                                                    <!-- form row -->
                                                                </div>
                                                                <!-- Tab 2 end -->

                                                            </div>
                                                            <div class="tab-pane fade" id="contact{{ $p->id_peg }}"
                                                                role="tabpanel"
                                                                aria-labelledby="contact-tab{{ $p->id_peg }}">
                                                                <!-- Tab 3 -->

                                                                <!-- Tab 3 -->
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4">
                                                                        {{-- <label for="inputKarpeg">Hobi</label> --}}
                                                                        <label for="thmsk">Tahun Masuk Yahya</label>
                                                                        <input type="text" value="{{ $p->thmsk }}"
                                                                            name="thmsk" id="thmsk"
                                                                            class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputAskes">Tahun Sertifikasi</label>
                                                                        <input type="year" name="sertifikasi"
                                                                            value="{{ $p->sertifikasi }}"
                                                                            id="inputAskes" class="form-control" required>
                                                                    </div>
                                                                    <!-- form row -->
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-5">
                                                                        <label for="inputKarpeg">Tamat Jabatan</label>
                                                                        <input type="date" value="{{ $p->tmt_jab }}"
                                                                            name="tamatjabatan" id="inputKarpeg"
                                                                            class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group col-md-5">
                                                                        <label for="inputStatus">Jabatan Struktural</label>
                                                                        <select name="jbts" id="inputUser"
                                                                            class="form-control" required>
                                                                            <option selected>Jenis Jabatan Struktural
                                                                            </option>
                                                                            @foreach ($jbts as $jbts2)
                                                                                <option value="{{ $jbts2->kode_jbts }}"
                                                                                    @if ($p->kode_jbts == $jbts2->kode_jbts) selected @endif>
                                                                                    {{ $jbts2->nama_jabatan }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="inputStatus">Status Pernikahan</label>
                                                                        <select name="sts_pernikahan" id="inputUser"
                                                                            class="form-control" required>
                                                                            <option selected>Pilih Status Penikahan</option>
                                                                            <option value="Menikah"
                                                                                @if ($p->sts_marital == 'Menikah') selected @endif>
                                                                                Menikah</option>
                                                                            <option value="Belum menikah"
                                                                                @if ($p->sts_marital == 'Belum menikah') selected @endif>
                                                                                Belum menikah</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!-- end form row -->

                                                                <!-- end tab 3 -->
                                                            </div>

                                                            <div class="tab-pane fade" id="mapel{{ $p->id_peg }}"
                                                                role="tabpanel"
                                                                aria-labelledby="mapel-tab{{ $p->id_peg }}">
                                                                <!-- Tab 3 -->

                                                                <!-- Tab 3 -->
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputKarpeg">Mata Pelajaran</label>
                                                                        <input type="text" value="{{ $p->mapel }}"
                                                                            name="mapel" id="mapel"
                                                                            class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputAskes">Mengajar</label>
                                                                        <input type="text"
                                                                            value="{{ $p->mengajar }}" name="mengajar"
                                                                            id="inputAskes" class="form-control" required>
                                                                    </div>
                                                                    <!-- form row -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--  modal delete -->

                                        <div class="modal fade" id="ModalDelete{{ $p->id_peg }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Anda yakin ingin menghapus?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tidak</button>
                                                        {{-- <a href="/pegawai/hapus/{{ $p->id_peg }}" --}}
                                                        <a href="{{ route('pegawai.hapus', $p->id_peg) }}"
                                                            class="btn btn-primary">Iya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>




                    <!-- Modal Tambah -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form -->

                                    {{-- <form action="/pegawai/tambah/proses" method="POST" enctype="multipart/form-data"> --}}
                                    <form action="{{ route('pegawai.tambah') }}" method="POST"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                                    href="#nav-home" role="tab" aria-controls="nav-home"
                                                    aria-selected="true">Umum</a>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                                    href="#nav-profile" role="tab" aria-controls="nav-profile"
                                                    aria-selected="false">Pendidikan</a>
                                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                                    href="#nav-contact" role="tab" aria-controls="nav-contact"
                                                    aria-selected="false">Terkait Yahya</a>
                                                <a class="nav-item nav-link" id="nav-mapel-tab" data-toggle="tab"
                                                    href="#nav-mapel" role="tab" aria-controls="nav-mapel"
                                                    aria-selected="false">Mapel dan Mengajar</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                                aria-labelledby="nav-home-tab">
                                                <!-- Tab 1 -->
                                                <div class="form-row">
                                                    <div class="form-group col-md-8">
                                                        <label for="inputNama">Nama</label>
                                                        <input type="text" class="form-control" id="inputNama"
                                                            name="nama" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputStatus">Agama</label>
                                                        <select name="agama" id="inputUser" class="form-control"
                                                            required>
                                                            <option selected>Pilih Agama</option>
                                                            @foreach ($agama as $agama)
                                                                <option value="{{ $agama->kode_agama }}">
                                                                    {{ $agama->agama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputTtl">Tempat</label>
                                                        <input type="text" name="t_lahir" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="inputTgl">Tgl Lahir</label>
                                                        <input type="date" name="tgl_lahir" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputKelamin">Jenis Kelamin</label>
                                                        <select name="kelamin" id="inputKelamin" class="form-control"
                                                            required>
                                                            <option selected>Pilihan Anda</option>
                                                            <option value="L">Laki-laki</option>
                                                            <option value="P">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputTgl">No.Telp</label>
                                                        <input type="number" id="inputTgl" name="no_telp"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputStatus">Status Pegawai</label>
                                                        <select name="sts_pegawai" id="inputStatus" class="form-control"
                                                            required>
                                                            <option selected>Pilihan Anda</option>
                                                            <option value="Tetap">Tetap</option>
                                                            <option value="Tidak Tetap">Tidak Tetap</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md">
                                                        <label for="inputAlamat">Alamat</label>
                                                        <input type="text" id="inputAlamat" name="alamat"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="sts_pernikahan">Status Pernikahan</label>
                                                        <select name="sts_pernikahan" id="sts_pernikahan"
                                                            class="form-control" required>
                                                            <option selected>Pilihan Anda</option>
                                                            <option value="Menikah">Menikah</option>
                                                            <option value="Belum menikah">Belum menikah</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md">
                                                        <label for="inputFoto">Foto</label>
                                                        <input type="file" class="form-control" name="foto"
                                                            id="inputFoto">
                                                    </div>
                                                </div>
                                                <!-- Tab 1 end -->
                                            </div>
                                            <!-- Tab 2 / Pendidikan-->
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                                aria-labelledby="nav-profile-tab">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="pendidikan">Pendidikan</label>
                                                        <select name="pendidikan" id="pendidikan" class="form-control"
                                                            required>
                                                            <option selected>Pilih Pendiikan</option>
                                                            @foreach ($pendidikan as $p)
                                                                <option value="{{ $p->kode_pdd }}">
                                                                    {{ $p->pendidikan }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="namasekolah">Nama Sekolah</label>
                                                        <input type="text" class="form-control" id="namasekolah"
                                                            name="namasekolah" required>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="jurusan">Jurusan</label>
                                                        <input type="text" name="jurusan" id="jurusan"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="fakultas">Fakultas</label>
                                                        <input type="text" name="fakultas" id="fakultas"
                                                            class="form-control" required>
                                                    </div>
                                                    <!-- form row -->
                                                </div>
                                                <!-- Tab 2 end -->
                                            </div>

                                            <!-- Tab 3 / Terkait Yahya-->
                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                                aria-labelledby="nav-contact-tab">
                                                <div class="form-row">
                                                    <div class="form-group col-md-5">
                                                        <label for="unitkerja">Unit Kerja</label>
                                                        <select name="unitkerja" id="unitkerja" class="form-control"
                                                            required>
                                                            <option selected>Pilih Unit Kerja</option>
                                                            @foreach ($ukrj as $ukrj)
                                                                <option value="{{ $ukrj->kode_unitkerja }}">
                                                                    {{ $ukrj->nama_unit }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="thmsk">Masuk Yahya</label>
                                                        <input type="text" name="thmsk" id="thmsk"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="sertifikasi">Tahun Sertifikasi</label>
                                                        <input type="number" min="0" max="2099"
                                                            name="sertifikasi" id="sertifikasi" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="user">User</label>
                                                        <select name="user" id="user" class="form-control"
                                                            required>
                                                            <option selected>Pilih Jenis User</option>
                                                            @foreach ($user as $u)
                                                                <option value="{{ $u->id }}">{{ $u->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!-- form row -->
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="tamatjabatan">Tamat Jabatan</label>
                                                        <input type="date" name="tamatjabatan" id="tamatjabatan"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="jbts">Jabatan Struktural</label>
                                                        <select name="jbts" id="jbts" class="form-control"
                                                            required>
                                                            <option selected>Pilih Jabatan Struktural</option>
                                                            @foreach ($jbts as $jbts)
                                                                <option value="{{ $jbts->kode_jbts }}">
                                                                    {{ $jbts->nama_jabatan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                                <!-- end form row -->
                                                <!-- Tab 3 end -->
                                            </div>

                                            <div class="tab-pane fade" id="nav-mapel" role="tabpanel"
                                                aria-labelledby="nav-mapel-tab">
                                                <!-- Tab 4 -->
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="mapel">Mata Pelajaran</label>
                                                        <input type="text" name="mapel" id="mapel"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="mengajar">Mengajar</label>
                                                        <input type="text" name="mengajar" id="mengajar"
                                                            class="form-control" required>
                                                    </div>
                                                    <!-- form row -->
                                                </div>
                                                <!-- end form row -->

                                                <!-- Tab 4 end -->
                                            </div>
                                        </div>

                                        <!-- end form -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button></form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end modal -->
                </div>
            </div>
        </div>
    </div>
@endsection
