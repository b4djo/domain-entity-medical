<?php

namespace Medical\entities\Client;

/**
 * Class ClientId
 * @package Medical\entities\Client
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
