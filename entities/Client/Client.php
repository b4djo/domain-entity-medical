<?php

namespace entities\Client;

use entities\Client\Dto\ClientDto;

/**
 * Class Client
 * @package Entities
 */
class Client
{
    /**
     * @var ClientId
     */
    private $id;

    /**
     * @var Name
     */
    private $name;

    /**
     * @var \DateTimeImmutable
     */
    private $birthDate;

    /**
     * @var Phone[]
     */
    private $phones = [];

    /**
     * @var Address
     */
    private $address;

    /**
     * @var \DateTimeImmutable
     */
    private $createDate;

    /**
     * Client constructor.
     * @param ClientDto $clientDto
     * @throws \Exception
     */
    public function __construct(ClientDto $clientDto)
    {
        if (!$clientDto->phones) {
            throw new \DomainException('Client must contain at least one phone.');
        }

        $this->id         = $clientDto->id;
        $this->name       = $clientDto->name;
        $this->birthDate  = $clientDto->birthDate;
        $this->phone      = [];
        $this->address    = $clientDto->address;
        $this->createDate = new \DateTimeImmutable();

        foreach ($clientDto->phones as $phone) {
            foreach ($this->phones as $current) {
                if ($current->isEqualTo($phone)) {
                    throw new \DomainException('Phone already exists.');
                }
            }
            $this->phones[] = $phone;
        }
    }

    /**
     * @param Name $name
     */
    public function rename(Name $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Address $address
     */
    public function changeAddress(Address $address): void
    {
        $this->address = $address;
    }
}
