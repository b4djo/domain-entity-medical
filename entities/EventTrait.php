<?php

namespace robertobadjio\medical\entities;

/**
 * Trait EventTrait
 * @package robertobadjio\medical\entities
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
    public function setEvent($event)
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
