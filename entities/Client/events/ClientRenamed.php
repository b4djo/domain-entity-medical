<?php

namespace robertobadjio\medical\entities\Client\events;

use robertobadjio\medical\entities\Name;

/**
 * Class ClientRenamed
 * @package robertobadjio\medical\entities\Client\events
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
