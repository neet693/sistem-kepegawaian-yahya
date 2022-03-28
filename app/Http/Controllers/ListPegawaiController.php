<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

// Models
use App\Models\Agama;
use App\Models\Diklat;
use App\Models\Gapok;
use App\Models\Golongan;
use App\Models\JabatanFungsional;
use App\Models\JabatanFungsionalt;
use App\Models\JabatanStruktural;
use App\Models\ListPegawai;
use App\Models\Pendidikan;
use App\Models\RiwayatDiklat;
use App\Models\UnitKerja;
use App\Models\User;

class ListPegawaiController extends Controller
{

    public function beranda()
    {
        $pegawai = ListPegawai::with(['naikkgb', 'naikkgb.gapok'])->orderBy('id_peg', 'DESC')->limit(5)->get();

        $total_pegawai = ListPegawai::all()->count();
        $total_user = User::all()->count();
        $lk = ListPegawai::where('jns_kelamin', 'L')->count();
        $pr = ListPegawai::where('jns_kelamin', 'P')->count();
        return view('pegawai.index', [
            'pegawai' => $pegawai,
            'total_pegawai' => $total_pegawai,
            'total_user' => $total_user,
            'lk' => $lk,
            'pr' => $pr
        ]);
        // return dd($peg);
        // return response()->json(['data' => $pegawai]);
    }

    public function index()
    {
        $pegawai = ListPegawai::all();
        $user = User::all();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $jbts = JabatanStruktural::all();
        $ukrj = UnitKerja::all();
        return view('pegawai.list', [
            'pegawai' => $pegawai,
            'user' => $user,
            'agama' => $agama,
            'pendidikan' => $pendidikan,
            'jbts' => $jbts,
            'ukrj' => $ukrj
        ]);
    }

    public function kumpulanpegawai()
    {
        $pegawai = ListPegawai::with('unitkerja')->get();
        $user = User::all();
        $jbts = JabatanStruktural::all();
        if (Auth::user()->role = '3' || Auth::user()->role = '4') {
            return view('pegawai.kumpulanpegawai', [
                'pegawai' => $pegawai,
                'user' => $user,
                'jbts' => $jbts
            ]);
        } else {
            return 'Data tidak ditemukan';
        }
    }

    public function direkturpegawai()
    {

        $pegawai = ListPegawai::with('unitkerja')->get();
        $user = User::all();
        return view('direktur.seluruhpegawai', [
            'pegawai' => $pegawai,
            'user' => $user,
        ]);
    }

    //Cari Pegawai
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the pegawai table
        $pegawai = ListPegawai::where('nama', 'LIKE', "%{$search}%")->get();


