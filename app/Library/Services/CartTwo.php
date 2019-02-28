<?php
/**
 * Cart two class
 * 
 * 
 */

 namespace App\Library\Services;

 use App\Library\Services\Contracts\CartServiceInterface;
 use App\Cart;
 use App\Entry;
 use App\Product;
 use Illuminate\Support\Facades\Session;

 class CartTwo implements CartServiceInterface
 {

    public $cart;

    /**
     * Get current cart from session
     * 
     */
    public function __construct()
    {

        if (Session::has('cart')) {
            //$this->cartIt = Session::get('cart');
            $this->cart = Cart::findOrFail(Session::get('cart'));
        } else {
            $cartEmpty = new Cart([
                'total' => 1,
                'discount' => 0
            ]);
            
            $cartEmpty->save();

            $this->cart = $cartEmpty;

            Session::put('cart', $this->cart->id);
        }
    }

    /**
     * Set product to cart
     * 
     */
    public function setCart($item)
    {

        $product = $this->findEntryInCart($item);

        //dd($product);

        if ($product) {
            //dd($product);
            $product->quantity = $product->quantity + 1;
            $product->save();
        } else {
            //echo 'true';
            $entry = new Entry([
                'quantity' => $item['quantity']
            ]);
    
            $product = Product::findOrFail($item['id']);
            $entry->product()->associate($product);
            $entry->cart()->associate($this->cart);
    
            $entry->save();
        }
    }

    /**
     * Delete from cart
     * 
     */
    public function deleteCart($item)
    {   
        $entry = $this->findEntryInCart($item);

        if ($entry) {
            //dd($entry);
            if ($entry->quantity <= 1) {
                //dd($entry);
                $entry->delete();
            } else {
                //dd($entry);
                $entry->quantity = $entry->quantity - 1;
                $entry->save();
            }
        } else {
            echo 'This product do not exist in cart';
        }
    }

    /**
     * Check if product already exist
     * 
     */
    public function findEntryInCart($item)
    {
        $entries = $this->cart->entries;
        
        $entry = $entries->first(function($value) use ($item) {
            return $value->product_id == $item['id'];
        });

        if ($entry) {
            return $entry;
        } else {
            return false;
        }

    }
 }
