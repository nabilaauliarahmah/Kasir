<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ItemCategory as Category;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Exports;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    protected $fillable = [
        'item_category_id',
        'name',
        'price',
        'stock',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'item_category_id');
    }

    public function cart(){
        return $this->hasOne(Cart::class);
    }

    public function transaction(){
        return $this->hasManyThrough(Transaction::class, TransactionDetail::class);
    }

    public function getDataItem(){
        $items = Item::all();
        $items_filter = [];
        $id = 1;
        for ($i=0; $i<$items->count(); $i++){
            $items_filter[$i]['id'] = $items[$i]->id;
            $items_filter[$i]['item_category_id)'] = $items[$i]->item_category_id;
            $items_filter[$i]['name'] = $items[$i]->name;
            $items_filter[$i]['price'] = $items[$i]->price;
            $items_filter[$i]['stock'] = $items[$i]->stock;
            
        }
        return $items_filter;
    }
}
