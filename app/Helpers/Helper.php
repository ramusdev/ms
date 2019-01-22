<?php

namespace App\Helpers;

use Illuminate\Support\Collection;

class Helper
{
    /**
     * Helper function three builder
     * 
     */
    public static function buildThree($flat, $root = 0)
    {
        $collection = new Collection();

        foreach($flat as $key => $value) {
            if ($value->parent_id == $root) {
                $value->child = Helper::buildThree($flat, $value->id);
                $collection->push($value);
            }
        }

        return $collection;
    }
}
