<?php

namespace Medical\Entities\Client\events;

/**
 * Class ClientRemoved
 * @package Medical\Entities\Client\events
 */
class ClientRemoved
{
    /**
     * @var bool
     */
    public $active;

    /**
     * ClientRenamed constructor.
     *
     * @param bool $active
     */
    public function __construct(bool $active)
    {
        $this->active = $active;
    }
}
