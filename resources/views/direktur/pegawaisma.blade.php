@extends('layouts.fix')
@section('title', 'SIMPEG SKY - List Pegawai SMA')
@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- row Pegawai Baru -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <!-- Section Heading-->
                    <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <h3>List Pegawai <span> Sekolah Kristen Yahya</span></h3>
                        {{-- <p>Appland is completely creative, lightweight, clean &amp; super responsive app landing page.</p> --}}
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($pegawai->isNotEmpty())
                    @foreach ($pegawai as $p)
                        @if ($p->unitkerja->nama_unit == 'SMA')
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
                        @endif
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
