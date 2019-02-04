<?php

namespace Medical\Tests\unit\entities\Client;

use Medical\entities\Client\ClientId;
use PHPUnit\Framework\TestCase;

/**
 * Class CreateTest
 * @package Medical\tests\unit\entities\Client
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
