<?php
/**
 * Word count
 * 
 */

function wordCount(string $sentence): array
{
    $words = [];

    // CLear sentence and lower
    $sentence = strtolower(trim(preg_replace('/[:!&@$%^&,\s]+/', ' ', $sentence)));

    $explode = explode(' ', $sentence);

    // Counter
    foreach ($explode as $key => $value) {
        $words[$value] = ($words[$value] ?? 0) + 1;
    }

    return $words;
}