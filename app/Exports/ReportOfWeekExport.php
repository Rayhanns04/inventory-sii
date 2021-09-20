<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportOfWeekExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Report::all();
    }

    public function headings(): array
    {
        return [
            'Lantai',
            'Ruang',
            'Barang',
            'Note',
            'Bagus',
            'Di perbaiki',
            'Rusak'
        ];
    }
}
