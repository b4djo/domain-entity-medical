<?php

namespace Medical\Entities;

/**
 * Trait EventTrait
 * @package Medical\Entities
 */
trait EventTrait
{
    /**
     * @var array
     */
    private $events = [];

    /**
     * @param $event
     */
    public function setEvent($event): void
    {
        $this->events[] = $event;
    }

    /**
     * @return array
     */
    public function getEvents(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }
}
