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
    public function setProduct($item)
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
     * Delete product cart
     * 
     */
    public function deleteProduct($item)
    {   
        $entry = $this->findEntryInCart($item);
        //dd($entry);

        //if ($entry) {
            //dd($entry);
            if ($entry->quantity <= 1) {
                $entry->delete();
            } else {
                $entry->quantity = $entry->quantity - 1;
                $entry->save();
            }
        //} else {
            //echo 'This product do not exist in cart';
        //}
    }

    /**
     * All products from cart
     * 
     */
    public function allProducts()
    {
        $entries = $this->cart->entries;
        
        return $entries;
    }

    /**
     * Clear all products in cart
     * 
     */
    public function clearProducts()
    {
        $entries = $this->cart->entries()->delete();
    }

    /**
     * Check if product already exist
     * 
     */
    public function findEntryInCart($item)
    {
        $entries = $this->cart->entries;
        //dd($item);
        //dd($entries);
        
        $entry = $entries->first(function($value) use ($item) {
            return $value->product_id == $item['id'];
        });

        //dd($entry);

        if ($entry) {
            return $entry;
        } else {
            return false;
        }

    }
 }
