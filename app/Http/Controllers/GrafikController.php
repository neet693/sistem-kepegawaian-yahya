<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\ListPegawai;

class GrafikController extends Controller
{
    public function index()
    {
        $lk = ListPegawai::where('jns_kelamin', 'L')->count();
        $pr = ListPegawai::where('jns_kelamin', 'P')->count();
        $menikah = ListPegawai::where('sts_marital', 'Menikah')->count();
        $bmenikah = ListPegawai::where('sts_marital', 'Belum menikah')->count();
        $akat = ListPegawai::where('kode_unitkerja', '1')->count();
        $bkat = ListPegawai::where('kode_unitkerja', '2')->count();
        $ckat = ListPegawai::where('kode_unitkerja', '3')->count();
        $dkat = ListPegawai::where('kode_unitkerja', '4')->count();
        return view('pegawai.grafik', [
            'lk' => $lk,
            'pr' => $pr,
            'menikah' => $menikah,
            'bmenikah' => $bmenikah,
            'akat' => $akat,
            'bkat' => $bkat,
            'ckat' => $ckat,
            'dkat' => $dkat
        ]);
    }
}
