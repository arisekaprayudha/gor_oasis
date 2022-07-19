<?php

namespace App\Exports;

use App\Models\Arsip;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ArsipExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Arsip::all();
    }

    public function map($arsip): array
    {
        return [
            $arsip->code,
            $arsip->uraian,
            $arsip->index_id,
        ];

    }

    public function headings(): array{
        return [
            'NOMER PELAKSANAAN',
            'URAIAN',
            'INDEX',
        ];
    }
}
