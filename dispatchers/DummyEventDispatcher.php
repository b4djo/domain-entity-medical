<?php

namespace robertobadjio\medical\dispatchers;

/**
 * Class DummyEventDispatcher
 * @package Medical\Dispatchers
 */
class DummyEventDispatcher implements EventDispatcherInterface
{
    /**
     * @param array $events
     */
    public function dispatch(array $events): void
    {
        foreach ($events as $event) {
            // TODO
        }
    }
}
