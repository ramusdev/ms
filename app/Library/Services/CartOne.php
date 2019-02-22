<?php
/**
 * Cart one class
 * 
 * 
 */

 namespace App\Library\Services;

 use App\Library\Services\Contracts\CartServiceInterface;
 use Illuminate\Support\Facades\Session;

 class CartOne implements CartServiceInterface
 {
    /**
     * Get products existing in cart
     * 
     */
    public function getCart()
    {
        return 'from cart one';
    }

    /**
     * Set product to cart
     * 
     */
    public function setCart()
    {

        $product = [
            'name' => 'first_name'
        ];

        $product_second = [
            'id' => '123321',
            'amount' => '100',
            'date' => '100219'
        ];


        //if (! Session::has('key'))
        //{
            //Session::put('sname_10', $product);
            //Session::push('sname_3.name', 'second name');
        //}

        //$data = Session::get('key');

        //session(['snamename1' => 'value of the session name']);

        //$data = Session::all();


        dd($data);

        //return 'set cart';
    }
 }

