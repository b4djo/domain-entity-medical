<?php

namespace Medical\Entities\Client\events;

use Medical\Entities\Client\ClientId;
use Medical\Entities\Client\Phone;

/**
 * Class ClientPhoneAdded
 * @package Medical\Entities\Client\events
 */
class ClientPhoneAdded
{
    /**
     * @var ClientId
     */
    public $clientId;

    /**
     * @var Phone
     */
    public $phone;

    /**
     * ClientPhoneAdded constructor.
     *
     * @param ClientId $clientId
     * @param Phone $phone
     */
    public function __construct(ClientId $clientId, Phone $phone)
    {
        $this->clientId = $clientId;
        $this->phone    = $phone;
    }
}
