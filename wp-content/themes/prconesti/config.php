<?php
/**
* @package   PrCOnesti Template
* @file      config.php
* @version   1.0 November 2011
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright (C) 2011 PrCOnesti
* @license PrCOnesti
*/

require_once(dirname(__FILE__).'/warp/warp.php');

$warp =& Warp::getInstance();

// add paths
$warp->path->register(dirname(__FILE__).'/warp/systems/wordpress.3.0/helpers','helpers');
$warp->path->register(dirname(__FILE__).'/warp/systems/wordpress.3.0/layouts','layouts');    
$warp->path->register(dirname(__FILE__).'/layouts','layouts');    
$warp->path->register(dirname(__FILE__).'/js', 'js');
$warp->path->register(dirname(__FILE__).'/css', 'css');

// load helpers
$warp->loadHelper(array('system', 'modules', 'javascripts', 'stylesheets', 'useragent', 'cache'));

require_once(dirname(__FILE__)."/presets.php");