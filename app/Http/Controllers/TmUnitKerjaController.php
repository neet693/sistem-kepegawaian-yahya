<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitKerja;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class TmUnitKerjaController extends Controller
{
    public function index()
    {
        $unit_kerja = UnitKerja::all();

        return view('tm.unitkerja', [
            'unit_kerja' => $unit_kerja
        ]);
    }

    public function tambah(Request $request)
    {
        $ukerja = new UnitKerja;
        $ukerja->nama = $request->nama;
        $ukerja->save();

        Alert::success('Penambahan Berhasil', 'Agama ' . $ukerja->nama . ' berhasil ditambahkan');
        return redirect("/pegawai/tmunitkerja/tambah");
    }


    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('unit_kerja')->where('kode_unitkerja', $id)->delete();

        Alert::success('Sukses Hapus', 'Data berhasil dihapus');

        // alihkan halaman ke halaman pegawai
        return redirect("/pegawai/tmunitkerja/tambah");
    }
}
