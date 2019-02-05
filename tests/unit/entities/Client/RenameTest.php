<?php

namespace Medical\Tests\unit\entities\Client;

use Medical\Entities\Client\events\ClientRenamed;
use Medical\Entities\Client\Name;
use PHPUnit\Framework\TestCase;

/**
 * Class RenameTest
 * @package Medical\tests\unit\entities\Client
 */
class RenameTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testSuccess(): void
    {
        $client = ClientBuilder::instance()->build();

        $client->rename($name = new Name('Петров', 'Петр', 'Петрович'));

        $this->assertEquals($name, $client->getName());
        $this->assertNotEmpty($events = $client->getEvents());

        $this->assertInstanceOf(ClientRenamed::class, end($events));
    }
}
