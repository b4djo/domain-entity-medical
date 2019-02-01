<?php

namespace entities\Client\Dto;

use entities\Client\Address;
use entities\Client\ClientId;
use entities\Client\Name;
use entities\Client\Phone;

/**
 * Class ClientDto
 * @package Entities\Dto
 */
class ClientDto
{
    /**
     * @var ClientId
     */
    public $id;

    /**
     * @var Name
     */
    public $name;

    /**
     * @var \DateTimeImmutable
     */
    public $birthDate;

    /**
     * @var Phone[]
     */
    public $phones;

    /**
     * @var Address
     */
    public $address;
}
