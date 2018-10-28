<?php
/**
* @package   Warp Theme Framework
* @file      pre.php
* @version   5.5.16
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright  2011 PrCOnesti
* @license PrCOnesti
*/

/*
	Class: WarpMenuPre
		Menu base class
*/
class WarpMenuPre extends WarpMenu {

	
	/*
		Function: process
			
		Returns:
			Xml Object
	*/	
	function process(&$module, &$xmlobj) {
		return $xmlobj;
	}

}