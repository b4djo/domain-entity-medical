<?php

namespace robertobadjio\medical\repositories;

use robertobadjio\medical\entities\Client\Client;
use robertobadjio\medical\entities\Client\ClientId;
use Ramsey\Uuid\Uuid;

/**
 * Class ClientRepository
 * @package robertobadjio\medical\repositories
 */
class ClientRepository implements ClientRepositoryInterface
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
            throw new NotFoundException('Employee not found.');
        }
        return clone $this->items[$id->getId()];
    }

    /**
     * @param Client $employee
     */
    public function add(Client $employee): void
    {
        $this->items[$employee->getId()->getId()] = $employee;
    }

    /**
     * @param Client $employee
     */
    public function save(Client $employee): void
    {
        $this->items[$employee->getId()->getId()] = $employee;
    }

    /**
     * @param Client $employee
     */
    public function remove(Client $employee): void
    {
        if ($this->items[$employee->getId()->getId()]) {
            unset($this->items[$employee->getId()->getId()]);
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
