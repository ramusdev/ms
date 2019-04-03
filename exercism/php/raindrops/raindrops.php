<?php
/**
 * Raindrops
 * 
 */

const FACTOR = [
    3 => 'Pling',
    5 => 'Plang',
    7 => 'Plong'
];

function raindrops(int $number): string
{
    $drops = '';

    foreach (FACTOR as $key => $value)
    {
        if ($number % $key == 0) {
            $drops .= $value;
        } 
    }

    return $drops ?: (string) $number;
 }