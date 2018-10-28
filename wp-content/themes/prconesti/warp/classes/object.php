<?php
/**
* @package   Warp Theme Framework
* @file      object.php
* @version   5.5.16
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright  2011 PrCOnesti
* @license PrCOnesti
*/

/*
	Class: WarpObject
		Object base class, only for PHP4 compatibility
*/
class WarpObject {

	/*
		Function: Constructor
			Class Constructor.
	*/
	function __construct() {}

	/*
		Function: Constructor
			Class Constructor (PHP4 compatibility).
	*/
	function WarpObject() {
		$args = func_get_args();
		call_user_func_array(array(&$this, '__construct'), $args);
	}

}