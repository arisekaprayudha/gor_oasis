<?php

namespace App\Exports;

use App\Models\Training;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TrainingTemplate implements FromView, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        return view('template.trainingTemplate', [
            'training' => Training::all()
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    }
}