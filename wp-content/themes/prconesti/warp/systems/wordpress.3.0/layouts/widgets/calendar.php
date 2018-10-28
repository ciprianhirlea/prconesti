<?php
/**
* @package   Warp Theme Framework
* @file      calendar.php
* @version   5.5.16
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright  2011 PrCOnesti
* @license PrCOnesti
*/

$xml  =& $this->getHelper('xml');
$cal  = $xml->load($oldoutput, 'xhtml');

if ($table = $cal->document->getElement('table')) {
    $table->_attributes = array();
	$table->addAttribute('class', 'calendar');
	$table->addAttribute('cellspacing', '0');
    echo $table->toString();
}