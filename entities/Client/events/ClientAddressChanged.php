<?php

namespace robertobadjio\medical\entities\Client\events;

use robertobadjio\medical\entities\Client\Address;

/**
 * Class ClientAddressChanged
 * @package robertobadjio\medical\entities\Client\events
 */
class ClientAddressChanged
{
    /**
     * @var Address
     */
    public $address;

    /**
     * ClientAddressChanged constructor.
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        $this->address = $address;
    }
}
