<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Models
use App\Models\Agama;
use App\Models\Jabatanstruktural;
use App\Models\Pendidikan;
use App\Models\UnitKerja;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Seeder Agama
        Agama::create(['agama' => 'Buddha',]);
        Agama::create(['agama' => 'Hindu',]);
        Agama::create(['agama' => 'Katolik',]);
        Agama::create(['agama' => 'Kristen',]);
        Agama::create(['agama' => 'Konghucu',]);
        Agama::create(['agama' => 'Islam',]);

        // Seeder Jabatan Struktural
        Jabatanstruktural::create(['nama_jabatan' => 'Direktur',]);
        Jabatanstruktural::create(['nama_jabatan' => 'Kepala Unit',]);
        Jabatanstruktural::create(['nama_jabatan' => 'Kepala Sekolah',]);
        Jabatanstruktural::create(['nama_jabatan' => 'Pegawai',]);

        // Seeder Pendidikan
        Pendidikan::create(['pendidikan' => 'SMA',]);
        Pendidikan::create(['pendidikan' => 'SMK',]);
        Pendidikan::create(['pendidikan' => 'D1',]);
        Pendidikan::create(['pendidikan' => 'D2',]);
        Pendidikan::create(['pendidikan' => 'D3',]);
        Pendidikan::create(['pendidikan' => 'D4',]);
        Pendidikan::create(['pendidikan' => 'S1',]);
        Pendidikan::create(['pendidikan' => 'S2',]);
        Pendidikan::create(['pendidikan' => 'S3',]);

        // Seeder Unit Kerja
        UnitKerja::create(['nama_unit' => 'TKK',]);
        UnitKerja::create(['nama_unit' => 'SDK',]);
        UnitKerja::create(['nama_unit' => 'SMPK',]);
        UnitKerja::create(['nama_unit' => 'SMAK',]);

        //Seeder Role
        Role::create(['nama_role' => 'admin']);
        Role::create(['nama_role' => 'direktur']);
        Role::create(['nama_role' => 'kepala_unit']);
        Role::create(['nama_role' => 'pegawai']);
    }
}
