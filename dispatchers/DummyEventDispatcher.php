<?php

namespace robertobadjio\medical\dispatchers;

/**
 * Class DummyEventDispatcher
 * @package robertobadjio\medical\dispatchers
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
