@extends('layouts.app')
@section('title', 'SIMPEG SKY - Register')
@section('content')
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

    <div class="container">
        <div class="row justify-content-center">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"
                            style="background-image: url({{ asset('img/banner-yahya.jpg') }}); background-size: cover; background-repeat: no-repeat;">
                        </div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <input id="name" type="text" placeholder="Nama Anda"
                                                class="form-control form-control-user @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required autocomplete="name"
                                                autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <input id="email" type="email" placeholder="Email Anda"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <input id="password" type="password" placeholder="Enter Your Password Here"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <input id="password-confirm" placeholder="Enter Yout Confirm Password"
                                                type="password" class="form-control" name="password_confirmation" required
                                                autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <label for="role_id">Pilih Role Anda</label>
                                            <select name="role_id" id="role_id" class="form-control" required>
                                                <option value="1">Admin</option>
                                                <option value="2">Direktur</option>
                                                <option value="3">Kepala Sekolah / Kepala Unit</option>
                                                <option value="4">Pegawai</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ukrj_nama">Pilih Unit Anda</label>
                                            <select name="ukrj_nama" id="ukrj_nama" class="form-control" required>
                                                <option value="admin">Saya Adalah Admin</option>
                                                <option value="direktur">Saya Adalah Direktur</option>
                                                <option value="TK">TK</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA">SMA</option>
                                                <option value="IT DEPARTMENT">IT DEPARTMENT</option>
                                                <option value="PROYEK SARPRAS">PROYEK SARPRAS</option>
                                                <option value="TU PUSAT">TU PUSAT</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-3">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('password.request') }}">Lupa Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Sudah Punya Akun? Login
                                        disini!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
