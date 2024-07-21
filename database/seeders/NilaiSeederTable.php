<?php
namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiSeederTable extends Seeder
{
    public function run()
    {

        DB::table('values')->insert([
            [
                'id'             => 1,
                'code'             => 'SCR-000001',
                'user_id'             => 5,
                'nilai_1'           => 4,
                'nilai_2'       => 4,
                'nilai_3'        => 3,
                'nilai_4' => 2,
                'nilai_5' => 1,
                'nilai_6'        => 3,
                'nilai_7' => 2,
                'nilai_8' => 4,
            ],
            [
                'id'             => 2,
                'code'             => 'SCR-000002',
                'user_id'             => 7,
                'nilai_1'           => 3,
                'nilai_2'       => 2,
                'nilai_3'        => 3,
                'nilai_4' => 4,
                'nilai_5' => 4,
                'nilai_6'        => 4,
                'nilai_7' => 4,
                'nilai_8' => 2,
            ],
            [
                'id'             => 3,
                'code'             => 'SCR-000003',
                'user_id'             => 9,
                'nilai_1'           => 2,
                'nilai_2'       => 1,
                'nilai_3'        => 2,
                'nilai_4' => 4,
                'nilai_5' => 2,
                'nilai_6'        => 3,
                'nilai_7' => 2,
                'nilai_8' => 4,
            ],
            [
                'id'             => 4,
                'code'             => 'SCR-000004',
                'user_id'             => 10,
                'nilai_1'           => 1,
                'nilai_2'       => 3,
                'nilai_3'        => 4,
                'nilai_4' => 4,
                'nilai_5' => 1,
                'nilai_6'        => 1,
                'nilai_7' => 4,
                'nilai_8' => 1,
            ],
            [
                'id'             => 5,
                'code'             => 'SCR-000005',
                'user_id'             => 11,
                'nilai_1'           => 4,
                'nilai_2'       => 2,
                'nilai_3'        => 3,
                'nilai_4' => 2,
                'nilai_5' => 3,
                'nilai_6'        => 4,
                'nilai_7' => 2,
                'nilai_8' => 1,
            ],
            [
                'id'             => 6,
                'code'             => 'SCR-000006',
                'user_id'             => 12,
                'nilai_1'           => 4,
                'nilai_2'       => 3,
                'nilai_3'        => 3,
                'nilai_4' => 2,
                'nilai_5' => 1,
                'nilai_6'        => 3,
                'nilai_7' => 2,
                'nilai_8' => 3,
            ],
            [
                'id'             => 7,
                'code'             => 'SCR-000007',
                'user_id'             => 13,
                'nilai_1'           => 3,
                'nilai_2'       => 2,
                'nilai_3'        => 3,
                'nilai_4' => 3,
                'nilai_5' => 3,
                'nilai_6'        => 3,
                'nilai_7' => 2,
                'nilai_8' => 2,
            ],
            [
                'id'             => 8,
                'code'             => 'SCR-000008',
                'user_id'             => 14,
                'nilai_1'           => 2,
                'nilai_2'       => 1,
                'nilai_3'        => 2,
                'nilai_4' => 2,
                'nilai_5' => 2,
                'nilai_6'        => 3,
                'nilai_7' => 2,
                'nilai_8' => 2,
            ],
            
            [
                'id'             => 9,
                'code'             => 'SCR-000009',
                'user_id'             => 15,
                'nilai_1'           => 1,
                'nilai_2'       => 3,
                'nilai_3'        => 3,
                'nilai_4' => 3,
                'nilai_5' => 1,
                'nilai_6'        => 1,
                'nilai_7' => 2,
                'nilai_8' => 1,
            ],
            [
                'id'             => 10,
                'code'             => 'SCR-000010',
                'user_id'             => 16,
                'nilai_1'           => 2,
                'nilai_2'       => 2,
                'nilai_3'        => 3,
                'nilai_4' => 2,
                'nilai_5' => 3,
                'nilai_6'        => 1,
                'nilai_7' => 2,
                'nilai_8' => 1,
            ],
            
        ]
        );

    }
}