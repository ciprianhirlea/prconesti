<?php
/**
* @package   Warp Theme Framework
* @file      list.php
* @version   5.5.16
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright  2011 PrCOnesti
* @license PrCOnesti
*/

printf('<select %s>', $control->attributes(compact('name')));

foreach ($node->children('option') as $option) {

	// set attributes
	$attributes = array('value' => $option->attributes('value'));
	
	// is checked ?
	if ($option->attributes('value') == $value) {
		$attributes = array_merge($attributes, array('selected' => 'selected'));
	}

	printf('<option %s>%s</option>', $control->attributes($attributes), $option->data());
}

printf('</select>');