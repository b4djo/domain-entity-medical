<?php

namespace Medical\Entities\Client\dto;

use Medical\Entities\Client\Address;
use Medical\Entities\Client\ClientId;
use Medical\Entities\Client\Name;
use Medical\Entities\Client\Phones;

/**
 * Class ClientCreateDto
 * @package Medical\Entities\Client\dto
 */
class ClientCreateDto
{
    /**
     * @var NameDto
     */
    public $name;

    /**
     * @var PhoneDto[]
     */
    public $phones;

    /**
     * @var AddressDto
     */
    public $address;
}
