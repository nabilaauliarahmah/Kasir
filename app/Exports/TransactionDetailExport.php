<?php

namespace App\Exports;

use App\Models\TransactionDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransactionDetailExport implements FromArray, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array{
        return TransactionDetail::getDataTransactionDetail();
    }

    public function headings():array{
        return [
            'ID',
            'Transaction id',
            'Item id',
            'Quantity',
            'Subtotal',
            'Date'
        ];
    }
}
