<?php

namespace robertobadjio\medical\entities\Client\events;

/**
 * Class ClientActive
 * @package robertobadjio\medical\entities\Client\events
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
