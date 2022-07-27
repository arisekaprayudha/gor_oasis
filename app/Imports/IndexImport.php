<?php

namespace App\Imports;

use App\Models\Index;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

// class ArsipTrainingImport implements ToModel
HeadingRowFormatter::default('none');
class IndexImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Index([
            'code' => $row['Code'],
            'subcode' => $row['Subcode'],
            'klasifikasi_id' => $row['Klasifikasi ID'],
            'index' => $row['Index'],
        ]);
    }
}