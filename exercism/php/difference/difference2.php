<?php
/**
 * Difference of squares
 * 
 */


function squareOfSum($num)
{
    $res = 0;

    for ($i = 1; $i <= $num; $i++) {
        $res += $i;
    }

    return pow($res, 2);
}

function sumOfSquare($num)
{
    $res = 0;

    for($i = 1; $i <= $num; $i++) {
        $res += pow($i, 2);
    }

    return $res;
}

function difference($num)
{
    return squareOfSum($num) - sumOfSquare($num);
}