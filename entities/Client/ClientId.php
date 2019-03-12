<?php

namespace robertobadjio\medical\entities\Client;

use robertobadjio\medical\entities\Id;

/**
 * Class ClientId
 * @package robertobadjio\medical\entities\Client
 */
class ClientId extends Id
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
