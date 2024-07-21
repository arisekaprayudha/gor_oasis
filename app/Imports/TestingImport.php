<?php

namespace App\Imports;

use App\Models\Testing;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

// class ArsipTrainingImport implements ToModel
HeadingRowFormatter::default('none');
class TestingImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Testing([
            'code' => $row['Code'],
            'namabarang' => $row['Nama Barang'],
            'kategori' => $row['Kategori'],
            'satuan' => $row['Satuan'],
            'harga' => $row['Harga'],
            'berat' => $row['Berat'],
            'ukuran' => $row['Ukuran'],
            'bentuk' => $row['Bentuk'],
            'penjualan' => $row['Penjualan'],
            'jumlahpeminat' => $row['Jumlah Peminat'],
        ]);
    }
}