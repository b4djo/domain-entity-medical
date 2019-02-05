<?php

namespace Medical\Entities\Client\events;

use Medical\Entities\Client\Address;

/**
 * Class ClientAddressChanged
 * @package Medical\Entities\Client\events
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
