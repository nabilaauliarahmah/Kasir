<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ItemExport implements FromArray, WithHeadings, ShouldAutoSize
{
    /**
    * 
    */

    public function array(): array{
        return Item::getDataItem();
    }

    public function headings(): array{
        return [
            'Id',
            'Item_category_id',
            'Name',
            'Price',
            'Stock'
        ];
    }
}
