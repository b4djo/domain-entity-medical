<?php

namespace robertobadjio\medical\entities\Client\events;

use robertobadjio\medical\entities\Client\Name;

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
