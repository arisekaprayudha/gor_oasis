<?php

namespace App\Imports;

use App\Models\UnitKerja;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

// class ArsipTrainingImport implements ToModel
HeadingRowFormatter::default('none');
class UnitKerjaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new UnitKerja([
            'code' => $row['Code'],
            'unitkerja' => $row['Unit Kerja'],
        ]);
    }
}