<?php
namespace \Iota\Muni;

class Bus {
    const TARGET_TYPE_LISTENER = 'listener';
    const TARGET_TYPE_CALLBACK = 'callback';

	protected $_registry;

	/**
	 * Initializes a new event bus manager.
	 *
	 * @return void
	 */
	public function __construct() {

	}
	
	public function registerListener(Listener $listener, $eventScope, $persist = true) {

	}

	public function registerCallback(callable $callback, $eventScope, $persist = true) {

	}

	public function dispatch(Event $event) {

	}
}
