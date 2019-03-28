<?php

namespace robertobadjio\medical\repositories;

use robertobadjio\medical\entities\Client\Client;
use robertobadjio\medical\entities\Client\ClientId;
use Ramsey\Uuid\Uuid;

/**
 * Class MemoryClientRepository
 * @package robertobadjio\medical\repositories
 */
class MemoryClientRepository implements ClientRepositoryInterface
{
    /**
     * @var array
     */
    private $items = [];

    /**
     * @param ClientId $id
     * @return Client
     */
    public function get(ClientId $id): Client
    {
        if (!isset($this->items[$id->getId()])) {
            throw new NotFoundException('Client not found.');
        }

        return clone $this->items[$id->getId()];
    }

    /**
     * @param Client $client
     */
    public function add(Client $client)
    {
        $this->items[$client->getId()->getId()] = $client;
    }

    /**
     * @param Client $client
     */
    public function save(Client $client)/*: void*/
    {
        $this->items[$client->getId()->getId()] = $client;
    }

    /**
     * @param Client $client
     */
    public function remove(Client $client)/*: void*/
    {
        if ($this->items[$client->getId()->getId()]) {
            unset($this->items[$client->getId()->getId()]);
        }
    }

    /**
     * @return ClientId
     * @throws \Exception
     */
    public function nextId(): ClientId
    {
        return new ClientId(Uuid::uuid4()->toString());
    }
}
