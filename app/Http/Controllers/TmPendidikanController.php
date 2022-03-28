<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

// Models
use App\Models\Pendidikan;

class TmPendidikanController extends Controller
{
    public function index()
    {
        $pdd = Pendidikan::all();
        return view('tm.pendidikan', [
            'pdd' => $pdd
        ]);
    }

    public function tambah(Request $request)
    {
        $pdd = new Pendidikan;
        $pdd->pendidikan = $request->pendidikan;
        $pdd->save();

        Alert::success('Penambahan Berhasil', 'Pendidikan ' . $pdd->pendidikan . ' berhasil ditambahkan');
        return redirect("/pegawai/tmpendidikan/tambah");
    }


    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('tm_pendidikan')->where('kode_pdd', $id)->delete();

        Alert::success('Sukses Hapus', 'Data berhasil dihapus');

        // alihkan halaman ke halaman pegawai
        return redirect("/pegawai/tmpendidikan/tambah");
    }
}
