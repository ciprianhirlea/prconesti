<?php
/**
* @package   Warp Theme Framework
* @file      style.php
* @version   5.5.16
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright  2011 PrCOnesti
* @license PrCOnesti
*/

printf('<select %s>', $control->attributes(array('class' => 'widget-style', 'name' => $name)));

foreach ($node->children('option') as $option) {

	// set attributes
	$attributes = array('value' => $option->attributes('value'));
	
	// is checked ?
	if ($option->attributes('value') == $value) {
		$attributes = array_merge($attributes, array('selected' => 'selected'));
	}

	printf('<option %s>%s</option>', $control->attributes($attributes), $option->attributes('name'));
	
	// has colors ?
	if ($colors = $option->children('color')) {
		$selects[] = sprintf('<select class="widget-color %s">', $option->attributes('value'));

		foreach ($colors as $color) {

			// set attributes
			$attributes = array('value' => $color->attributes('value'));

			// is checked ?
			if (isset($widget->options['color']) && $color->attributes('value') == $widget->options['color']) {
				$attributes = array_merge($attributes, array('selected' => 'selected'));
			}

			$selects[] = sprintf('<option %s>%s</option>', $control->attributes($attributes), $color->attributes('name'));
		}

		$selects[] = '</select>';
	}
	
}

printf('</select>');

if (isset($selects)) {
	echo implode("", $selects);
}