<?php
/**
* @package   Warp Theme Framework
* @file      text.php
* @version   5.5.16
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright  2011 PrCOnesti
* @license PrCOnesti
*/

// set attributes
$attributes = $node->attributes();
$attributes['type']  = 'text';
$attributes['name']  = $name;
$attributes['value'] = $value;

printf('<input %s />', $control->attributes($attributes, array('label', 'description', 'default')));