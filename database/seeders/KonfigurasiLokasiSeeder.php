<?php

namespace Database\Seeders;

use App\Models\Konfigurasi_lokasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KonfigurasiLokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Konfigurasi_lokasi::updateOrCreate([
            'lokasi_kantor' => '-2.4726196, 119.1472389',
            'radius' => '20'
        ]);
    }
}