<?php

namespace Medical\Dispatchers;

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
