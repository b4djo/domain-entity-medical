<?php

namespace robertobadjio\medical\services;

use robertobadjio\medical\dispatchers\EventDispatcherInterface;
use robertobadjio\medical\entities\Client\Address;
use robertobadjio\medical\entities\Client\Client;
use robertobadjio\medical\entities\Client\dto\AddressDto;
use robertobadjio\medical\entities\Client\dto\ClientDto;
use robertobadjio\medical\entities\Client\dto\NameDto;
use robertobadjio\medical\entities\Client\dto\PhoneDto;
use robertobadjio\medical\entities\Client\Phone;
use robertobadjio\medical\entities\Client\Phones;
use robertobadjio\medical\entities\Name;
use robertobadjio\medical\entities\ServicesRendered\dto\ServicesRenderedCreateDto;
use robertobadjio\medical\entities\ServicesRendered\dto\ServicesRenderedDto;
use robertobadjio\medical\entities\ServicesRendered\ServicesRendered;
use robertobadjio\medical\repositories\ClientRepositoryInterface;
use robertobadjio\medical\repositories\ServicesRenderedRepositoryInterface;

/**
 * Class ServicesRenderedService
 * @package robertobadjio\medical\services
 */
class ServicesRenderedService
{
    /**
     * @var ClientRepositoryInterface
     */
    private $clients;

    /**
     * @var ServicesRenderedRepositoryInterface
     */
    private $servicesRenderedList;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * ServicesRenderedService constructor.
     * @param ClientRepositoryInterface $clients
     */
    public function __construct(ClientRepositoryInterface $clients)
    {
        $this->clients = $clients;
    }

    /**
     * @param ServicesRenderedCreateDto $dto
     * @throws \Exception
     */
    public function create(ServicesRenderedCreateDto $dto)/*: void*/
    {
        $serviceRenderedDto           = new ServicesRenderedDto();
        $serviceRenderedDto->id       = $this->servicesRenderedList->nextId();
        $serviceRenderedDto->client   = $this->getClient($dto);
        $serviceRenderedDto->employee = $dto->employee;
        $serviceRenderedDto->service  = $dto->service;
        $serviceRenderedDto->dateTime = $dto->dateTime;

        $serviceRendered = new ServicesRendered($serviceRenderedDto);

        $this->servicesRenderedList->add($serviceRendered);
        $this->dispatcher->dispatch($serviceRendered->getEvents());
    }

    /**
     * @param ServicesRenderedCreateDto $dto
     * @return Client
     * @throws \Exception
     */
    private function getClient(ServicesRenderedCreateDto $dto): Client
    {
        if ($dto->client) {
            return $dto->client;
        }

        return $this->createClient($dto->clientName, $dto->clientPhones, $dto->clientAddress);
    }

    /**
     * @param NameDto $nameDto
     * @param array $phones
     * @param AddressDto $addressDto
     * @return Client
     * @throws \Exception
     */
    private function createClient(NameDto $nameDto, array $phones, AddressDto $addressDto): Client
    {
        $clientDto          = new ClientDto();
        $clientDto->id      = $this->clients->nextId();
        $clientDto->name    = new Name(
            $nameDto->last,
            $nameDto->first,
            $nameDto->middle
        );
        $clientDto->address = new Address(
            $addressDto->country,
            $addressDto->region,
            $addressDto->city,
            $addressDto->street,
            $addressDto->house
        );
        $clientDto->phones  = new Phones(
            array_map(function (PhoneDto $phone) {
                return new Phone(
                    $phone->country,
                    $phone->code,
                    $phone->number
                );
            }, $phones));

        return new Client($clientDto);
    }
}
