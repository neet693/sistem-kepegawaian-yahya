@extends('layouts.fix')
@section('title', 'Direktur Dashboard')
@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- row Pegawai Baru -->


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6 mb-3">
                    <!-- Section Heading-->
                    <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <h3>List Pegawai <span> Sekolah Kristen Yahya</span></h3>
                        <div class="line"></div>
                    </div>
                    <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <form action="{{ route('search') }}" method="GET"
                            class="d-none
                            d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control bg-gradient-light border-0"
                                    placeholder="Cari Pegawai..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <a href="{{ route('seluruhpegawai') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Kembali</span></a>
            </div>

            <div class="row">
                @if ($pegawai->isNotEmpty())
                    @foreach ($pegawai as $p)
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s"
                                style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <!-- Team Thumb-->
                                <div class="advisor_thumb"><img src="foto/{{ $p->foto }}" alt="Foto Pegawai">
                                    <!-- Button -->
                                    <div class="social-info">
                                        <a href="/pegawai/profile/{{ $p->id_peg }}" title="Lihat Detail"
                                            target="_blank"><i class="fa fa-address-card-o"></i></a>
                                        <a href="/pegawai/cetak/{{ $p->id_peg }}" title="Cetak"><i
                                                class="fa fa-print"></i></a>
                                    </div>
                                </div>
                                <!-- Team Details-->
                                <div class="single_advisor_details_info">
                                    <h6>{{ $p->nama }}</h6>
                                    <p class="designation">Unit Kerja {{ $p->unitkerja->nama_unit }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="justify-content-center">
                        <h6>Tidak Ada Data Pegawai</h6>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
