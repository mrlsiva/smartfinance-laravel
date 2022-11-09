<?php

namespace App\Imports;

use App\Models\SmartfinancePayment;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
Use \Carbon\Carbon;

class SmartfinancePaymentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $payment_date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['payment_date']))->format('Y-m-d');
        $invested_date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['invested_date']))->format('Y-m-d');
        return new SmartfinancePayment([
            
            'smartfinance_id' => $row['smartfinance_id'],
            'invested_date' => $invested_date,
            'month' => $row['month'],
            'year' => $row['year'],
            'investment_amount' => $row['investment_amount'],
            'next_amount' => $row['next_amount'],
            'balance' => $row['balance'],
            'payment_date' => $payment_date,
            'intrest' => $row['intrest'],
            'is_status' => $row['is_status'],
            'is_approve' => $row['is_approve'],

        ]);
    }
}
