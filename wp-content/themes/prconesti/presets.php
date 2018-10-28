<?php
/**
* @package   PrCOnesti Template
* @file      presets.php
* @version   1.0 November 2011
* @author    PrCOnesti http://www.prconesti.ro
* @copyright Copyright (C) 2011 PrCOnesti
* @license PrCOnesti
*/

/*
 * Presets
 */

$default_preset = array();

$warp->config->addPreset('preset01', 'Dove Fabric', array_merge($default_preset,array(
	'style' => 'default',
	'texture' => 'fabric',
	'font' => 'default'
)));

$warp->config->addPreset('preset02', 'Aqua Squares', array_merge($default_preset,array(
	'style' => 'aqua',
	'texture' => 'squares',
	'font' => 'default'
)));

$warp->config->addPreset('preset03', 'Green Tartan', array_merge($default_preset,array(
	'style' => 'green',
	'texture' => 'tartan',
	'font' => 'default'
)));

$warp->config->addPreset('preset04', 'Grey Plain', array_merge($default_preset,array(
	'style' => 'grey',
	'texture' => 'default',
	'font' => 'default'
)));

$warp->config->addPreset('preset05', 'Pink Noise', array_merge($default_preset,array(
	'style' => 'pink',
	'texture' => 'noise',
	'font' => 'default'
)));

$warp->config->addPreset('preset06', 'Red Plain', array_merge($default_preset,array(
	'style' => 'red',
	'texture' => 'default',
	'font' => 'default'
)));

$warp->config->addPreset('preset07', 'White Squaresdotted', array_merge($default_preset,array(
	'style' => 'white',
	'texture' => 'squaresdotted',
	'font' => 'default'
)));

$warp->config->addPreset('preset08', 'Beige Noise', array_merge($default_preset,array(
	'style' => 'beige',
	'texture' => 'noise',
	'font' => 'default'
)));

$warp->config->addPreset('preset09', 'Blue Plain', array_merge($default_preset,array(
	'style' => 'blue',
	'texture' => 'default',
	'font' => 'default'
)));

$warp->config->addPreset('preset10', 'Mint Plain', array_merge($default_preset,array(
	'style' => 'mint',
	'texture' => 'default',
	'font' => 'default'
)));

$warp->config->applyPreset();