<?php

namespace Medical\Entities\Client;

use Medical\Entities\Id;

/**
 * Class ClientId
 * @package Medical\Entities\Client
 */
class ClientId extends Id
{
    /**
     * @var string
     */
    private $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
