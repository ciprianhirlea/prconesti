<?php
/**
* @package   PrCOnesti Template
* @file      comments.php
* @version   1.0 November 2011
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright (C) 2011 PrCOnesti
* @license PrCOnesti
*/

// find related file in /warp/systems/wordpress.3.0/layouts/comments.php
$warp =& Warp::getInstance();
echo $warp->template->render('comments');