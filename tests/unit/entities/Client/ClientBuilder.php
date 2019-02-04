<?php

namespace Medical\Tests\unit\entities\Client;

use Medical\Entities\Client\Address;
use Medical\Entities\Client\Client;
use Medical\Entities\Client\ClientId;
use Medical\Entities\Client\dto\ClientDto;
use Medical\Entities\Client\Name;
use Medical\Entities\Client\Phone;

/**
 * Class ClientBuilder
 * @package unit\entities\Client
 */
class ClientBuilder
{
    /**
     * @var int
     */
    private $id = 1;

    /**
     * @var array
     */
    private $phones = [];

    /**
     * @var bool
     */
    private $active = true;

    /**
     * ClientBuilder constructor.
     */
    public function __construct()
    {
        $this->phones[] = [
            new Phone(7, '905', '6524585'),
            new Phone(7, '961', '5602548'),
        ];
    }

    /**
     * @return ClientBuilder
     */
    public static function instance()
    {
        return new self();
    }

    /**
     * @param int $id
     * @return $this
     */
    public function withId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param array $phones
     * @return $this
     */
    public function withPhones(array $phones)
    {
        $this->phones = $phones;

        return $this;
    }

    /**
     * @return $this
     */
    public function active()
    {
        $this->active = true;

        return $this;
    }

    /**
     * @return Client
     */
    public function build()
    {
        $clientDto = new ClientDto();
        $clientDto->name = new Name('Иванов', 'Иван', 'Иванович');
        $clientDto->phones = $this->phones;
        $clientDto->id = new ClientId($this->id);
        $clientDto->address = new Address('Россия', 'г. Москва', 'г. Москва', 'ул. Новый Арбат', 100);
        $clientDto->birthDate = \DateTimeImmutable::createFromFormat('Y-m-d', '1991-06-15');

        return new Client($clientDto);
    }
}
