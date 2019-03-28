<?php

namespace robertobadjio\medical\entities\ServicesRendered;

use robertobadjio\medical\entities\AggregateInterface;
use robertobadjio\medical\entities\Client\Client;
use robertobadjio\medical\entities\Client\ServicesRenderedId;
use robertobadjio\medical\entities\Employee\Employee;
use robertobadjio\medical\entities\EventTrait;
use robertobadjio\medical\entities\ServicesRendered\dto\ServicesRenderedDto;
use robertobadjio\medical\entities\ServicesRendered\events\ServicesRenderedCreated;

/**
 * Class ServicesRendered
 * @package robertobadjio\medical\entities\Service
 */
class ServicesRendered implements AggregateInterface
{
    use EventTrait;

    /**
     * @var ServicesRenderedId
     */
    private $id;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var Employee
     */
    private $employee;

    /**
     * @var \DateTimeImmutable
     */
    private $date;

    /**
     * @var \DateTimeImmutable
     */
    private $createDate;

    /**
     * ServicesRendered constructor.
     * @param ServicesRenderedDto $servicesRenderedDto
     * @throws \Exception
     */
    public function __construct(ServicesRenderedDto $servicesRenderedDto)
    {
        $this->id         = $servicesRenderedDto->id;
        $this->client     = $servicesRenderedDto->client;
        $this->employee   = $servicesRenderedDto->employee;
        $this->date       = $servicesRenderedDto->dateTime;
        $this->createDate = new \DateTimeImmutable();

        $this->setEvent(new ServicesRenderedCreated(new ServicesRenderedId($this->id)));
    }

    /**
     * @return ServicesRenderedId
     */
    public function getId(): ServicesRenderedId
    {
        return $this->id;
    }
}
