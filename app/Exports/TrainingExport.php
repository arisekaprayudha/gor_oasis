<?php

namespace App\Exports;

use App\Models\Training;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrainingExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Training::all();
    }

    public function map($training): array
    {
        return [
            $training->code,
            $training->namabarang,
            $training->kategori,
            $training->satuan,
            $training->harga,
            $training->berat,
            $training->ukuran,
            $training->bentuk,
            $training->penjualan,
            $training->jumlahpeminat,
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
