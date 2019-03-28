<?php

namespace robertobadjio\medical\repositories;

use robertobadjio\medical\entities\Client\ServicesRenderedId;
use robertobadjio\medical\entities\ServicesRendered\ServicesRendered;
use Ramsey\Uuid\Uuid;

/**
 * Class MemoryServicesRenderedRepository
 * @package robertobadjio\medical\repositories
 */
class MemoryServicesRenderedRepository implements ServicesRenderedRepositoryInterface
{
    /**
     * @var array
     */
    private $items = [];

    /**
     * @param ServicesRenderedId $id
     * @return ServicesRendered
     */
    public function get(ServicesRenderedId $id): ServicesRendered
    {
        if (!isset($this->items[$id->getId()])) {
            throw new NotFoundException('Service rendered not found.');
        }

        return clone $this->items[$id->getId()];
    }

    /**
     * @param ServicesRendered $servicesRendered
     */
    public function add(ServicesRendered $servicesRendered)
    {
        $this->items[$servicesRendered->getId()->getId()] = $servicesRendered;
    }

    /**
     * @param ServicesRendered $servicesRendered
     */
    public function save(ServicesRendered $servicesRendered)/*: void*/
    {
        $this->items[$servicesRendered->getId()->getId()] = $servicesRendered;
    }

    /**
     * @param ServicesRendered $client
     */
    public function remove(ServicesRendered $client)/*: void*/
    {
        if ($this->items[$client->getId()->getId()]) {
            unset($this->items[$client->getId()->getId()]);
        }
    }

    /**
     * @return ServicesRenderedId
     * @throws \Exception
     */
    public function nextId(): ServicesRenderedId
    {
        return new ServicesRenderedId(Uuid::uuid4()->toString());
    }
}
