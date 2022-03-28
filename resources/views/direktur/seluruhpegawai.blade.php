@extends('layouts.induk')
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
                        <form action="{{ route('search') }}" method="GET">
                            <input type="text" name="search" required />
                            <button type="submit">Search</button>
                        </form>
                        <div class="line"></div>
                        <a href="/seluruhpegawai">Kembali</a>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($pegawai as $p)
                    <!-- Single Advisor-->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <!-- Team Thumb-->
                            <div class="advisor_thumb"><img src="foto/{{ $p->foto }}" alt="Foto Pegawai">
                                <!-- Button -->
                                <div class="social-info">
                                    <a href="/pegawai/profile/{{ $p->id_peg }}" title="Lihat Detail" target="_blank"><i
                                            class="fa fa-address-card-o"></i></a>
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
            </div>
        </div>
    </div>

@endsection
