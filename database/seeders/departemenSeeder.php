<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class departemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departemen::updateOrCreate([
            'kode_dept' => 'HRD',
            'nama_dept' => 'Human Resource Development',
        ]);
        Departemen::updateOrCreate([
            'kode_dept' => 'IT',
            'nama_dept' => 'Information Technology',
        ]);
        Departemen::updateOrCreate([
            'kode_dept' => 'GA',
            'nama_dept' => 'General Affair'
        ]);
        Departemen::updateOrCreate([
            'kode_dept' => 'OP',
            'nama_dept' => 'Operasi'
        ]);
    }
}
