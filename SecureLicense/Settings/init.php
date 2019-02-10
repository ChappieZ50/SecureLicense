<?php

/**
 *  Settings
 */
session_start();
ob_start();
ini_set("display_errors", "1");
error_reporting(E_ALL);
date_default_timezone_set('Europe/Istanbul');
setcookie("activity_time","activity_time", time() + 60);
/**
 * Defines
 */
if(!defined("ACCESS")){
	define("ACCESS",true);
}
define('SLPATH',realpath('.'));
define('SLDIR',__DIR__);
define('DEVMODE',false);
define("SECPATH",realpath(".")."/SecureLicense/");
/* Bu alanı kendi alan adınıza göre düzenlemeniz gerekiyor */
$ssl = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === 'on' ? "https" : "http";
define("URL",$ssl."://$_SERVER[HTTP_HOST]/");
define("POSTURL",$ssl."://$_SERVER[HTTP_HOST]/license-check/");
/**
 * Composer Autolaoding
 */
require SLPATH."/vendor/autoload.php";
require SLDIR."/config.php";
require SLDIR."/database.php";
/**
 * Helpers Autoloading
 */
$helpers = SLDIR."/../Helpers/*.php";
foreach(glob($helpers) as $helper){
	require $helper;
}   