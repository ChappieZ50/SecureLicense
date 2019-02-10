<?php

/**
 *  Settings 
 */
session_start();
ob_start();
ini_set("display_errors", "0");
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
define("URL","https://herkesicinpaylas.com/");
define("POSTURL","https://herkesicinpaylas.com/license-check/");
define("CURRENTURL",isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === 'on' ? "https" : "http" . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
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