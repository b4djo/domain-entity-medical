<?php

namespace robertobadjio\medical\dispatchers;

/**
 * Interface EventDispatcherInterface
 * @package Medical\Dispatchers
 */
interface EventDispatcherInterface
{
    /**
     * @param array $events
     */
    public function dispatch(array $events): void;
}
