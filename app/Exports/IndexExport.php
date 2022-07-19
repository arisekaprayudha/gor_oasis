<?php

namespace App\Exports;

use App\Models\Index;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IndexExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Index::all();
    }

    public function map($index): array
    {
        return [
            $index->code,
            $index->subcode,
            $index->index,
        ];

    }

    public function headings(): array{
        return [
            'CODE',
            'SUBCODE',
            'INDEX',
        ];
    }
}
