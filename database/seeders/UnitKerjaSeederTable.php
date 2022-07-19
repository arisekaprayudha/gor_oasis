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
                'subcode'             => 'SS',
                'unitkerja'           => 'Studi dan Survey',
            ],
            [
                'id'             => 2,
                'code'             => 'UNT-000002',
                'subcode'             => 'IN',
                'unitkerja'           => 'Investasi Tol',
            ],
            [
                'id'             => 3,
                'code'             => 'UNT-000003',
                'subcode'             => 'PR',
                'unitkerja'           => 'Perencanaan',
            ],
            [
                'id'             => 4,
                'code'             => 'UNT-000004',
                'subcode'             => 'PP',
                'unitkerja'           => 'Pembangunan & Perencanaan',
            ],
            [
                'id'             => 5,
                'code'             => 'UNT-000005',
                'subcode'             => 'KS',
                'unitkerja'           => 'Kerjasama',
            ],
            [
                'id'             => 6,
                'code'             => 'UNT-000006',
                'subcode'             => 'PM',
                'unitkerja'           => 'Pemeliharaan',
            ],
            [
                'id'             => 7,
                'code'             => 'UNT-000007',
                'subcode'             => 'PT',
                'unitkerja'           => 'Pelayanan Transaksi',
            ],
            [
                'id'             => 8,
                'code'             => 'UNT-000008',
                'subcode'             => 'LL',
                'unitkerja'           => 'Lalu Lintas',
            ],
            [
                'id'             => 9,
                'code'             => 'UNT-000009',
                'subcode'             => 'PF',
                'unitkerja'           => 'Perencanaan Perusahaan & Manajemen Portofolio',
            ],
            [
                'id'             => 10,
                'code'             => 'UNT-000010',
                'subcode'             => 'TI',
                'unitkerja'           => 'Teknologi Informasi',
            ],
            [
                'id'             => 11,
                'code'             => 'UNT-000011',
                'subcode'             => 'KU',
                'unitkerja'           => 'Keuangan',
            ],
            [
                'id'             => 12,
                'code'             => 'UNT-000012',
                'subcode'             => 'AK',
                'unitkerja'           => 'Akutansi',
            ],
            [
                'id'             => 13,
                'code'             => 'UNT-000013',
                'subcode'             => 'BL',
                'unitkerja'           => 'Bina Lingkungan',
            ],
            [
                'id'             => 14,
                'code'             => 'UNT-000014',
                'subcode'             => 'HC',
                'unitkerja'           => 'Human Capital',
            ],
            [
                'id'             => 15,
                'code'             => 'UNT-000015',
                'subcode'             => 'HK',
                'unitkerja'           => 'Hukum',
            ],
            [
                'id'             => 16,
                'code'             => 'UNT-000016',
                'subcode'             => 'TR',
                'unitkerja'           => 'Tatausaha & Rumah Tangga',
            ],
            [
                'id'             => 17,
                'code'             => 'UNT-000017',
                'subcode'             => 'PL',
                'unitkerja'           => 'Perlengkapan Kantor',
            ],
            [
                'id'             => 18,
                'code'             => 'UNT-000018',
                'subcode'             => 'PA',
                'unitkerja'           => 'Pengamanan Aset',
            ],
            [
                'id'             => 19,
                'code'             => 'UNT-000019',
                'subcode'             => 'PG',
                'unitkerja'           => 'Pengadaan',
            ],
            [
                'id'             => 20,
                'code'             => 'UNT-000020',
                'subcode'             => 'OT',
                'unitkerja'           => 'Organisasi dan Transformasi',
            ],
            [
                'id'             => 21,
                'code'             => 'UNT-000021',
                'subcode'             => 'DL',
                'unitkerja'           => 'Pembelajaran dan Pengembangan',
            ],
            [
                'id'             => 22,
                'code'             => 'UNT-000022',
                'subcode'             => 'KR',
                'unitkerja'           => 'Kesekretariatan',
            ],
            [
                'id'             => 23,
                'code'             => 'UNT-000023',
                'subcode'             => 'HM',
                'unitkerja'           => 'Hubungan Masyarakat',
            ],
            [
                'id'             => 24,
                'code'             => 'UNT-000024',
                'subcode'             => 'MR',
                'unitkerja'           => 'Manajemen Risiko',
            ],
            [
                'id'             => 25,
                'code'             => 'UNT-000025',
                'subcode'             => 'MM',
                'unitkerja'           => 'Manajemen Mutu',
            ],
            [
                'id'             => 26,
                'code'             => 'UNT-000026',
                'subcode'             => 'PW',
                'unitkerja'           => 'Pengawasaan',
            ],
        ]
        );
    }
}