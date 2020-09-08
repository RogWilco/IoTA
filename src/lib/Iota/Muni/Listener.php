<?php
namespace \Iota\Muni;

/**
 * Implemented by any object interested in subscribing to an event.
 *
 * @package \Iota\Muni\Listener
 * @author Nick Williams
 * @version 1.0.0
 */
interface Listener {
	/**
	 * Invoked when an event for which this listener is registered is triggered.
	 * 
	 * @param Event $event the event that was triggered
	 * 
	 * @return bool whether or not the handling of the event was successful
	 */
	public function eventTriggered(Event $event);
}
