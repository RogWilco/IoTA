<?php
namespace \Iota\Core\Event;

/**
 * Implemented by any object interested in subscribing to an event.
 *
 * @package \Iota\Core\Event
 * @author Nick Williams
 * @version 1.0.0
 */
interface Listener {
    /**
     * Invoked by the event bus when a subscribed event is triggered.
     */
    public function eventTriggered(Event $event);
}