<?php

namespace robertobadjio\medical\entities\Client;

use Assert\Assertion;

/**
 * Class Address
 * @package Medical\Entities\Client
 */
class Address
{
    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $region;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $house;

    /**
     * Address constructor
     *
     * @param string $country
     * @param string $region
     * @param string $city
     * @param string $street
     * @param string $house
     */
    public function __construct(string $country, string $region, string $city, string $street, string $house)
    {
        Assertion::notEmpty($country);
        Assertion::notEmpty($city);

        $this->country = $country;
        $this->region  = $region;
        $this->city    = $city;
        $this->street  = $street;
        $this->house   = $house;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getHouse(): string
    {
        return $this->house;
    }
}