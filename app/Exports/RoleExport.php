<?php

namespace App\Exports;
use App\Exports\RoleExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Role;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RoleExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Role::all();
    }

    public function map($role): array
    {
        return [
            $role->user->nip,
            $role->user->name,
            $role->nameRole,
        ];

    }

    public function headings(): array{
        return [
            'NIP',
            'NAMA',
            'ROLE',
        ];
    }
    
}