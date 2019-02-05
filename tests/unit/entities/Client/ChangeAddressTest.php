<?php

namespace Medical\Tests\unit\entities\Client;

use Medical\Entities\Client\Address;
use Medical\Entities\Client\events\ClientAddressChanged;
use PHPUnit\Framework\TestCase;

/**
 * Class ChangeAddressTest
 * @package Medical\tests\unit\entities\Client
 */
class ChangeAddressTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testSuccess(): void
    {
        $client = ClientBuilder::instance()->build();

        $client->changeAddress($address = new Address('Россия', 'Республика татарстан', 'г. Казань', 'ул. Тукая', 25));

        $this->assertEquals($address, $client->getAddress());
        $this->assertNotEmpty($events = $client->getEvents());
        $this->assertInstanceOf(ClientAddressChanged::class, end($events));
    }
}
