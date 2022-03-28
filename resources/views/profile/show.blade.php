@extends('layouts.induk')
@section('title', 'Profil Anda')
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
        @if ($message = Session::get('alert-success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif



        <!-- Nav Link Profile -->
        <form action="/profile/edit/{{ $pegawai->id_peg }}" method="post" enctype="multipart/form-data">
            <div class="row">
                {{ csrf_field() }}
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="img-account-profile mb-2" src="/../foto/{{ $pegawai->foto }}" alt="Foto Anda" />
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <!-- Profile picture upload button-->
                            <input style="padding-left: 70px" type="file" name="foto" required />
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <!-- Form Group (name)-->
                            <div class="mb-3">
                                @if (Auth::user()->id == $pegawai->id_user)
                                    <label class="small mb-1" for="inputNama">Nama</label>
                                    <input class="form-control" id="inputNama" name="nama" type="text"
                                        placeholder="Enter your username" value="{{ $pegawai->nama }}" required />
                                @else
                                    <label class="small mb-1" for="inputNama">Nama</label>
                                    <input class="form-control" id="inputNama" type="text" name="nama"
                                        placeholder="Enter your username" value="Nama Anda" required />
                                @endif
                            </div>

                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Jenis Kelamin)-->
                                <div class="col-md-3">
                                    @if (Auth::user()->id == $pegawai->id_user)
                                        <label for="inputKelamin">Jenis Kelamin</label>
                                        <select name="kelamin" id="inputKelamin" class="form-control" name="kelamin"
                                            required>
                                            <option value="L" @if ($pegawai->jns_kelamin == 'L') selected @endif>
                                                Laki-laki</option>
                                            <option value="P" @if ($pegawai->jns_kelamin == 'P') selected @endif>
                                                Perempuan</option>
                                        </select>
                                    @else
                                        <label for="inputKelamin">Jenis Kelamin</label>
                                        <select name="kelamin" id="inputKelamin" class="form-control" name="kelamin"
                                            required>
                                            <option value="L" @if ($pegawai->jns_kelamin == 'L') selected @endif>
                                                Laki-laki</option>
                                            <option value="P" @if ($pegawai->jns_kelamin == 'P') selected @endif>
                                                Perempuan</option>
                                        </select>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    @if (Auth::user()->id == $pegawai->id_user)
                                        <label for="inputAgama">Agama</label>
                                        <select name="agama" id="inputAgama" class="form-control" required>
                                            @foreach ($agama as $agama2)
                                                <option value="{{ $agama2->kode_agama }}"
                                                    @if ($pegawai->kode_agama == $agama2->kode_agama) selected @endif>
                                                    {{ $agama2->agama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <label for="inputKelamin">Jenis Kelamin</label>
                                        <select name="agama" id="inputAgama" class="form-control" required>
                                            @foreach ($agama as $agama2)
                                                <option value="{{ $agama2->kode_agama }}"
                                                    @if ($pegawai->kode_agama == $agama2->kode_agama) selected @endif>
                                                    {{ $agama2->agama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>

                                <!-- Form Group (No. Telp)-->
                                <div class="col-md-3">

                                    @if (Auth::user()->id == $pegawai->id_user)
                                        <label for="inputNoTelp">No. Telp</label>
                                        <input class="form-control" id="inputNoTelp" type="text" name="no_telp"
                                            placeholder="Enter your phone number" value="{{ $pegawai->no_telp }}"
                                            required />
                                    @else
                                        <label for="inputNoTelp">No. Telp</label>
                                        <input class="form-control" id="inputNoTelp" type="text" name="no_telp"
                                            placeholder="Enter your phone number" value="No. Telp Anda" required />
                                    @endif
                                </div>
                            </div>

                            <!-- Row TTL + Marriage -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Tempat Lahir)-->
                                <div class="col-md-3">
                                    @if (Auth::user()->id == $pegawai->id_user)
                                        <label for="inputTempatLahir">Tempat Lahir</label>
                                        <input class="form-control" id="inputTempatLahir" type="text" name="t_lahir"
                                            placeholder="Enter your birth place" value="{{ $pegawai->t_lahir }}"
                                            required />
                                    @else
                                        <label for="inputTempatLahir">Tempat Lahir</label>
                                        <input class="form-control" id="inputTempatLahir" type="text" name="t_lahir"
                                            placeholder="Enter your birth place" value="Tempat Lahir Anda" required />
                                    @endif
                                </div>

                                <!-- Form Group (Ulang Tahun)-->
                                <div class="col-md-4">
                                    @if (Auth::user()->id == $pegawai->id_user)
                                        <label class="small mb-1" for="inputTgl">Tanggal Lahir</label>
                                        <input class="form-control" id="inputTgl" type="date" name="tgl_lahir"
                                            placeholder="Masukkan Tanggal Lahir Anda" value="{{ $pegawai->tgl_lahir }}"
                                            required />
                                    @else
                                        <label class="small mb-1" for="inputTgl">Tanggal Lahir</label>
                                        <input class="form-control" id="inputTgl" type="date" name="tgl_lahir"
                                            placeholder="Masukkan Tanggal Lahir Anda" value="Bulan/Tanggal/Tahun"
                                            required />
                                    @endif
                                </div>

                                <!-- Form Group (Status Pernikahan)-->
                                <div class="col-md-4">
                                    @if (Auth::user()->id == $pegawai->id_user)
                                        <label class="small mb-1" for="inputStatus">Status Pernikahan</label>
                                        <select name="sts_pernikahan" id="inputUser" class="form-control" required>
                                            <option selected>Pilih Status Penikahan</option>
                                            <option value="Menikah" @if ($pegawai->sts_marital == 'Menikah') selected @endif>
                                                Menikah</option>
                                            <option value="Belum menikah"
                                                @if ($pegawai->sts_marital == 'Belum menikah') selected @endif>
                                                Belum menikah</option>
                                        </select>
                                    @else
                                        <label class="small mb-1" for="inputStatus">Status Pernikahan</label>
                                        <select name="sts_pernikahan" id="inputUser" class="form-control" required>
                                            <option selected>Pilih Status Penikahan</option>
                                            <option value="Menikah" @if ($pegawai->sts_marital == 'Menikah') selected @endif>
                                                Menikah</option>
                                            <option value="Belum menikah"
                                                @if ($pegawai->sts_marital == 'Belum menikah') selected @endif>
                                                Belum menikah</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                            <!-- End  Row TTL + Marriage  -->

                            <!-- Form Group (alamat)-->
                            <div class="mb-3">
                                @if (Auth::user()->id == $pegawai->id_user)
                                    <label class="small mb-1" for="inputAlamat">Alamat</label>
                                    <input class="form-control" id="inputAlamat" type="text" name="alamat"
                                        placeholder="Enter your location" value="{{ $pegawai->alamat }}" required />
                                @else
                                    <label class="small mb-1" for="inputAlamat">Alamat</label>
                                    <input class="form-control" id="inputAlamat" type="text" name="alamat"
                                        placeholder="Enter your location" required />
                                @endif
                            </div>
                            <!-- End Form Alamat -->

                            <!-- Form Row Sekolah dan Pendidikan-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (pendidikan)-->
                                @if (Auth::user()->id == $pegawai->id_user)
                                    <div class="col-md-2">
                                        <label class="small mb-1" for="inputPendidikan">Pendidikan</label>
                                        <select name="pendidikan" id="inputUser" class="form-control" required>
                                            <option selected>Pilih Pendidikan</option>
                                            @foreach ($pendidikan as $pend)
                                                <option value="{{ $pend->kode_pdd }}"
                                                    @if ($pegawai->kode_pdd == $pend->kode_pdd) selected @endif>
                                                    {{ $pend->pendidikan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <div class="col-md-2">
                                        <label class="small mb-1" for="inputPendidikan">Pendidikan</label>
                                        <select name="pendidikan" id="inputUser" class="form-control" required>
                                            <option selected>Pilih Pendidikan</option>
                                            @foreach ($pendidikan as $pend)
                                                <option value="{{ $pend->kode_pdd }}"
                                                    @if ($p->kode_pdd == $pend->kode_pdd) selected @endif>
                                                    {{ $pend->pendidikan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <!-- Form Group (Nama Sekolah)-->
                                @if (Auth::user()->id == $pegawai->id_user)
                                    <div class="col-md-3">
                                        <label class="small mb-1" for="inputSekolah">Nama Sekolah</label>
                                        <input class="form-control" id="inputSekolah" type="text" name="namasekolah"
                                            placeholder="Nama Sekolah" value="{{ $pegawai->nama_sekolah }}" required />
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputSekolah">Nama Sekolah</label>
                                        <input class="form-control" id="inputSekolah" type="text" name="namasekolah"
                                            placeholder="Nama Sekolah" value="Nama Sekolah" required />
                                    </div>
                                @endif

                                <!-- Form Group (Jurusan)-->
                                @if (Auth::user()->id == $pegawai->id_user)
                                    <div class="col-md-3">
                                        <label class="small mb-1" for="inputJurusan">Jurusan</label>
                                        <input class="form-control" id="inputJurusan" type="text" name="jurusan"
                                            placeholder="Jurusan" value="{{ $pegawai->jurusan }}" required />
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputJurusan">Jurusan</label>
                                        <input class="form-control" id="inputJurusan" type="text" name="jurusan"
                                            placeholder="Jurusan" value="Jurusan" required />
                                    </div>
                                @endif

                                <!-- Form Group (Fakultas)-->
                                @if (Auth::user()->id == $pegawai->id_user)
                                    <div class="col-md-3">
                                        <label class="small mb-1" for="inputFakultas">Fakultas</label>
                                        <input class="form-control" id="inputFakultas" type="text" name="fakultas"
                                            placeholder="Jurusan" value="{{ $pegawai->jurusan }}" required />
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFakultas">Fakultas</label>
                                        <input class="form-control" id="inputFakultas" type="text" name="fakultas"
                                            placeholder="Jurusan" value="Jurusan" required />
                                    </div>
                                @endif
                            </div>
                            <!-- End Form Row Sekolah dan Pendidikan -->

                            <!-- Form Row Sertifikasi dan Tahun Masuk-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (mata pelajaran)-->
                                @if (Auth::user()->id == $pegawai->id_user)
                                    <div class="col-md-3">
                                        <label class="small mb-1" for="inputKarpeg">Tahun Masuk</label>
                                        <input class="form-control" id="inputKarpeg" type="text" name="thmsk"
                                            placeholder="Tahun Masuk" value="{{ $pegawai->thmsk }}" required />
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputKarpeg">Tahun Masuk</label>
                                        <input class="form-control" id="inputKarpeg" type="text" name="thmsk"
                                            placeholder="Tahun Masuk" value="Tahun Masuk" required />
                                    </div>
                                @endif

                                <!-- Form Group (sertifikasi)-->
                                @if (Auth::user()->id == $pegawai->id_user)
                                    <div class="col-md-2">
                                        <label class="small mb-1" for="inputAskes">Sertifikasi</label>
                                        <input class="form-control" id="inputAskes" type="year" name="sertifikasi"
                                            placeholder="Tahun Sertifikasi" value="{{ $pegawai->sertifikasi }}"
                                            required />
                                    </div>
                                @else
                                    <div class="col-md-2">
                                        <label class="small mb-1" for="inputAskes">Sertifikasi</label>
                                        <input class="form-control" id="inputAskes" type="year" name="sertifikasi"
                                            placeholder="Tahun Sertifikasi" value="Tahun Sertifiikasi" required />
                                    </div>
                                @endif
                            </div>
                            <!-- End Form Row Sertifikasi dan Tahun Masuk -->

                            <!-- Form Row Email-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (email address)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputEmailAddress">Alamat Email</label>
                                    <input class="form-control" id="inputEmailAddress" type="email"
                                        placeholder="Enter your email address" value="{{ Auth::user()->email }}" />
                                </div>
                            </div>

                            <!-- Form Row Mapel dan Mengajar-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (mata pelajaran)-->
                                @if (Auth::user()->id == $pegawai->id_user)
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputKarpeg">Mata Pelajaran</label>
                                        <input class="form-control" id="inputKarpeg" type="text" name="mapel"
                                            placeholder="Mata Pelajaran" value="{{ $pegawai->mapel }}" />
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputKarpeg">Mata Pelajaran</label>
                                        <input class="form-control" id="inputKarpeg" type="text" name="mapel"
                                            placeholder="Mata Pelajaran" value="Mata Pelajaran" />
                                    </div>
                                @endif

                                <!-- Form Group (mengajar)-->
                                @if (Auth::user()->id == $pegawai->id_user)
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputAskes">Mengajar</label>
                                        <input class="form-control" id="inputAskes" type="text" name="mengajar"
                                            placeholder="Mata Pelajaran" value="{{ $pegawai->mengajar }}" />
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputAskes">Mengajar</label>
                                        <input class="form-control" id="inputAskes" type="text" name="mengajar"
                                            placeholder="Mata Pelajaran" value="Mengajar" />
                                    </div>
                                @endif

                            </div>
                            <!-- Save changes button-->
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- End Short Profile -->
    </div>
    </div>
    <!-- end modal jabatan lain -->
@endsection
