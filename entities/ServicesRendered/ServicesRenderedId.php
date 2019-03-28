<?php

namespace robertobadjio\medical\entities\Client;

use robertobadjio\medical\entities\Id;

/**
 * Class ServicesRenderedId
 * @package robertobadjio\medical\entities\Client
 */
class ServicesRenderedId extends Id
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
