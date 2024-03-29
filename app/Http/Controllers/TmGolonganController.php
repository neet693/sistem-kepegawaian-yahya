<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
// Models
use App\Models\Golongan;

class TmGolonganController extends Controller
{
    public function index()
    {
        $gol = Golongan::all();
        return view('tm.golongan', [
            'gol' => $gol
        ]);
    }

    public function tambah(Request $request)
    {
        $agm = new Golongan;
        $agm->pangkat = $request->pangkat;
        $agm->save();

        Alert::success('Sukses Tambah', 'Data berhasil ditambahkan');
        return  redirect()->back();
    }


    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('tm_golongan')->where('kode_gol', $id)->delete();

        Alert::success('Sukses Hapus', 'Data berhasil dihapus');

        // alihkan halaman ke halaman pegawai
        return redirect()->back();
    }
}
