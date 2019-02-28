<?php
/**
 * Cart one class
 * 
 * 
 */

 namespace App\Library\Services;

 use App\Library\Services\Contracts\CartServiceInterface;
 use Illuminate\Support\Facades\Session;
 use Illuminate\Support\Carbon;
 use Illuminate\Support\Collection;

 class CartOne implements CartServiceInterface
 {
  
    /**
     * Increment product if exists or add
     * 
     */
    public function incrementOrAddProduct($product)
    {
        $collection = Session::get('products');

        $productExist = $collection->contains('id', $product['id']);

        if ($productExist) {
            $incremented = $collection->transform(function($value, $key) use ($product) {
                if ($value['id'] == $product['id']) {
                    $value['quantity'] = $value['quantity'] + 1;
                }
    
                return $value;
            });
        } else {
            $collection->push($product);
        }
        
        return $collection;
    }

    /**
     * Set product to card used collation
     * 
     */
    public function setCart($product)
    {
        //Session::flush();
        
        if (Session::has('products')) {

            $collection = $this->incrementOrAddProduct($product);
        } else {
            $collection = new Collection();
            $collection->push($product);
        }

        Session::put('products', $collection);
    }

 }

