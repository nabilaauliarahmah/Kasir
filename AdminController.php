<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Models\TransactionDetail;
use App\Models\ItemCategory;
use App\Models\Cart;
use App\Models\Item;
use App\Exports\TransactionDetailExport;
use App\Exports\ItemExport;
use App\Imports\TransactionDetailImport;
use App\Imports\ItemImport;
use DB;
use  Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

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

    public function report(){
        $user = Auth::user();
        $transaction_details = TransactionDetail::all();
        return view('report', compact('user', 'transaction_details'));
    }

    public function print_transaction(){
        $transaction_details = TransactionDetail::all();
        $pdf = PDF::loadView('print_transaction', ['transaction_details' => $transaction_details]);
        return $pdf->download('transaction_report.pdf');
    }

    public function export_transaction(){
        return Excel::download(new TransactionDetailExport, 'transactiondetails.xlsx');
    }

    public function print_item(){
        $items = Item::all();
        $pdf = PDF::loadView('print_item', ['items' => $items]);
        return $pdf->download('item.pdf');
    }

    public function export_item(){
        return Excel::download(new ItemExport, 'item.xlsx');
    }

    public function submit_item(Request $req){

        $validate = $req->validate([

            'item_category_id' =>'required',
            'name' =>'required',
            'price' =>'required',
            'stock' =>'required',
        ]);

        $item = new Item;


        $item->item_category_id = $req->get('item_category_id');
        $item->name = $req->get('name');
        $item->price = $req->get('price');
        $item->stock = $req->get('stock');

        if($req->hasFile('image')){
            $extension = $req->file('image')->extension();

            $filename = 'image_item'.time().'.'. $extension;

            $req->file('image')->storeAs('public/image_item', $filename);

            $item->image = $filename;
        }
        $item->save();

        $notification = array(
            'message' =>'Data Buku berhasil ditambahkan', 'alert-type' =>'success'
        );

        return redirect()->route('adminn.items')->with($notification);
    }

    public function import_transaction(Request $req){
        Excel::import(new TransactionDetailImport, $req->file('file'));
        
        $notification = array(
            'message' => 'Import data berhasil',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.report')->with($notification);
    }

    public function import_item(Request $req){
        Excel::import(new ItemImport, $req->file('file'));
        
        $notification = array(
            'message' => 'Import data berhasil',
            'alert-type' => 'success'
        );
        return redirect()->route('adminn.items')->with($notification);
    }

    public function delete_item($id){
        DB::table('items')->where('id',$id)->delete();

        $notification = array(
            'message' => 'Data Berhasil Dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('adminn.items')->with($notification);
    }
}
