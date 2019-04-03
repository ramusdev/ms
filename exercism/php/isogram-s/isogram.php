<?php
/**
 * Isogram
 * 
 */

 function isIsogram(string $string)
 {
    $letters = [];

    $string = trim($string);
    $string = strtolower($string);
    $string = preg_replace('/[\s-"\']/', '', $string);
    $mas = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);
    
    foreach ($mas as $key => $value) {
        if (in_array($value, $letters)) {
            return false;
        }

        $letters[] = $value;
    }

    return true;
 }
