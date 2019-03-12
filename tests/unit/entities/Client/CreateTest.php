<?php

namespace robertobadjio\medical\tests\unit\entities\Client;

use robertobadjio\medical\entities\Client\ClientId;
use PHPUnit\Framework\TestCase;

/**
 * Class CreateTest
 * @package robertobadjio\medical\tests\unit\entities\Client
 */
class CreateTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testSuccess()
    {
        $clientId = new ClientId(5);

        $client = ClientBuilder::instance()->withId($clientId->getId())->build();

        $this->assertEquals($clientId, $client->getId());
    }
}
