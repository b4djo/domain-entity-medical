<?php

namespace robertobadjio\medical\entities\Employee;

use robertobadjio\medical\entities\Id;

/**
 * Class EmployeeId
 * @package robertobadjio\medical\entities\Employee
 */
class EmployeeId extends Id
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
