<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Library\Services\Contracts\CartServiceInterface;
use App\Cart;

class CartController extends Controller
{
    public $cart;

    public function __construct()
    {
        $this->middleware(function($request, $next) {
            $cartId = Session::get('cart');
            $this->cart = Cart::findOrFail($cartId);

            return $next($request);
        });

        //echo $cartId = Session::get('cart');
        //dd(Cart::findOrFail(17));
         
        //if ($request->session()->has('cart')) {
            //dd($this->cart);
            //$this->cart = Cart::findOrFail($request->session()->get('cart'));
        //}
    }

    /**
     * Show cart
     * 
     */
    public function show()
    {
        //$cartId = Session::get('cart');
        //$cart = Cart::findOrFail($cartId);

        $entries = $this->cart->entries;

        return view('front/cart', ['entries' => $entries]);
    }

    /**
     * Clear cart
     * 
     */
    public function clear(CartServiceInterface $cart)
    {
        $cart->clearProducts();

        return redirect()->back();
    }

    /**
     * Delete product
     * 
     */
    public function delete(CartServiceInterface $cart, $id)
    {
        $cart->deleteProduct([
            'id' => $id,
            'date' => Carbon::now()->toDateTimeString()
        ]);

        return redirect()->back();
    }
}
