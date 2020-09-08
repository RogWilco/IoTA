<?php
namespace Iota\View;

/**
 * The primary index view.
 * 
 * @package Iota
 * @author Nick Williams
 * @version 1.0.0
 */
class Index extends \Bedrock\View {
	/**
	 * Renders the page.
	 * 
	 * @param string $page the name of the page to render, or 'self' for the main page
	 * 
	 * @throws \Bedrock\View\Exception
	 * 
	 * @return void
	 */
	public function render($page = 'self') {
		try {
			switch($page) {
				case 'self':
					include $this->_root . 'index.php';
					break;
				
				case 'body':
					if(count($this->_body) > 0) {
						include $this->_root . array_pop($this->_body);
					}
					break;
				
				case 'javascript':
					foreach($this->_javascript as $javascript) {
						include $javascript;
					}
					
					break;
				
				default:
					break;
			}
		}
		catch(\Exception $ex) {
			\Bedrock\Common\Logger::exception($ex);
			throw new \Bedrock\View\Exception('The view could not be rendered.');
		}
	}
}
