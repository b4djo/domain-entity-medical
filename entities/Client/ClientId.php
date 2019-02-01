<?php

namespace entities\Client;

/**
 * Class ClientId
 * @package entities\Client
 */
class ClientId
{
    /**
     * @var string
     */
    public $id;

    /**
     * ClientId constructor
     *
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
}
