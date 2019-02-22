<?php
/**
 * Cart two class
 * 
 * 
 */

 namespace App\Library\Services;

 use App\Library\Services\Contracts\CartServiceInterface;

 class CartTwo implements CartServiceInterface
 {
    public function getCart()
    {
        return 'from cart two';
    }
 }

