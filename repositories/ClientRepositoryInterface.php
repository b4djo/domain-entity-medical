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
     * @param Client $client
     */
    public function add(Client $client)/*: void*/;

    /**
     * @param Client $client
     */
    public function save(Client $client)/*: void*/;

    /**
     * @param Client $client
     */
    public function remove(Client $client)/*: void*/;

    /**
     * @return ClientId
     */
    public function nextId();/*: ClientId;*/
}
