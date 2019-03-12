<?php

namespace robertobadjio\medical\tests\unit\entities\Client;

use robertobadjio\medical\entities\Client\events\ClientRenamed;
use robertobadjio\medical\entities\Client\Name;
use PHPUnit\Framework\TestCase;

/**
 * Class RenameTest
 * @package robertobadjio\medical\tests\unit\entities\Client
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
