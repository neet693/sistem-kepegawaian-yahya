<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

// Models
use App\Models\Riwayatjabatanft;
use App\Models\JabatanFungsionalt;
use App\Models\ListPegawai;

class RiwayatJabatanftController extends Controller
{
    public function tambah(Request $request)
    {
        $jabatanft = new Riwayatjabatanft;
        $jabatanft->id_peg = $request->id_peg;
        $jabatanft->kode_jbtft = $request->kode_jbtft;
        $jabatanft->no_sk = $request->no_sk;
        $jabatanft->tgl_sk = $request->tgl_sk;
        $jabatanft->pejabat_sk = $request->pejabat_sk;
        $jabatanft->tmt = $request->tmt;
        $jabatanft->save();

        Alert::success('Sukses Tambah', 'Data berhasil ditambahkan');
        return redirect("/pegawai/profile/$request->id_peg");
    }

    public function edit($id, Request $request)
    {
        DB::table('riwayat_jabatanftambahan')->where('id_jbtft', $id)->update([
            'id_peg' => $request->id_peg,
            'kode_jbtft' => $request->kode_jbtft,
            'no_sk' => $request->no_sk,
            'tgl_sk' => $request->tgl_sk,
            'pejabat_sk' => $request->pejabat_sk,
            'tmt' => $request->tmt
        ]);
        Alert::success('Sukses Edit', 'Data berhasil di-Edit');
        return redirect("/pegawai/profile/$request->id_peg");
    }


    public function editpage($id, $id1)
    {
        $jabatanft = RiwayatJabatanft::where('id_jbtft', $id)->first();
        $pegawai = ListPegawai::where('id_peg', $id1)->first();
        $jbtft = JabatanFungsionalt::all();
        return view('pegawai.editjabatanft', [
            'jabatanft' => $jabatanft,
            'pegawai' => $pegawai,
            'jbtft' => $jbtft,

        ]);

        //  return dd($hukuman);
    }

    public function hapus($id, Request $request)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('riwayat_jabatanftambahan')->where('id_jbtft', $id)->delete();

        Alert::success('Sukses Hapus', 'Data berhasil dihapus');

        // alihkan halaman ke halaman pegawai
        return redirect("/pegawai/profile/$request->id_peg");
    }
}
