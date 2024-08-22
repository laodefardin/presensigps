<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class karyawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Karyawan::updateOrCreate([
            'email'   =>  'laodefardin@gmail.com',
            'nama_lengkap' => 'Laode Muh Zulfardinsyah',
            'jabatan'   => 'Staff IT',
            'no_hp' => '082393448980',
            'foto' => '',
            'kode_dept' => 'IT',
            'password' => Hash::make('fardin123'),
        ]);
        Karyawan::updateOrCreate([
            'email'   =>  'arsal@gmail.com',
            'nama_lengkap' => 'Reski Arsal',
            'jabatan'   => 'Staff Rendal',
            'no_hp' => '082393xxxxxxx',
            'foto' => '',
            'kode_dept' => 'OP',
            'password' => Hash::make('arsal123'),
        ]);
    }
}
