<?php

namespace robertobadjio\medical\entities\Client;

/**
 * Class Phones
 * @package robertobadjio\medical\entities\Client
 */
class Phones
{
    /**
     * @var array
     */
    private $phones = [];

    /**
     * Phones constructor.
     * @param array $phones
     */
    public function __construct(array $phones)
    {
        if (!$phones) {
            throw new \DomainException('Client must contain at least one phone.');
        }

        foreach ($phones as $phone) {
            $this->add($phone);
        }
    }

    /**
     * @param Phone $phone
     */
    public function add(Phone $phone): void
    {
        foreach ($this->phones as $item) {
            if ($item->isEqualTo($phone)) {
                throw new \DomainException('Phone already exists.');
            }
        }

        $this->phones[] = $phone;
    }

    /**
     * @param int $index
     * @return Phone
     */
    public function remove(int $index): Phone
    {
        if (!isset($this->phones[$index])) {
            throw new \DomainException('Phone not found.');
        }

        if (count($this->phones) === 1) {
            throw new \DomainException('Cannot remove the last phone.');
        }

        $phone = $this->phones[$index];
        unset($this->phones[$index]);

        return $phone;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->phones;
    }
}
