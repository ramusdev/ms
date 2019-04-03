<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Library\Services\Contracts\CartServiceInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Show all products
     * 
     */
    public function all()
    {
        //Session::flush();

        $products = Product::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('front/product-all', ['products' => $products]);
    }

    /**
     * Show product
     * 
     */
    public function show($id)
    {  
        $product = Product::findOrFail($id);

        return view('front/product-show', ['product' => $product]);
    }

    /**
     * Add item product card
     * 
     */
    public function addToCard(CartServiceInterface $cart, $id)
    {
    
        $cart->setProduct([
            'id' => $id,
            'quantity' => 1,
            'date' => Carbon::now()->toDateTimeString()
        ]);


        /*
        $cart->deleteProduct([
            'id' => $id,
            'date' => Carbon::now()->toDateTimeString()
        ]);
        */
        
        /*
        $products = $cart->allProducts();
        */

        /*
        $cart->clearProducts();
        */
        
        /*
        $products = Product::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('front/product-all', ['products' => $products]);
        */

        return redirect()->back();
        
    }
}
