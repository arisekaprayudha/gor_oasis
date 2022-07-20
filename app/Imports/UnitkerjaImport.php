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
            'index_id' => $row['Index'],
            'klasifikasi' => $row['ID Klasifikasi'],
            'unitkerja_id' => $row['ID Unit Kerja'],
            'uraian' => $row['Uraian'],
            'tanggal' => $row['Tanggal'],
            'tingkatpengembangan' => $row['Tingkat Pengembangan'],
            'media' => $row['Media'],
            'kondisi' => $row['Kondisi'],
            'jumlah' => $row['Jumlah'],
            'lokasi' => $row['Lokasi'],
            'retensi' => $row['Retensi'],
            'akhirRetensi' => $row['Akhir Retensi'],
        ]);
    }
}