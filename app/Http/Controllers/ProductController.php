<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function all()
    {
        $products = Product::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        //dd($products);

        return view('front/product-all', ['products' => $products]);
    }

    public function show($id)
    {  
        $product = Product::findOrFail($id);

        return view('front/product-show', ['product' => $product]);
    }
}
