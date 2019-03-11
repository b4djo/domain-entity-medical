<?php

namespace robertobadjio\medical\entities\Client\events;

/**
 * Class ClientNotActive
 * @package Medical\Entities\Client\events
 */
class ClientActive
{
    /**
     * @var bool
     */
    public $active;

    /**
     * ClientNotActive constructor.
     * @param bool $active
     */
    public function __construct(bool $active)
    {
        $this->active = $active;
    }
}
