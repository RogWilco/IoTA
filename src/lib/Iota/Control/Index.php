<?php
namespace Iota\Control;

/**
 * The primary index controller.
 * 
 * @package Iota
 * @author Nick Williams
 * @version 1.0.0
 */
class Index extends \Bedrock\Control {
	/**
	 * The main index for the controller.
	 * 
	 * @param array $args an array of arguments passed from the GET string
	 * 
	 * @return null
	 */
	public function index($args) {
		try {
			// Sample Output (feel free to delete this)
			$view = new \Iota\View\Index();
			$view->setValue('message', 'Bedrock Framework Application: Installation Successful!');
			$view->render('self');
		}
		catch(\Exception $ex) {
			\Bedrock\Common\Logger::exception($ex);
		}
	}
}
