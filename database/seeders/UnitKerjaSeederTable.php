<?php
namespace Database\Seeders;

use App\UnitKerja;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitKerjaSeederTable extends Seeder
{
    public function run()
    {

        DB::table('unit_kerjas')->insert([
            [
                'id'             => 1,
                'code'             => 'UNT-000001',
                'unitkerja'           => 'PROJECT CONSTRUCTION,AMP & HEAVY EQUIPMENT',
            ],
            [
                'id'             => 2,
                'code'             => 'UNT-000002',
                'unitkerja'           => 'ASSET MANAGEMENT & TECHNOLOGY DEVELOPMENT',
            ],
            [
                'id'             => 3,
                'code'             => 'UNT-000003',
                'unitkerja'           => 'BUSINESS DEVELOPMENT',
            ],
            [
                'id'             => 4,
                'code'             => 'UNT-000004',
                'unitkerja'           => 'OPERATION 1',
            ],
            [
                'id'             => 5,
                'code'             => 'UNT-000005',
                'unitkerja'           => 'MAINTENANCE SERVICE AREA',
            ],
            [
                'id'             => 6,
                'code'             => 'UNT-000006',
                'unitkerja'           => 'OPERATION 2',
            ],
            [
                'id'             => 7,
                'code'             => 'UNT-000007',
                'unitkerja'           => 'MAINTENANCE SERVICE AREA',
            ],
            [
                'id'             => 8,
                'code'             => 'UNT-000008',
                'unitkerja'           => 'OPERATION 3',
            ],
            [
                'id'             => 9,
                'code'             => 'UNT-000009',
                'unitkerja'           => 'MAINTENANCE SERVICE AREA',
            ],
            [
                'id'             => 10,
                'code'             => 'UNT-000010',
                'unitkerja'           => 'CORPORATE PLANNING,FINANCE, TAX & ACCOUNTING',
            ],
            [
                'id'             => 11,
                'code'             => 'UNT-000011',
                'unitkerja'           => 'RISK MANAGEMENT & QHSE',
            ],
            [
                'id'             => 12,
                'code'             => 'UNT-000012',
                'unitkerja'           => 'HUMAN CAPITAL & GENERAL AFFAIR',
            ],
            [
                'id'             => 13,
                'code'             => 'UNT-000013',
                'unitkerja'           => 'PROCUREMENT',
            ],
        ]
        );
    }
}