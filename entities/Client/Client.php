<?php

namespace Medical\Entities\Client;

use Medical\Entities\Client\Dto\ClientDto;
use Medical\Entities\Client\events\ClientAddressChanged;
use Medical\Entities\Client\events\ClientCreated;
use Medical\Entities\Client\events\ClientPhoneAdded;
use Medical\Entities\Client\events\ClientPhoneRemoved;
use Medical\Entities\Client\events\ClientRemoved;
use Medical\Entities\Client\events\ClientRenamed;
use Medical\Entities\EventTrait;

/**
 * Class Client
 * @package Medical\Entities\Client
 */
class Client
{
    use EventTrait;

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
     * @var Phones
     */
    private $phones;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var \DateTimeImmutable
     */
    private $createDate;

    /**
     * @var bool
     */
    private $active;

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
        $this->phones     = $clientDto->phones;
        $this->address    = $clientDto->address;
        $this->createDate = new \DateTimeImmutable();
        $this->active     = $clientDto->active;

        $this->setEvent(new ClientCreated($this->id));
    }

    /**
     * @param Name $name
     */
    public function rename(Name $name): void
    {
        $this->name = $name;

        $this->setEvent(new ClientRenamed($name));
    }

    /**
     * @param Address $address
     */
    public function changeAddress(Address $address): void
    {
        $this->address = $address;

        $this->setEvent(new ClientAddressChanged($address));
    }

    /**
     * @return ClientId
     */
    public function getId(): ClientId
    {
        return $this->id;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Phone $phone
     */
    public function addPhone(Phone $phone): void
    {
        $this->phones->add($phone);

        $this->setEvent(new ClientPhoneAdded($this->id, $phone));
    }

    /**
     * @return Phones
     */
    public function getPhones(): Phones
    {
        return $this->phones;
    }

    /**
     * @param int $index
     */
    public function removePhone(int $index): void
    {
        $phone = $this->phones->remove($index);

        $this->setEvent(new ClientPhoneRemoved($this->id, $phone));
    }

    public function remove(): void
    {
        if ($this->active) {
            throw new \DomainException('Cannot remove active client.');
        }

        $this->setEvent(new ClientRemoved(false));
    }
}
