<?php
/**
 * Cart interface
 *
 * 
 */

namespace App\Library\Services\Contracts;

Interface CartServiceInterface
{
    public function setProduct($product);
    public function deleteProduct($product);
    public function allProducts();
    public function clearProducts();
}