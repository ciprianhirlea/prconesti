<?php
/**
* @package   Warp Theme Framework
* @file      menu.php
* @version   5.5.16
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright  2011 PrCOnesti
* @license PrCOnesti
*/

/*
	Class: WarpMenu
		Menu base class
*/
class WarpMenu extends WarpObject {

	/*
		Function: process
			Abstract function. New implementation in child classes.

		Returns:
			Xml Object
	*/	
	function process($xmlobj, $level=0) {
		return $xmlobj;
	}

}