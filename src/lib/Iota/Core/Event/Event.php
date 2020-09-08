<?php
namespace \Iota\Core\Event;

/**
 * Represents a single event that can be dispatched from within the event bus
 * to various listeners.
 *
 * @package \Iota\Core\Event
 * @author Nick Williams
 * @version 1.0.0
 */
class Event {
    const STATUS_NEW;
    const STATUS_DISPATCHED;
    
    protected $_time;
    protected $_status = self::STATUS_NEW;
    protected $_type;
    
    /**
     * Initializes a new event instance.
     */
    public function __construct($type) {
        $this->time = time();
        $this->type = $type;
    }
    
    
    public function __set($name, $value) {
        
    }
    
    public function __get($name) {
        
    }
    
    protected function _setTime($value) {
        
    }
    
    protected function _setStatus($value) {
        
    }
}