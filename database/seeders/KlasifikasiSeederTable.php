<?php
namespace Database\Seeders;

use App\Klasifikasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlasifikasiSeederTable extends Seeder
{
    public function run()
    {

        DB::table('klasifikasis')->insert([
            [
                'id'             => 1,
                'code'             => 'KLS-000001',
                'subcode'             => 'SS',
                'klasifikasi'           => 'Studi dan Survey',
            ],
            [
                'id'             => 2,
                'code'             => 'KLS-000002',
                'subcode'             => 'IN',
                'klasifikasi'           => 'Investasi Tol',
            ],
            [
                'id'             => 3,
                'code'             => 'KLS-000003',
                'subcode'             => 'PR',
                'klasifikasi'           => 'Perencanaan',
            ],
            [
                'id'             => 4,
                'code'             => 'KLS-000004',
                'subcode'             => 'PP',
                'klasifikasi'           => 'Pembangunan & Perencanaan',
            ],
            [
                'id'             => 5,
                'code'             => 'KLS-000005',
                'subcode'             => 'KS',
                'klasifikasi'           => 'Kerjasama',
            ],
            [
                'id'             => 6,
                'code'             => 'KLS-000006',
                'subcode'             => 'PM',
                'klasifikasi'           => 'Pemeliharaan',
            ],
            [
                'id'             => 7,
                'code'             => 'KLS-000007',
                'subcode'             => 'PT',
                'klasifikasi'           => 'Pelayanan Transaksi',
            ],
            [
                'id'             => 8,
                'code'             => 'KLS-000008',
                'subcode'             => 'LL',
                'klasifikasi'           => 'Lalu Lintas',
            ],
            [
                'id'             => 9,
                'code'             => 'KLS-000009',
                'subcode'             => 'PF',
                'klasifikasi'           => 'Perencanaan Perusahaan & Manajemen Portofolio',
            ],
            [
                'id'             => 10,
                'code'             => 'KLS-000010',
                'subcode'             => 'TI',
                'klasifikasi'           => 'Teknologi Informasi',
            ],
            [
                'id'             => 11,
                'code'             => 'KLS-000011',
                'subcode'             => 'KU',
                'klasifikasi'           => 'Keuangan',
            ],
            [
                'id'             => 12,
                'code'             => 'KLS-000012',
                'subcode'             => 'AK',
                'klasifikasi'           => 'Akutansi',
            ],
            [
                'id'             => 13,
                'code'             => 'KLS-000013',
                'subcode'             => 'BL',
                'klasifikasi'           => 'Bina Lingkungan',
            ],
            [
                'id'             => 14,
                'code'             => 'KLS-000014',
                'subcode'             => 'HC',
                'klasifikasi'           => 'Human Capital',
            ],
            [
                'id'             => 15,
                'code'             => 'KLS-000015',
                'subcode'             => 'HK',
                'klasifikasi'           => 'Hukum',
            ],
            [
                'id'             => 16,
                'code'             => 'KLS-000016',
                'subcode'             => 'TR',
                'klasifikasi'           => 'Tatausaha & Rumah Tangga',
            ],
            [
                'id'             => 17,
                'code'             => 'KLS-000017',
                'subcode'             => 'PL',
                'klasifikasi'           => 'Perlengkapan Kantor',
            ],
            [
                'id'             => 18,
                'code'             => 'KLS-000018',
                'subcode'             => 'PA',
                'klasifikasi'           => 'Pengamanan Aset',
            ],
            [
                'id'             => 19,
                'code'             => 'KLS-000019',
                'subcode'             => 'PG',
                'klasifikasi'           => 'Pengadaan',
            ],
            [
                'id'             => 20,
                'code'             => 'KLS-000020',
                'subcode'             => 'OT',
                'klasifikasi'           => 'Organisasi dan Transformasi',
            ],
            [
                'id'             => 21,
                'code'             => 'KLS-000021',
                'subcode'             => 'DL',
                'klasifikasi'           => 'Pembelajaran dan Pengembangan',
            ],
            [
                'id'             => 22,
                'code'             => 'KLS-000022',
                'subcode'             => 'KR',
                'klasifikasi'           => 'Kesekretariatan',
            ],
            [
                'id'             => 23,
                'code'             => 'KLS-000023',
                'subcode'             => 'HM',
                'klasifikasi'           => 'Hubungan Masyarakat',
            ],
            [
                'id'             => 24,
                'code'             => 'KLS-000024',
                'subcode'             => 'MR',
                'klasifikasi'           => 'Manajemen Risiko',
            ],
            [
                'id'             => 25,
                'code'             => 'KLS-000025',
                'subcode'             => 'MM',
                'klasifikasi'           => 'Manajemen Mutu',
            ],
            [
                'id'             => 26,
                'code'             => 'KLS-000026',
                'subcode'             => 'PW',
                'klasifikasi'           => 'Pengawasaan',
            ],
        ]
        );
    }
}