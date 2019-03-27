<?php

namespace robertobadjio\medical\entities\Employee\dto;

use robertobadjio\medical\entities\Employee\EmployeeId;
use robertobadjio\medical\entities\Name;

/**
 * Class EmployeeDto
 * @package Employee\dto
 */
class EmployeeDto
{
    /**
     * @var EmployeeId
     */
    public $id;

    /**
     * @var Name
     */
    public $name;

    /**
     * @var string
     */
    public $position;

    /**
     * @var bool
     */
    public $active;
}
