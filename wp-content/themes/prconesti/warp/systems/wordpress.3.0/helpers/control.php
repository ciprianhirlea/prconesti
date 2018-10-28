<?php
/**
* @package   Warp Theme Framework
* @file      control.php
* @version   5.5.16
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright  2011 PrCOnesti
* @license PrCOnesti
*/

class WarpHelperControl extends WarpHelper {

	/*
		Function: render
			Render a intput/control like text, select or radio button

		Returns:
			String
	*/
	function render($type, $name, $value, $node, $args = array()) {
		
		// set vars
		$args['control'] = $this;
		$args['name']    = $name;
		$args['value']   = $value;
		$args['node']    = $node;
		
		return $this->warp->template->render('controls/'.$type, $args);
	}

	/*
		Function: attributes
			Create html attribute string from array

		Returns:
			String
	*/
	function attributes($attributes, $ignore = array()) {

		$attribs = array();
		$ignore  = (array) $ignore;
		
		foreach ($attributes as $name => $value) {
			if (in_array($name, $ignore)) continue;

			$attribs[] = sprintf('%s="%s"', $name, htmlspecialchars($value));
		}
		
		return implode(' ', $attribs);
	}

}