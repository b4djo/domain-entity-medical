<?php

namespace Medical\Entities;

/**
 * Interface AggregateInterface
 * @package Medical\Entities
 */
interface AggregateInterface
{
    public function getEvents();
}
