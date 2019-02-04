<?php

namespace Medical\Entities\Client\dto;

use Medical\Entities\Client\Address;
use Medical\Entities\Client\ClientId;
use Medical\Entities\Client\Name;
use Medical\Entities\Client\Phone;

/**
 * Class ClientDto
 * @package Medical\Entities\Client\dto
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
