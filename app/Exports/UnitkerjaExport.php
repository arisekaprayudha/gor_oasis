<?php

namespace App\Exports;

use App\Models\UnitKerja;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UnitkerjaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UnitKerja::all();
    }

    public function map($unitkerja): array
    {
        return [
            $unitkerja->code,
            $unitkerja->subcode,
            $unitkerja->unitkerja,
        ];

    }

    public function headings(): array{
        return [
            'CODE',
            'SUBCODE',
            'UNIT KERJA',
        ];
    }
}
