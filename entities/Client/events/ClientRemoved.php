<?php

namespace robertobadjio\medical\entities\Client\events;

/**
 * Class ClientRemoved
 * @package robertobadjio\medical\entities\Client\events
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
