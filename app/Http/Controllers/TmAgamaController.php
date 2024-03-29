<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
// Models
use App\Models\Agama;

class TmAgamaController extends Controller
{
    public function index()
    {
        $agama = Agama::all();

        return view('tm.agama', [
            'agama' => $agama
        ]);
    }

    public function tambah(Request $request)
    {
        $agm = new Agama;
        $agm->agama = $request->agama;
        $agm->save();

        Alert::success('Penambahan Berhasil', 'Agama ' . $agm->agama . ' berhasil ditambahkan');
        return redirect()->back();
    }


    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('tm_agama')->where('kode_agama', $id)->delete();

        Alert::success('Sukses Hapus', 'Data berhasil dihapus');

        // alihkan halaman ke halaman pegawai
        return redirect("/pegawai/tmagama/tambah");
    }
}
