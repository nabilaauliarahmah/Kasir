<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Models\Transaction;
use App\Models\Item;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Item::doesntHave('cart')->where('stock', '>', 0)->get()->sortBy('name');
        $itemCarts = Item::has('cart')->get()->sortByDesc('cart.created_at');

        return view('transaction', compact('items', 'itemCarts'));
    }

   
}
