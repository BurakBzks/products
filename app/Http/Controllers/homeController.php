<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Report;
use App\Models\Stock;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $stocks = Stock::where('deleted',0)->get();
        return view('index', compact('stocks'));
    }

    public function products()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function productcreate(Request $requests)
    {
        @$allproducts = Product::all();
        foreach ($allproducts as $allproduct) {
            if ($allproduct->name === $requests->name) {
                return redirect()->back();
            }
        }
        $products = new Product();
        $products->name = $requests->name;
        $products->save();
        $stocks = new Stock();
        $product = Product::Where('name', $requests->name)->first();
        $stocks->product_id = $product->id;
        $stocks->pieces = $requests->stockpieces;
        $stocks->save();
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function stockView($id)
    {
        $stock = Stock::where('id', $id)->where('deleted',0)->first();
        $product = Product::where('id', $stock->product_id)->first();
        return view('stockview', compact('stock', 'product'));
    }

    public function stockUpdate($id, Request $request)
    {
        $stock =new Stock();
        $stock=Stock::where('id', $id)->first();
        $stock->pieces=$request->stockpieces;
        $stock->save();
        $product = New Product();
        $product=Product::where('id', $stock->product_id)->first();
        $product->name=$request->name;
        $product->save();

        return redirect()->route('anasayfa');
    }
    public function stockDelete($id)
    {
        $stock = Stock::where('id', $id)->first();
        $stock->deleted=1;
        $stock->save();
        $stocks = Stock::where('deleted',0)->get();
        return view('index', compact('stocks'));
    }
}
