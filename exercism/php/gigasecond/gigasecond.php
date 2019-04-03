<?php
/**
 * Gigasecond
 * 
 */

function from(DateTime $date): DateTimeImmutable
{
    $immutable = DateTimeImmutable::createFromMutable($date);

    return $immutable->add(new DateInterval('PT1000000000S'));
}


