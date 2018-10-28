<?php
/**
* @package   Warp Theme Framework
* @file      archives.php
* @version   5.5.16
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright  2011 PrCOnesti
* @license PrCOnesti
*/

if ($params['dropdown']) {
    echo $oldoutput;
} else {

    // add links css class
    $xml  =& $this->getHelper('xml');
    $list = $xml->load($oldoutput, 'xhtml');
    
    if ($ul = $list->document->getElement('ul')) {
        $ul->addAttribute('class', 'line');
        echo $ul->toString();
    }
}