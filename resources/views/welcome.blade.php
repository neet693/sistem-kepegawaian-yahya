@extends('luar.induk')
@section('title', 'SKYPEG - Home')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen justify-content-center align-items-center">
                <div class="col-lg-8">
                    <div class="banner-content text-center">
                        <img src="{{ asset('img/logo-yahya.png') }}" alt="Logo Yahya" style="width: 200px">
                        <h1 class="brand brand-name text-white"><i style="color:#0BB5EA">SKY</i> PEG
                        </h1>
                        <p class="text-uppercase text-white">Sistem Informasi Kepegawaian Sekolah Kristen Yahya</p>
                        <a href="{{ route('login') }}" class="primary-btn banner-btn">Masuk</a>
                        <a href="{{ route('register') }}" class="primary-btn banner-btn">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
