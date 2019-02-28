<?php
/**
 * Cart interface
 *
 * 
 */

namespace App\Library\Services\Contracts;

Interface CartServiceInterface
{
    public function setCart($product);
    public function deleteCart($product);
}