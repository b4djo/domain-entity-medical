<?php

namespace Medical\Entities\unit\entities\Client;

use Medical\Entities\Client\events\ClientRemoved;
use Medical\Tests\unit\entities\Client\ClientBuilder;
use PHPUnit\Framework\TestCase;

/**
 * Class RemoveTest
 * @package Medical\Entities\unit\entities\Client
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
