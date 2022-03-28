<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

// Models
use App\Models\Jabatanstruktural;

class TmJabatanstrukturalController extends Controller
{
    public function index()
    {
        $jbts = Jabatanstruktural::all();
        return view('tm.jabatans', [
            'jbts' => $jbts
        ]);
    }

    public function tambah(Request $request)
    {
        $jbts = new Jabatanstruktural;
        $jbts->nama_jabatan = $request->nama_jabatan;
        $jbts->save();

        Alert::success('Penambahan Berhasil', 'Jabatan ' . $jbts->nama_jabatan . ' berhasil ditambahkan');
        return redirect("/pegawai/tmjabatans/tambah");
    }


    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('tm_jabatanstruktural')->where('kode_jbts', $id)->delete();

        Alert::success('Sukses Hapus', 'Data berhasil dihapus');

        // alihkan halaman ke halaman pegawai
        return redirect("/pegawai/tmjabatans/tambah");
    }
}
