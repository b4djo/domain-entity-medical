<?php

namespace robertobadjio\medical\entities\Client\dto;

use robertobadjio\medical\entities\Client\Address;
use robertobadjio\medical\entities\Client\ClientId;
use robertobadjio\medical\entities\Name;
use robertobadjio\medical\entities\Client\Phones;

/**
 * Class ClientDto
 * @package robertobadjio\medical\entities\Client\dto
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
     * @var Phones
     */
    public $phones;

    /**
     * @var Address
     */
    public $address;

    /**
     * @var bool
     */
    public $active;
}
