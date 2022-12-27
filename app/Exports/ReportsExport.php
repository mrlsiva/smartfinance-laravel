<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportsExport implements FromCollection,WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'ID',
            'NAME',
            'DATE',
            'AMOUNT' 
        ];
    }

    public function collection()
    {
        return Report::select('user_id','name','date','amount')->get();
    }
}
