<?php
/**
 * RNA Transcription
 * 
 */

function toRna(string $dna): bool
{
    $transcription = [
        'G' => 'C',
        'C' => 'G',
        'T' => 'A',
        'A' => 'U'
    ];

    $rna = '';
    $mas = str_split($dna, 1);

    foreach($mas as $key => $value) {
        if (array_key_exists($value, $transcription)) {
            $rna .= $transcription[$value];
        } else {
            $rna .= $value;
        }
    }

    return $rna;
}