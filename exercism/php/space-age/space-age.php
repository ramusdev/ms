<?php
/**
 * Space age
 * 
 */

class SpaceAge
{
    const ONE_SECOND_YEAR = 0.000000031689;

    const MERCURY_ORBITAL = 0.2408467;
    const VENUS_ORBITAL = 0.61519726;
    const MARS_ORBITAL = 1.8808158;
    const JUPITER_ORBITAL = 11.862615;
    const SATURN_ORBITAL = 29.447498;
    const URANUS_ORBITAL = 84.016846;
    const NEPTUNE_ORBITAL = 164.79132;

    public $seconds;
    public $earthYear;

    public function __construct(int $seconds)
    {
        $this->seconds = $seconds;
        $this->earthYear = $this->earth();
    }

    public function __call($method, $args): float
    {
        $constantName = strtoupper($method) . '_ORBITAL';

        if (defined('self::' . $constantName)) {
            $orbital = constant('self::' . $constantName);
        } else {
            throw new Exception('Not defined constant: ' . $constantName);
        }

        return round($this->earthYear / $orbital, 2);
    }
    
    public function seconds(): float
    {
        return $this->seconds;
    }

    public function earth(): float
    {
        return round($this->seconds * self::ONE_SECOND_YEAR, 2);
    }
}
