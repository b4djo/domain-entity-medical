<?php

namespace Medical\Repositories;

use Medical\Entities\Client\Client;
use Medical\Entities\Client\ClientId;

/**
 * Interface ClientRepositoryInterface
 * @package Medical\Repositories
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
