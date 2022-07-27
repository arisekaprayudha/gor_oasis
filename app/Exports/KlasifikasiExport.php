<?php

namespace App\Exports;

use App\Models\Klasifikasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KlasifikasiExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Klasifikasi::all();
    }

    public function map($klasifikasi): array
    {
        return [
            $klasifikasi->code,
            $uklasifikasi->subcode,
            $klasifikasi->klasifikasi,
        ];

    }

    public function headings(): array{
        return [
            'CODE',
            'SUBCODE',
            'KLASIFIKASI',
        ];
    }
}
