<?php
/**
* @package   PrCOnesti Template
* @file      links.php
* @version   1.0 November 2011
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright (C) 2011 PrCOnesti
* @license PrCOnesti
*/

// add links css class
$xml  =& $this->getHelper('xml');
$list = $xml->load($oldoutput, 'xhtml');

if ($ul = $list->document->getElement('ul')) {
    $ul->addAttribute('class', 'links');
    echo $ul->toString();
}