<?php
/**
* @package   Warp Theme Framework
* @file      text.php
* @version   5.5.16
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright  2011 PrCOnesti
* @license PrCOnesti
*/

$out = trim($oldoutput);

if (preg_match('/^<div class="textwidget">/i', $out)) {
	$out = substr($out, 24, -6);
}

echo $out;