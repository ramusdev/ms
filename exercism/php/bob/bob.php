<?php
/**
 * Bob
 * 
 */

class Bob
{
    public $request;

    public function respondTo(string $request): string
    {
        $request = trim($request);
        $request = iconv("utf-8","ASCII//TRANSLIT", $request);

        if ($this->isEmpty($request)) {
            return 'Fine. Be that way!';
        }

        if ($this->isYelling($request) && $this->isQuestion($request)) {
            return 'Calm down, I know what I\'m doing!';
        }

        if ($this->isQuestion($request)) {
            return 'Sure.';
        }

        if ($this->isYelling($request)) {
            return 'Whoa, chill out!';
        }

        return 'Whatever.';        
    }

    public function isEmpty(string $request): bool
    {
        return preg_match('/^\s*$/', $request);
    }

    public function isYelling(string $request): bool 
    {
        return $request == strtoupper($request) && $request != strtolower($request);
    }

    public function isQuestion(string $request): bool
    {
        return $request[-1] === '?';
    }
}