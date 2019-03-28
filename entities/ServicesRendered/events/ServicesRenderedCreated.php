<?php

namespace robertobadjio\medical\entities\ServicesRendered\events;

use robertobadjio\medical\entities\Client\ServicesRenderedId;

/**
 * Class ServicesRenderedCreated
 * @package robertobadjio\medical\entities\ServicesRendered\events
 */
class ServicesRenderedCreated
{
    /**
     * @var ServicesRenderedId
     */
    public $servicesRenderedId;

    /**
     * ClientCreated constructor.
     * @param ServicesRenderedId $servicesRenderedId
     */
    public function __construct(ServicesRenderedId $servicesRenderedId)
    {
        $this->servicesRenderedId = $servicesRenderedId;
    }
}
