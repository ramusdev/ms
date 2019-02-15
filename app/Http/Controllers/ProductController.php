<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
//use App\Card;

class ProductController extends Controller
{
    public function all()
    {
        $products = Product::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('front/product-all', ['products' => $products]);
    }

    public function show($id)
    {  
        $product = Product::findOrFail($id);

        return view('front/product-show', ['product' => $product]);
    }

    /**
     * Add item product card
     * 
     */
    public function addToCard($id)
    {
        //Card::add('item id', 'amount', 'price');
        //Card::remove('item id');
        //Card::all();
    }
}
