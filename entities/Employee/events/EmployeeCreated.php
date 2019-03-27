<?php

namespace robertobadjio\medical\entities\Employee\events;

use robertobadjio\medical\entities\Employee\EmployeeId;

/**
 * Class EmployeeCreated
 * @package robertobadjio\medical\entities\Employee\events
 */
class EmployeeCreated
{
    /**
     * @var EmployeeId
     */
    public $clientId;

    /**
     * EmployeeCreated constructor.
     * @param EmployeeId $clientId
     */
    public function __construct(EmployeeId $clientId)
    {
        $this->clientId = $clientId;
    }
}
