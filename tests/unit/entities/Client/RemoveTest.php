<?php

namespace robertobadjio\medical\entities\unit\entities\Client;

use robertobadjio\medical\entities\Client\events\ClientRemoved;
use robertobadjio\medical\tests\unit\entities\Client\ClientBuilder;
use PHPUnit\Framework\TestCase;

/**
 * Class RemoveTest
 * @package robertobadjio\medical\entities\unit\entities\Client
 */
class RemoveTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testSuccess(): void
    {
        $client = ClientBuilder::instance()->notActive()->build();

        $client->remove();

        $this->assertNotEmpty($events = $client->getEvents());
        $this->assertInstanceOf(ClientRemoved::class, end($events));
    }

    /**
     * @throws \Exception
     */
    public function testNotActive(): void
    {
        $client = ClientBuilder::instance()->build();

        $this->expectExceptionMessage('Cannot remove active client.');

        $client->remove();
    }
}
