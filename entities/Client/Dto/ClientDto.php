<?php

namespace Medical\entities\Client\Dto;

use Medical\entities\Client\Address;
use Medical\entities\Client\ClientId;
use Medical\entities\Client\Name;
use Medical\entities\Client\Phone;

/**
 * Class ClientDto
 * @package Medical\entities\Client\Dto
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
