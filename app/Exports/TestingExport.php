<?php

namespace App\Exports;

use App\Models\Testing;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TestingExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Testing::all();
    }

    public function map($testing): array
    {
        return [
            $testing->code,
            $testing->namabarang,
            $testing->kategori,
            $testing->satuan,
            $testing->harga,
            $testing->berat,
            $testing->ukuran,
            $testing->bentuk,
            $testing->penjualan,
            $testing->jumlahpeminat,
        ];

    }

    public function headings(): array{
        return [
            'CODE',
            'NAMA BARANG',
            'KATEGORI',
            'SATUAN',
            'HARGA',
            'BERAT',
            'UKURAN',
            'BENTUK',
            'PENJUALAN',
            'JUMLAH PEMINAT',
        ];
    }
}
