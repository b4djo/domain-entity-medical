<?php

namespace entities\Client;

use Assert\Assertion;

/**
 * Class Name
 * @package Entities
 */
class Name
{
    /**
     * @var string
     */
    private $last;

    /**
     * @var string
     */
    private $first;

    /**
     * @var string
     */
    private $middle;

    /**
     * Name constructor.
     * @param string $last
     * @param string $first
     * @param string $middle
     */
    public function __construct(string $last, string $first, string $middle)
    {
        Assertion::notEmpty($last);
        Assertion::notEmpty($first);

        $this->last   = $this->clearValue($last);
        $this->first  = $this->clearValue($first);
        $this->middle = $this->clearValue($middle);
    }

    /**
     * @return string
     */
    public function getFull()
    {
        return sprintf('%s %s %s', $this->last, $this->first, $this->middle);
    }

    /**
     * @return string
     */
    public function getFirst(): string
    {
        return $this->first;
    }

    /**
     * @return string
     */
    public function getMiddle(): string
    {
        return $this->middle;
    }

    /**
     * @return string
     */
    public function getLast(): string
    {
        return $this->last;
    }

    /**
     * @param string $value
     * @return string
     */
    private function clearValue(string $value): string
    {
        return trim($value);
    }
}
