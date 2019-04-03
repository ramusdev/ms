<?php
/**
 * Difference of squares
 * 
 */


function squareOfSum(int $num): int
{
    $res = iterateNatural($num, function($i) {
        return $i;
    });

    return pow($res, 2);
}

function sumOfSquare(int $num): int
{
    $res = iterateNatural($num, function($i) {
        return pow($i, 2);
    });

    return $res;
}

function difference(int $num): int
{
    return squareOfSum($num) - sumOfSquare($num);
}

function iterateNatural(int $num, Closure $funct): int
{
    $res = 0;
    
    for ($i = 1; $i <= $num; $i++) {
        $res += $funct($i);
    }

    return $res;
}


//squareOfSum(10);
//sumOfSquare(10);
echo difference(10);