<?php

namespace Medical\Entities\Client;

use Assert\Assertion;

/**
 * Class Phone
 * @package Medical\Entities\Client
 */
class Phone
{
    /**
     * @var int
     */
    private $country;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $number;

    /**
     * Phone constructor
     *
     * @param int $country
     * @param string $code
     * @param string $number
     */
    public function __construct(int $country, string $code, string $number)
    {
        Assertion::notEmpty($country);
        Assertion::notEmpty($code);
        Assertion::notEmpty($number);

        $this->country = $country;
        $this->code    = $code;
        $this->number  = $number;
    }

    /**
     * @param self $phone
     * @return bool
     */
    public function isEqualTo(self $phone): bool
    {
        return $this->getFull() === $phone->getFull();
    }

    /**
     * @return string
     */
    public function getFull(): string
    {
        return sprintf('+%s (%s) %s', $this->country, $this->code, $this->number);
    }

    /**
     * @return int
     */
    public function getCountry(): int
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }
}