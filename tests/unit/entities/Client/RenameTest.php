<?php

namespace tests\unit\entities\Client;

use Medical\entities\Client\Address;
use Medical\entities\Client\Client;
use Medical\entities\Client\ClientId;
use Medical\entities\Client\Dto\ClientDto;
use Medical\entities\Client\Name;
use Medical\entities\Client\Phone;

/**
 * Class RenameTest
 * @package tests\unit\entities\Client
 */
class RenameTest
{
    /**
     * @throws \Exception
     */
    public function testSuccess()
    {
        $clientDto = new ClientDto();
        $clientDto->name = new Name('Иванов', 'Иван', 'Иванович');
        $clientDto->phones = [
            new Phone(7, '905','6524585'),
            new Phone(7, '961','5602548'),
        ];
        $clientDto->id = new ClientId(15);
        $clientDto->address = new Address('Россия', 'г. Москва', 'г. Москва', 'ул. Новый Арбат', 100);
        $clientDto->birthDate = \DateTimeImmutable::createFromFormat('Y-m-d', '1991-06-15');

        $client = new Client($clientDto);

        $client->rename($name = new Name('Петров', 'Петр', 'Петрович'));

        $this->assertEquals($name, $client->getName());
    }
}
