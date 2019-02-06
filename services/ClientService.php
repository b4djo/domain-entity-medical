<?php

namespace Medical\Services;

use Medical\Dispatchers\EventDispatcherInterface;
use Medical\Entities\Client\Address;
use Medical\Entities\Client\Client;
use Medical\Entities\Client\ClientId;
use Medical\Entities\Client\dto\AddressDto;
use Medical\Entities\Client\dto\ClientCreateDto;
use Medical\Entities\Client\dto\ClientDto;
use Medical\Entities\Client\dto\NameDto;
use Medical\Entities\Client\dto\PhoneDto;
use Medical\Entities\Client\Name;
use Medical\Entities\Client\Phone;
use Medical\Entities\Client\Phones;
use Medical\Repositories\ClientRepositoryInterface;

/**
 * Class ClientService
 * @package Medical\Services
 */
class ClientService
{
    /**
     * @var ClientRepositoryInterface
     */
    private $clients;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * ClientService constructor.
     * @param ClientRepositoryInterface $clients
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(ClientRepositoryInterface $clients, EventDispatcherInterface $dispatcher)
    {
        $this->clients    = $clients;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param ClientCreateDto $dto
     * @throws \Exception
     */
    public function create(ClientCreateDto $dto): void
    {
        $clientDto = new ClientDto();
        $clientDto->id = $this->clients->nextId();
        $clientDto->name = new Name(
            $dto->name->last,
            $dto->name->first,
            $dto->name->middle
        );
        $clientDto->address = new Address(
            $dto->address->country,
            $dto->address->region,
            $dto->address->city,
            $dto->address->street,
            $dto->address->house
        );
        $clientDto->phones = new Phones(
            array_map(function (PhoneDto $phone) {
            return new Phone(
                $phone->country,
                $phone->code,
                $phone->number
            );
        }, $dto->phones));

        $employee = new Client($clientDto);

        $this->clients->add($employee);
        $this->dispatcher->dispatch($employee->getEvents());
    }

    /**
     * @param ClientId $id
     * @param NameDto $dto
     */
    public function rename(ClientId $id, NameDto $dto): void
    {
        $client = $this->clients->get($id);
        $client->rename(new Name(
            $dto->last,
            $dto->first,
            $dto->middle
        ));
        $this->clients->save($client);
        $this->dispatcher->dispatch($client->getEvents());
    }

    /**
     * @param ClientId $id
     * @param AddressDto $dto
     */
    public function changeAddress(ClientId $id, AddressDto $dto): void
    {
        $client = $this->clients->get($id);
        $client->changeAddress(new Address(
            $dto->country,
            $dto->region,
            $dto->city,
            $dto->street,
            $dto->house
        ));
        $this->clients->save($client);
        $this->dispatcher->dispatch($client->getEvents());
    }

    /**
     * @param ClientId $id
     * @param PhoneDto $dto
     */
    public function addPhone(ClientId $id, PhoneDto $dto): void
    {
        $client = $this->clients->get($id);
        $client->addPhone(new Phone(
            $dto->country,
            $dto->code,
            $dto->number
        ));
        $this->clients->save($client);
        $this->dispatcher->dispatch($client->getEvents());
    }

    /**
     * @param ClientId $id
     * @param $index
     */
    public function removePhone(ClientId $id, $index): void
    {
        $client = $this->clients->get($id);
        $client->removePhone($index);
        $this->clients->save($client);
        $this->dispatcher->dispatch($client->getEvents());
    }

    /**
     * @param ClientId $id
     */
    public function active(ClientId $id): void
    {
        $client = $this->clients->get($id);
        $client->active();
        $this->clients->save($client);
        $this->dispatcher->dispatch($client->getEvents());
    }

    /**
     * @param ClientId $id
     */
    public function notActive(ClientId $id): void
    {
        $client = $this->clients->get($id);
        $client->notActive();
        $this->clients->save($client);
        $this->dispatcher->dispatch($client->getEvents());
    }

    /**
     * @param ClientId $id
     */
    public function remove(ClientId $id): void
    {
        $client = $this->clients->get($id);
        $client->remove();
        $this->clients->remove($client);
        $this->dispatcher->dispatch($client->getEvents());
    }
}