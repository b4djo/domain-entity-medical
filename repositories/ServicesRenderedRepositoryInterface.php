<?php

namespace robertobadjio\medical\repositories;

use robertobadjio\medical\entities\Client\ServicesRenderedId;
use robertobadjio\medical\entities\ServicesRendered\ServicesRendered;

/**
 * Interface ServicesRenderedRepositoryInterface
 * @package robertobadjio\medical\repositories
 */
interface ServicesRenderedRepositoryInterface
{
    /**
     * @param ServicesRenderedId $id
     * @return ServicesRendered
     */
    public function get(ServicesRenderedId $id): ServicesRendered;

    /**
     * @param ServicesRendered $client
     */
    public function add(ServicesRendered $client)/*: void*/;

    /**
     * @param ServicesRendered $client
     */
    public function save(ServicesRendered $client)/*: void*/;

    /**
     * @param ServicesRendered $client
     */
    public function remove(ServicesRendered $client)/*: void*/;

    /**
     * @return ServicesRenderedId
     */
    public function nextId();/*: ClientId;*/
}
