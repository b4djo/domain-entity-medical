<?php

namespace robertobadjio\medical\tests\unit\entities\Client;

use robertobadjio\medical\entities\Client\events\ClientPhoneAdded;
use robertobadjio\medical\entities\Client\events\ClientPhoneRemoved;
use robertobadjio\medical\entities\Client\Phone;
use PHPUnit\Framework\TestCase;

/**
 * Class PhoneTest
 * @package robertobadjio\medical\tests\unit\entities\Client
 */
class PhoneTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testAdd(): void
    {
        $client = ClientBuilder::instance()->build();

        $client->addPhone($phone = new Phone(7, '888', '00000001'));

        $this->assertNotEmpty($phones = $client->getPhones());

        $phones = $phones->getAll();
        $this->assertEquals($phone, end($phones));

        $this->assertNotEmpty($events = $client->getEvents());
        $this->assertInstanceOf(ClientPhoneAdded::class, end($events));
    }

    /**
     * @throws \Exception
     */
    public function testAddExists(): void
    {
        $client = ClientBuilder::instance()
            ->withPhones([$phone = new Phone(7, '888', '00000001')])
            ->build();

        $this->expectExceptionMessage('Phone already exists.');

        $client->addPhone($phone);
    }

    /**
     * @throws \Exception
     */
    public function testRemove(): void
    {
        $client = ClientBuilder::instance()
            ->withPhones([
                new Phone(7, '888', '00000001'),
                new Phone(7, '888', '00000002'),
            ])
            ->build();

        $this->assertCount(2, $client->getPhones()->getAll());

        $client->removePhone(1);

        $this->assertCount(1, $client->getPhones()->getAll());

        $this->assertNotEmpty($events = $client->getEvents());
        $this->assertInstanceOf(ClientPhoneRemoved::class, end($events));
    }

    /**
     * @throws \Exception
     */
    public function testRemoveNotExists(): void
    {
        $client = ClientBuilder::instance()->build();

        $this->expectExceptionMessage('Phone not found.');

        $client->removePhone(42);
    }

    /**
     * @throws \Exception
     */
    public function testRemoveLast(): void
    {
        $employee = ClientBuilder::instance()
            ->withPhones([
                new Phone(7, '888', '00000001'),
            ])
            ->build();

        $this->expectExceptionMessage('Cannot remove the last phone.');

        $employee->removePhone(0);
    }

    public function testIsEqual(): void
    {
        $phone1 = new Phone(7, '920', '0000001');
        $phone2 = new Phone(7, '920', '0000001');

        $this->assertTrue($phone1->isEqualTo($phone2));
    }

    public function testIsNotEqual(): void
    {
        $phone1 = new Phone(7, '920', '0000001');
        $phone2 = new Phone(7, '900', '0000002');

        $this->assertFalse($phone1->isEqualTo($phone2));
    }
}
