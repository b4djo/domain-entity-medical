<?php

namespace robertobadjio\medical\dispatchers;

/**
 * Interface EventDispatcherInterface
 * @package robertobadjio\medical\dispatchers
 */
interface EventDispatcherInterface
{
    /**
     * @param array $events
     */
    public function dispatch(array $events)/*: void*/;
}
