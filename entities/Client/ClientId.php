<?php

namespace Medical\Entities\Client;

/**
 * Class ClientId
 * @package Medical\Entities\Client
 */
class ClientId
{
    /**
     * @var string
     */
    private $id;

    /**
     * ClientId constructor
     *
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
