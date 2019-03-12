<?php

namespace robertobadjio\medical\repositories;

use robertobadjio\medical\entities\Client\Client;
use robertobadjio\medical\entities\Client\ClientId;

/**
 * Interface ClientRepositoryInterface
 * @package robertobadjio\medical\repositories
 */
interface ClientRepositoryInterface
{
    /**
     * @param ClientId $id
     * @return Client
     */
    public function get(ClientId $id): Client;

    /**
     * @param Client $employee
     */
    public function add(Client $employee): void;

    /**
     * @param Client $employee
     */
    public function save(Client $employee): void;

    /**
     * @param Client $employee
     */
    public function remove(Client $employee): void;

    /**
     * @return ClientId
     */
    public function nextId(): ClientId;
}
