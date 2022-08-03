<?php

namespace App\Imports;

use App\Models\Arsip;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

// class ArsipTrainingImport implements ToModel
HeadingRowFormatter::default('none');
class ArsipImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Arsip([
            'code' => $row['No Kode Pelaksan'],
            'index_id' => $row['ID Index'],
            'klasifikasi_id' => $row['ID Klasifikasi'],
            'unitkerja_id' => $row['ID Unit Kerja'],
            'tingkatpengembangan' => $row['Tingkat Pengembangan'],
            'uraian' => $row['Uraian'],
            'media' => $row['Media'],
            'kondisi' => $row['Kondisi'],
            'lokasi' => $row['Lokasi'],
            'jumlah' => $row['Jumlah'],
            'retensi' => $row['Retensi'],
            'akhirRetensi' => $row['Akhir Retensi'],
            'tahun' => $row['Tahun'],
        ]);
    }
}