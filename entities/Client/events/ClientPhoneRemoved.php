<?php

namespace robertobadjio\medical\entities\Client\events;

use robertobadjio\medical\entities\Client\ClientId;
use robertobadjio\medical\entities\Client\Phone;

/**
 * Class ClientPhoneRemoved
 * @package robertobadjio\medical\entities\Client\events
 */
class ClientPhoneRemoved
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
