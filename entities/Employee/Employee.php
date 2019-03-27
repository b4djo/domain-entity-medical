<?php

namespace Employee;

use robertobadjio\medical\entities\Employee\dto\EmployeeDto;
use robertobadjio\medical\entities\Employee\EmployeeId;
use robertobadjio\medical\entities\Employee\events\EmployeeCreated;
use robertobadjio\medical\entities\EventTrait;
use robertobadjio\medical\entities\Name;

/**
 * Class Employee
 * @package Employee
 */
class Employee
{
    use EventTrait;

    /**
     * @var EmployeeId
     */
    private $id;

    /**
     * @var Name
     */
    private $name;

    /**
     * @var \DateTimeImmutable
     */
    private $createDate;

    /**
     * @var bool
     */
    private $active;

    /**
     * Employee constructor.
     * @param EmployeeDto $employeeDto
     * @throws \Exception
     */
    public function __construct(EmployeeDto $employeeDto)
    {
        $this->id         = $employeeDto->id;
        $this->name       = $employeeDto->name;
        $this->createDate = new \DateTimeImmutable();
        $this->active     = $employeeDto->active;

        $this->setEvent(new EmployeeCreated(new EmployeeId($this->id)));
    }

    /**
     * @return EmployeeId
     */
    public function getId(): EmployeeId
    {
        return $this->id;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreateDate(): \DateTimeImmutable
    {
        return $this->createDate;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }
}
