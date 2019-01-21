<?php

namespace App\Helpers;

class Helpers
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
                $value->child = $this->buildThree($flat, $value->id);
                $collection->push($value);
            }
        }

        return $collection;
    }
}
