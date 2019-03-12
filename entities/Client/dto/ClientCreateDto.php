<?php

namespace robertobadjio\medical\entities\Client\dto;

/**
 * Class ClientCreateDto
 * @package robertobadjio\medical\entities\Client\dto
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
