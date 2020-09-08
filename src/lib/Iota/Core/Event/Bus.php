<?php
namespace \Iota\Core\Event;

/**
 * An event bus that forwards triggered events to interested/registered
 * listeners.
 *
 * @package \Iota\Core\Event
 * @author Nick Williams
 * @version 1.0.0
 */
class Bus {
    const TARGET_TYPE_LISTENER = 'listener';
    const TARGET_TYPE_CALLBACK = 'callback';
    
    /**
     * @var 
     */
    protected $_registry = array();
    
    /**
     * Initializes a new event bus instance.
     */
    public function __construct() {
        
    }
    
    /**
     * Registeres the specified object as a listener for the specified event.
     * The Listener::eventTriggered() method will be invoked on the listener
     * every time the specified event is triggered. If $persist is set to
     * false, it will only be invoked once, the firs time an event of the
     * specified type is encoutered.
     *
     * @param Listener $listener the listener to be registered
     * @param string $eventType the type of event for which to register
     * @param bool $persist whether or not to persist (ture to listen for every event of that type, false to listen only for the first time the event is triggered)
     *
     * @return void
     */
    public function registerListener(Listener $listener, $eventType, $persist = true) {
        $this->_registry[$eventType] = array(
            'type' => self::TARGET_TYPE_LISTENER,
            'target' => $listener,
            'persist' => $persist
        );
    }
    
    /**
     * Registers the specified closure for the specified event type. Once
     * registered, closures cannot be deregistered for the duration of the
     * execution lifecycle. If $persist is set to false, it will only be
     * invoked once, the firs time an event of the specified type is
     * encoutered.
     *
     * @param callable the callback to be invoked for the specified event type
     * @param string $eventType the type of event for which to register
     * @param bool $persist whether or not to persist (ture to listen for every event of that type, false to listen only for the first time the event is triggered)
     *
     * @return void
     */
    public function registerCallback(callable $callback, $eventType, $persist = true) {
        $this->_registry[$eventType] = array(
            'type' => self::TARGET_TYPE_CALLBACK,
            'target' => $callback,
            'persist' => $persist
        );
    }
    
    /**
     * Deregisters the specified listener, removing any stored association with
     * the specified type of event.
     *
     * @param Listener $listener the listener to be deregistered
     * @param string $eventType the type of event for which the listener will be deregistered
     *
     * @throws Exception if the specified listener could not be found
     * @return void
     */
    public function deregisterListener(Listener $listener, $eventType) {
        if(array_key_exists($event->type, $this->_registry) && count($this->_registry[$event->type]) > 0) {
            foreach($this->_registry[$event->type] as $index => $target) {
                if($target['type'] == self::TARGET_TYPE_LISTENER && $target['target'] === $listener) {
                    unset($this->_registry[$event->type][$index]);
                    break;
                }
            }
            
            throw new Exception('The specified Listener is not registered for events of type "' . $eventType . '".');
        }
    }
    
    /**
     * Clears the registry of any registered listeners or callbacks.
     *
     * @return void
     */
    public function clearRegistry() {
        $this->_registry = array();
    }
    
    /**
     * Dispatches the specified event, forwarding the relevant information to
     * all targets registered for the type of event being dispatched.
     *
     * @param Event $event the event to be dispatched
     *
     * @return void
     */
    public function dispatchEvent(Event $event) {
        if(array_key_exists($event->type, $this->_registry) && count($this->_registry[$event->type]) > 0) {
            foreach($this->_registry[$event->type] as $index => $target) {
                switch($target['type']) {
                    case self::TARGET_TYPE_LISTENER:
                        $target['target']->eventTriggered($event);
                        
                        if(!$target['persist']) {
                            unset($this->_registry[$event->type][$index]);
                        }
                        break;
                        
                    case self::TARGET_TYPE_CALLBACK:
                        $target['target']($event);
                        
                        if(!$target['persist']) {
                            unset($this->_registry[$event->type][$index]);
                        }
                        break;
                }
            }
        }
    }
}