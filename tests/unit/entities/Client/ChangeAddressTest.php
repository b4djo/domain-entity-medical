<?php

namespace Medical\Tests\unit\entities\Client;

use Medical\Entities\Client\Address;
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
    public function testSuccess()
    {
        $client = ClientBuilder::instance()->withId(10)->build();

        $client->changeAddress($address = new Address('Россия', 'Республика татарстан', 'г. Казань', 'ул. Тукая', 25));

        $this->assertEquals($address, $client->getAddress());
    }
}
