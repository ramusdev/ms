<?php
/**
 * Run length encoding
 * 
 */

function encode(string $string) : string
{
    $letter = 1;
    $mas = str_split($string);

    foreach ($mas as $key => $value) {
        if ($value == $mas[$key + 1]) {
            $letter = $letter + 1;
        }
        else {
            if ($letter > 1) {
                $encode .= $letter . $value;    
            } else {
                $encode .= $value;
            }

            $letter = 1;
        }
    }
    
    return $encode;
}

function decode(string $string)
{
    $mas = preg_split('/([A-Za-z\s])/', $string, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

    foreach ($mas as $key => $value) {
        if (is_numeric($value)) {
            for ($i = 0, $repeat = $value - 1; $i < $repeat; $i++) {
                $decode .= $mas[$key+1];
            }
        } else {
            $decode .= $value;
        }
    }

    return $decode;
}

//echo encode('WWWWWWWWWWWWBWWWWWWWWWWWWBBBWWWWWWWWWWWWWWWWWWWWWWWWB');
//var_dump(decode('21 hs2q q2w2 '));