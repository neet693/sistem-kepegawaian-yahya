<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


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

class UserProfileController extends Controller
{

    public function show(Request $request)
    {

        $user = Auth::User();
        Session::put('user', $user);
        $user = Session::get('user');
        $profile = $user->id;

        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $user = DB::table('users')->get();
        $pegawai = DB::table('pegawai')->where('id_user', $profile)->first();

        if (empty($pegawai)) {
            $pegawai = DB::table('pegawai')->where('id_user', $profile)->first();
            return view('profile.show', compact('pegawai', 'user', 'agama', 'pendidikan'));
        } else {
            $id_user = $pegawai->id_user;
            if ($id_user == $profile) {
                $pegawai = DB::table('pegawai')->where('id_user', $profile)->first();
                return view('profile.show', compact('pegawai', 'user', 'agama', 'pendidikan'));
            } else {
                $pegawai = ListPegawai::all();
                return view('profile.show', compact('pegawai', 'user', 'agama', 'pendidikan'));
            }
        }
    }

    public function edit($id, Request $request)
    {
        $this->validate($request, [
            'foto' => 'required',
            'nama' => 'required',
            'kelamin' => 'required',
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
            'nama' => $request->nama,
            't_lahir' => $request->t_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp,
            'jns_kelamin' => $request->kelamin,
            'foto' => $request->nama . '.' . $file->getClientOriginalExtension(),
            'kode_agama' => $request->agama,
            'kode_pdd' => $request->pendidikan,
            'nama_sekolah' => $request->namasekolah,
            'jurusan' => $request->jurusan,
            'fakultas' => $request->fakultas,
            'alamat' => $request->alamat,
            'thmsk' => $request->thmsk,
            'sertifikasi' => $request->sertifikasi,
            'mengajar' => $request->mengajar,
            'mengajar' => $request->mapel,

        ]);
        Alert::success('Sukses Edit', 'Data berhasil di-Edit');
        // alihkan halaman ke halaman pegawai
        return redirect('/dashboard');
    }
}


    // public function edit(Request $request)
    // {
    //     $pegawai = ListPegawai::updateOrCreate(['id_peg' => $request->id_peg]);
    //     $pegawai->nama         = $request->nama;
    //     $pegawai->id_peg       = $request->id_peg;
    //     // $pegawai->email        = $request->email;
    //     // $pegawai->birth_date   = $request->birthDate;
    //     // $pegawai->gender       = $request->gender;
    //     // $pegawai->address      = $request->address;
    //     // $pegawai->state        = $request->state;
    //     // $pegawai->country      = $request->country;
    //     // $pegawai->pin_code     = $request->pin_code;
    //     // $pegawai->phone_number = $request->phone_number;
    //     // $pegawai->department   = $request->department;
    //     // $pegawai->designation  = $request->designation;
    //     // $pegawai->reports_to   = $request->reports_to;
    //     $pegawai->save();
    //     Alert::success('Sukses Edit', 'Data berhasil di-Edit');
    //     // alihkan halaman ke halaman pegawai
    //     return redirect('/dashboard');
    // }

    // public function editPegawai($id)
    // {
    //     $pegawai = ListPegawai::where('id_peg', $id)->first();
    //     $pegawai->user_id += User::get('id_user');

    //     // if the pegawai$pegawai has a user, update it
    //     if ($pegawai->user) {
    //         $pegawai->user->user_id += User::get('id_user');
    //         $pegawai->user->save();
    //     }

    //     $pegawai->save();
    //     return redirect()->back();
    // }
