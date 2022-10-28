<?php

namespace App\Exports;

use App\Models\NextMonthPayout;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NextMonthPayoutsExport implements FromCollection,WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'ID',
            'NAME',
            'DATE',
            'NEXT PAYOUT AMOUNT' 
        ];
    }


    public function collection()
    {
        return NextMonthPayout::select('user_id','name','date','next_payout_amount')->get();
    }
}
