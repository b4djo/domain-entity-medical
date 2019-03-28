<?php

namespace robertobadjio\medical\entities\ServicesRendered\dto;

use robertobadjio\medical\entities\Client\Client;
use robertobadjio\medical\entities\Client\dto\AddressDto;
use robertobadjio\medical\entities\Client\dto\NameDto;
use robertobadjio\medical\entities\Client\dto\PhoneDto;
use robertobadjio\medical\entities\Employee\Employee;
use robertobadjio\medical\entities\Service\Services;

/**
 * Class ServicesRenderedDto
 * @package robertobadjio\medical\entities\ServicesRendered\dto
 */
class ServicesRenderedCreateDto
{
    /**
     * @var NameDto
     */
    public $clientName;

    /**
     * @var PhoneDto[]
     */
    public $clientPhones;

    /**
     * @var AddressDto
     */
    public $clientAddress;

    /**
     * @var Client
     */
    public $client;

    /**
     * @var Services
     */
    public $service;

    /**
     * @var Employee
     */
    public $employee;

    /**
     * @var \DateTimeImmutable
     */
    public $dateTime;
}
