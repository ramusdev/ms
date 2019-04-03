<?php
/**
 * Robot name
 * 
 */

class Robot
{
    public $name;

    public function __construct()
    {
        $this->name = NameGenerator::generateName();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function reset(): void
    {
        $this->name = NameGenerator::generateName();
    }
}

class NameGenerator
{
    private static $storeNames = [];

    public static function generateName(): string
    {
        $alphabet = range('A', 'Z');
        $alphabetSize = count($alphabet);

        do {
            $name = $alphabet[rand(0, $alphabetSize)] . $alphabet[rand(0, $alphabetSize)];
            $name .= rand(0, 9) . rand(0, 9) . rand(0, 9);
        } while (! self::isUniquaName($name));

        self::$storeNames[] = $name;

        return $name;
    }

    private static function isUniquaName(string $name): bool
    {
        return !in_array($name, self::$storeNames);
    }
}

