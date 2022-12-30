<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ItemImport implements WithHeadingRow, ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Item([
            'item_category_id' => $row['item_category_id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'stock' => $row['stock'],
        ]);
    }
}
