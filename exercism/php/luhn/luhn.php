<?php
/**
 * Luhn
 * 
 */

function isValid(string $card): bool
{
    // Trim
    $card = trim($card);

    // Delete space
    $card = preg_replace('/\s/', '', $card);

    // Only numbers
    if (! preg_match('/^[0-9]+$/', $card)) {
        return false;   
    }

    // More than 1
    if (strlen($card) <= 1) {
        return false;
    }

    // Double every second element
    $mas = str_split($card, 1);
    for ($i = (count($mas)-1); $i >= 0; $i--) {
        if (($i-1) % 2 == 0) {
            $mas[$i] = multiply($mas[$i]);
        }
    }

    // Sum and divisible
    $sum = array_sum($mas);
    if ($sum % 10 == 0) {
        return true;
    } else {
        return false;
    }
}

function multiply($num)
{
    $num = $num * 2;
    return $num > 9 ? $num - 9 : $num;
}