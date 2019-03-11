<?php

namespace robertobadjio\medical\entities;

use Assert\Assertion;

/**
 * Class Id
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
        Assertion::notEmpty($id);

        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function isEqualTo(self $other): bool
    {
        return $this->getId() === $other->getId();
    }
}