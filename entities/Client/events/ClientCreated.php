<?php

namespace Medical\Entities\Client\events;

use Medical\Entities\Client\ClientId;

/**
 * Class ClientCreated
 * @package Medical\Entities\Client\events
 */
class ClientCreated
{
    /**
     * @var ClientId
     */
    public $clientId;

    /**
     * ClientCreated constructor.
     * @param ClientId $clientId
     */
    public function __construct(ClientId $clientId)
    {
        $this->clientId = $clientId;
    }
}
