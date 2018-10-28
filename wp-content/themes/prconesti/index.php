<?php
/**
* @package   PrCOnesti Template
* @file      index.php
* @version   1.0 November 2011
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright (C) 2011 PrCOnesti
* @license PrCOnesti
*/

$warp =& Warp::getInstance();
echo $warp->template->render('template');