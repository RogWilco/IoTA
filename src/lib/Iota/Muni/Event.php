<?php

namespace \Iota\Muni;

class Event {
	protected $_id = '';
	protected $_name = '';
	protected $_namespace = '';

	/**
	 * Initializes a new event using the specified scope.
	 *
	 * @param string $scope the namespaced scope for the event type
	 * @param array|stdClass $data any associated data included with the event
	 * 
	 * @return void
	 */
	public function __construct($scope, $data) {
		$scopeStack = explode(':', $scope);

		$this->_id = array_pop($scopeStack);f
		$this->_name = array_pop($scopeStack);
		$this->_namespace = $scopeStack;
	}

	/**
	 * Retrieves the requested property.
	 *
	 * @param string $name the name for the desired property
	 * 
	 * @return mixed the corresponding value
	 */
	public function __get($name) {
		switch($name) {
			case 'id':
				return $this->_id;
				break;

			case 'name':
				return $this->_name;
				break;

			case 'namespace':
				return $this->_namespace;
				break;
		}
	}

	/**
	 * Attempts to resolve the specified scope with the current event's scope.
	 * 
	 * @param  string $scope the scope to be compared against
	 * 
	 * @return boolean whether or not the current event matches the specified scope
	 */
	public function resolve($scope) {
		
	}
}
