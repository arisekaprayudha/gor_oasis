<?php
namespace Database\Seeders;

use App\Index;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndexSeederTable extends Seeder
{
    public function run()
    {

        DB::table('indices')->insert([
            [
                'id'             => 1,
                'code'             => 'IDX-000001',
                'index'           => 'KB',
            ],
            [
                'id'             => 2,
                'code'             => 'IDX-000002',
                'index'           => 'Voucher',
            ],
            [
                'id'             => 3,
                'code'             => 'IDX-000003',
                'index'           => 'Pembayaran',
            ],
            [
                'id'             => 4,
                'code'             => 'IDX-000004',
                'index'           => 'Pengadaan',
            ],
            [
                'id'             => 5,
                'code'             => 'IDX-000005',
                'index'           => 'Penerimaan',
            ],
            [
                'id'             => 6,
                'code'             => 'IDX-000006',
                'index'           => 'TB',
            ],
            [
                'id'             => 7,
                'code'             => 'IDX-000007',
                'index'           => 'AR',
            ],
            [
                'id'             => 8,
                'code'             => 'IDX-000008',
                'index'           => 'Journal Umum',
            ],
            [
                'id'             => 9,
                'code'             => 'IDX-000009',
                'index'           => 'Sales Journal',
            ],
            [
                'id'             => 10,
                'code'             => 'IDX-000010',
                'index'           => 'Memorial',
            ],
            [
                'id'             => 11,
                'code'             => 'IDX-000011',
                'index'           => 'AP',
            ],
            [
                'id'             => 12,
                'code'             => 'IDX-000012',
                'index'           => 'Laporan',
            ],
            [
                'id'             => 13,
                'code'             => 'IDX-000013',
                'index'           => 'Dokumen Panitia pengadaan',
            ],
            [
                'id'             => 14,
                'code'             => 'IDX-000014',
                'index'           => 'Dokumen Persiapan pengadaan',
            ],
            [
                'id'             => 15,
                'code'             => 'IDX-000015',
                'index'           => 'Laporan MC',
            ],
            [
                'id'             => 16,
                'code'             => 'IDX-000016',
                'index'           => 'K3',
            ],
            [
                'id'             => 17,
                'code'             => 'IDX-000017',
                'index'           => 'Invoice',
            ],
            [
                'id'             => 18,
                'code'             => 'IDX-000018',
                'index'           => 'Kontrak',
            ],
            [
                'id'             => 19,
                'code'             => 'IDX-000019',
                'index'           => 'Sertifikat',
            ],
            [
                'id'             => 20,
                'code'             => 'IDX-000020',
                'index'           => 'Rapat',
            ],
            [
                'id'             => 21,
                'code'             => 'IDX-000021',
                'index'           => 'Backup',
            ],
            [
                'id'             => 22,
                'code'             => 'IDX-000022',
                'index'           => 'Pekerjaan',
            ],
            [
                'id'             => 23,
                'code'             => 'IDX-000023',
                'index'           => 'Akta',
            ],
            [
                'id'             => 24,
                'code'             => 'IDX-000024',
                'index'           => 'Addendum',
            ],
            [
                'id'             => 25,
                'code'             => 'IDX-000025',
                'index'           => 'As Built Drawing',
            ],
        ]
        );
    }
}