<?php

namespace App\Http\Controllers;
use  Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Models\ItemCategory;
use App\Models\Cart;
use App\Models\Item;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }

    public function itemcategories(){
        $user = Auth::user();
        $item_categories = ItemCategory::all();
        return view('itemcategory', compact('user', 'item_categories'));
    }

    public function items(){
        $user = Auth::user();
        $items = Item::all();
        return view('item', compact('user', 'items'));
    }

    public function carts(){
        $user = Auth::user();
        $carts = Cart::all();
        return view('cart', compact('user', 'carts'));
    }
}
