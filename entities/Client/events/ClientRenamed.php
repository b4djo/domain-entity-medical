<?php

namespace Medical\Entities\Client\events;

use Medical\Entities\Client\Name;

/**
 * Class ClientRenamed
 * @package Medical\Entities\Client\events
 */
class ClientRenamed
{
    /**
     * @var Name
     */
    public $name;

    /**
     * ClientRenamed constructor.
     * @param Name $name
     */
    public function __construct(Name $name)
    {
        $this->name = $name;
    }
}
