<?php

namespace robertobadjio\medical\entities\ServicesRendered\dto;

use robertobadjio\medical\entities\Client\Client;
use robertobadjio\medical\entities\Client\ServicesRenderedId;
use robertobadjio\medical\entities\Employee\Employee;
use robertobadjio\medical\entities\Service\Services;

/**
 * Class ServicesRenderedDto
 * @package robertobadjio\medical\entities\ServicesRendered\dto
 */
class ServicesRenderedDto
{
    /**
     * @var ServicesRenderedId
     */
    public $id;

    /**
     * @var Employee
     */
    public $employee;

    /**
     * @var Client
     */
    public $client;

    /**
     * @var Services
     */
    public $service;

    /**
     * @var \DateTimeImmutable
     */
    public $dateTime;
}
