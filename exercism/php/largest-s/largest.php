<?php
/**
 * Largest series product
 * 
 */

class Series 
{
    public $series;

    public function __construct($series)
    {
        $this->series = $series;
    }

    public function largestProduct($product)
    {
        //echo strlen('020');

        $max = 0;
        $seriesLength = strlen($this->series);
        $length = $seriesLength - $product + 1;

        if ($seriesLength < $product) {
            throw new InvalidArgumentException();
        }

        for ($i = 0; $i < $length; $i++) {
            $numberGroup = substr($this->series, $i, $product);
            $resMultiply = array_product(str_split($numberGroup));

            if ($max < $resMultiply) {
                $max = $resMultiply;
            }
        }

        echo $max;
    }
}

$series = new Series('576802143');
$series->largestProduct(2);