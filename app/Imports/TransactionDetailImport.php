<?php

namespace App\Imports;

use App\Models\TransactionDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionDetailImport implements WithHeadingRow ,ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TransactionDetail([
            'id' => $row['id'],
            'transaction_id' => $row['transaction_id'],
            'item_id' => $row['item_id'],
            'quantity' => $row['quantity'],
            'subtotal' => $row['subtotal'],
            'date' => $row['date'],
        ]);
    }
}
