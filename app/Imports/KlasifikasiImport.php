<?php

namespace App\Imports;

use App\Models\Klasifikasi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

// class ArsipTrainingImport implements ToModel
HeadingRowFormatter::default('none');
class KlasifikasiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Klasifikasi([
            'code' => $row['Code'],
            'subcode' => $row['Subcode'],
            'klasifikasi' => $row['Klasifikasi'],
        ]);
    }
}