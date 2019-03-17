<?php

namespace robertobadjio\medical\entities;

use Assert\Assertion;

/**
 * Class Id
 * @package robertobadjio\medical\entities
 */
abstract class Id
{
    /**
     * @var null
     */
    protected $id;

    /**
     * Id constructor
     *
     * @param null $id
     */
    public function __construct($id = null)
    {
        //Assertion::notEmpty($id);

        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param self $other
     * @return bool
     */
    public function isEqualTo(self $other): bool
    {
        return $this->getId() === $other->getId();
    }
}
