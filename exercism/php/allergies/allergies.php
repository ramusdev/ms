<?php
/**
 * Allergies
 * 
 */

class Allergies
{
    public $score;

    public function __construct(int $score)
    {
        $this->score = $score;
    }

    public function getList()
    {
        $allergens = array_filter(Allergen::allergenList(), function($allergen) {
            return $this->isAllergicTo($allergen);
        });

        return $allergens;
    }

    public function isAllergicTo($allergen)
    {
        echo $this->score;

        // Get value with the same bits
        $sameBits = $allergen->getScore() & $this->score;

        return $sameBits == $allergen->getScore();
    }
}

class Allergen 
{
    const EGGS = 1;
    const PEANUTS = 2;
    const SHELLFISH = 4;
    const STRAWBERRIES = 8;
    const TOMATOES = 16;
    const CHOCOLATE = 32;
    const POLLEN = 64;
    const CATS = 128;

    public $score;

    public function __construct($score)
    {
        $this->score = $score;
    }

    public function getScore()
    {
        return $this->score;
    }

    public static function allergenList()
    {
        return [
            new Allergen(Allergen::EGGS),
            new Allergen(Allergen::PEANUTS),
            new ALLergen(Allergen::SHELLFISH),
            new ALLergen(Allergen::STRAWBERRIES),
            new ALLergen(Allergen::TOMATOES),
            new ALLergen(Allergen::CHOCOLATE),
            new ALLergen(Allergen::POLLEN),
            new ALLergen(Allergen::CATS),
        ];
    }
}