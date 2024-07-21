<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BobotSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bobots')->insert([
            [
                'id'             => 1,
                'code'             => 'BBT-000001',
                'nama_kriteria'           => 'Ketangkasan / cekatan',
                'bobot'             => 3,
            ],
            [
                'id'             => 2,
                'code'             => 'BBT-000002',
                'nama_kriteria'           => 'Tanggung jawab & displin (Absensi)',
                'bobot'             => 3,
            ],
            [
                'id'             => 3,
                'code'             => 'BBT-000003',
                'nama_kriteria'           => 'Kerjasama tim',
                'bobot'             => 2,
            ],
            [
                'id'             => 4,
                'code'             => 'BBT-000004',
                'nama_kriteria'           => 'Menghormati lawan',
                'bobot'             => 2,
            ],  
            [
                'id'             => 5,
                'code'             => 'BBT-000005',
                'nama_kriteria'           => 'Kemahiran memegang raket',
                'bobot'             => 4,
            ],
            [
                'id'             => 6,
                'code'             => 'BBT-000006',
                'nama_kriteria'           => 'Kemahiran service & tinggi',
                'bobot'             => 2,
            ],
            [
                'id'             => 7,
                'code'             => 'BBT-000007',
                'nama_kriteria'           => 'Kemahiran Deep lob/Clear',
                'bobot'             => 2,
            ],
            [
                'id'             => 8,
                'code'             => 'BBT-000008',
                'nama_kriteria'           => 'Kemahiran Attacking lob/clear',
                'bobot'             => 2,
            ],  
        ]);
    }
}