        // Return the search view with the resluts compacted
        return view('direktur.seluruhpegawai', compact('pegawai'));
    }

    public function tambah(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required',
            'unitkerja' => 'required',
            'nama' => 'required',
            'kelamin' => 'required',
            'sts_pegawai' => 'required',
            'user' => 'required',
            't_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            //tab 2
            'agama' => 'required',
            'pendidikan' => 'required',
            'namasekolah' => 'required',
            'jurusan' => 'required',
            'fakultas' => 'required',
            'thmsk' => 'required', //tab 3
            'sertifikasi' => 'required',
            'tamatjabatan' => 'required',
            'jbts' => 'required',
            'sts_pernikahan' => 'required',
            //Tab4
            'mapel' => 'required',
            'mengajar' => 'required',

        ]);
        $nama = $request->nama;
        $file = $request->file('foto');
        $tujuan_upload = 'foto'; //nama folder
        $file->move($tujuan_upload, $nama . '.' . $file->getClientOriginalExtension());
        // insert data ke table pegawai
        DB::table('pegawai')->insert([
            'kode_unitkerja' => $request->unitkerja,
            'nama' => $request->nama,
            't_lahir' => $request->t_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp,
            'jns_kelamin' => $request->kelamin,
            'sts_pegawai' => $request->sts_pegawai,
            'id_user' => $request->user,
            'foto' => $request->nama . '.' . $file->getClientOriginalExtension(),
            'kode_agama' => $request->agama,
            'kode_pdd' => $request->pendidikan,
            'nama_sekolah' => $request->namasekolah,
            'jurusan' => $request->jurusan,
            'fakultas' => $request->fakultas,
            'alamat' => $request->alamat,
            'thmsk' => $request->thmsk,
            'sertifikasi' => $request->sertifikasi,
            'tmt_jab' => $request->tamatjabatan,
            'kode_jbts' => $request->jbts,
            'sts_marital' => $request->sts_pernikahan,
            'mapel' => $request->mapel,
            'mengajar' => $request->mengajar,
            'sts_marital' => $request->sts_pernikahan,

        ]);
        Alert::success('Penambahan Data Berhasil', 'Data ' . $nama . ' berhasil ditambahkan');
        // alihkan halaman ke halaman pegawai
        return redirect('/list');
    }

    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('pegawai')->where('id_peg', $id)->delete();

        Alert::success('Sukses Hapus', 'Data berhasil Dihapus');
        // alihkan halaman ke halaman pegawai
        return redirect('/list');
    }


    public function edit($id, Request $request)
    {
        $this->validate($request, [
            'foto' => 'required',
            'unitkerja' => 'required',
            'nama' => 'required',
            'kelamin' => 'required',
            'sts_pegawai' => 'required',
            'user' => 'required',
            't_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            //tab 2
            'agama' => 'required',
            'pendidikan' => 'required',
            'namasekolah' => 'required',
            'jurusan' => 'required',
            'fakultas' => 'required',
            'thmsk' => 'required', //tab 3
            'sertifikasi' => 'required',
            'tamatjabatan' => 'required',
            'jbts' => 'required',
            'sts_pernikahan' => 'required',
            'mapel' => 'required',
            'mengajar' => 'required',

        ]);

        $nama = $request->nama;
        $file = $request->file('foto');
        $tujuan_upload = 'foto'; //nama folder
        $file->move($tujuan_upload, $nama . '.' . $file->getClientOriginalExtension());

        // insert data ke table pegawai
        DB::table('pegawai')->where('id_peg', $id)->update([
            'kode_unitkerja' => $request->unitkerja,
            'nama' => $request->nama,
            't_lahir' => $request->t_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp,
            'jns_kelamin' => $request->kelamin,
            'sts_pegawai' => $request->sts_pegawai,
            'id_user' => $request->user,
            'foto' => $request->nama . '.' . $file->getClientOriginalExtension(),
            'kode_agama' => $request->agama,
            'kode_pdd' => $request->pendidikan,
            'nama_sekolah' => $request->namasekolah,
            'jurusan' => $request->jurusan,
            'fakultas' => $request->fakultas,
            'alamat' => $request->alamat,
            'thmsk' => $request->thmsk,
            'sertifikasi' => $request->sertifikasi,
            'tmt_jab' => $request->tamatjabatan,
            'kode_jbts' => $request->jbts,
            'mengajar' => $request->mengajar,
            'mengajar' => $request->mapel,

        ]);
        Alert::success('Sukses Edit', 'Data berhasil di-Edit');
        // alihkan halaman ke halaman pegawai
        return redirect('/list');
    }

    public function profile($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        $pegawai = ListPegawai::where('id_peg', $id)->with([
            'naikkgb', 'agama',
            'pendidikan', 'suamiistri',
            'anak', 'orangtua',
            'riwayatdiklat', 'riwayatdiklat.diklat',
            'riwayatgapok', 'riwayatgapok.gapok',
            'riwayatindisipliner', 'riwayatjabatan',
            'riwayatjabatan.jabatanstruktural',
            'riwayatjabatanf', 'riwayatjabatanf.jabatanfungsional',
            'riwayatjabatanft', 'riwayatjabatanft.jabatanfungsionalt'
        ])->first();
        $pendidikans = Pendidikan::all();
        $diklat = Diklat::all();
        $edit = RiwayatDiklat::where('id_peg', $id)->orderBy('id_diklat', 'desc')->first();
        $gapok = Gapok::all();
        $jbts = Jabatanstruktural::all();
        $gol = Golongan::all();
        $jbtf = JabatanFungsional::all();
        $jbtft = JabatanFungsionalt::all();
        $ukrj = UnitKerja::all();
        //  alihkan halaman ke halaman pegawai
        //  return dd($pegawai);
        return view('pegawai.profile', [
            'pegawai' => $pegawai,
            'pendidikans' => $pendidikans,
            'diklat' => $diklat,
            'edit' => $edit,
            'gapok' => $gapok,
            'jbts' => $jbts,
            'gol' => $gol,
            'jbtf' => $jbtf,
            'jbtft' => $jbtft,
            'ukrj' => $ukrj
        ]);
        //return dd($pegawai);
    }

    public function cetakPegawai($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        $pegawai = ListPegawai::where('id_peg', $id)->with([
            'naikkgb', 'agama',
            'pendidikan', 'suamiistri',
            'anak', 'orangtua',
            'riwayatdiklat', 'riwayatdiklat.diklat',
            'riwayatgapok', 'riwayatgapok.gapok',
            'riwayatindisipliner', 'riwayatjabatan',
            'riwayatjabatan.jabatanstruktural',
            'riwayatjabatanf', 'riwayatjabatanf.jabatanfungsional',
            'riwayatjabatanft', 'riwayatjabatanft.jabatanfungsionalt'
        ])->first();
        $pendidikans = Pendidikan::all();
        $diklat = Diklat::all();
        $edit = RiwayatDiklat::where('id_peg', $id)->orderBy('id_diklat', 'desc')->first();
        $gapok = Gapok::all();
        $jbts = Jabatanstruktural::all();
        $gol = Golongan::all();
        $jbtf = JabatanFungsional::all();
        $jbtft = JabatanFungsionalt::all();
        $ukrj = UnitKerja::all();
        //  alihkan halaman ke halaman pegawai
        //  return dd($pegawai);
        return view('pegawai.cetak-pegawai', [
            'pegawai' => $pegawai,
            'pendidikans' => $pendidikans,
            'diklat' => $diklat,
            'edit' => $edit,
            'gapok' => $gapok,
            'jbts' => $jbts,
            'gol' => $gol,
            'jbtf' => $jbtf,
            'jbtft' => $jbtft,
            'ukrj' => $ukrj
        ]);
        //return dd($pegawai);
    }
}
