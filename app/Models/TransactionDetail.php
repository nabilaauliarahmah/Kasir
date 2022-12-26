<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
use App\Models\Item;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'id',
        'transaction_id',
        'item_id',
        'quantity',
        'subtotal',
        'date'
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function getDataTransactionDetail(){
        $transactiondetails = TransactionDetail::all();
        $transactiondetails_filter = [];
        $id = 1;
        for ($i=0; $i<$transactiondetails->count(); $i++){
            $transactiondetails_filter[$i]['ID'] = $transactiondetails[$i]->$id;
            $transactiondetails_filter[$i]['transaction_id'] = $transactiondetails[$i]->transaction_id;
            $transactiondetails_filter[$i]['item_id'] = $transactiondetails[$i]->item_id;
            $transactiondetails_filter[$i]['quantity'] = $transactiondetails[$i]->quantity;
            $transactiondetails_filter[$i]['subtotal'] = $transactiondetails[$i]->subtotal;
            $transactiondetails_filter[$i]['date'] = $transactiondetails[$i]->created_at;
        }
        return $transactiondetails_filter;
    }


}
