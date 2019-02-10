<?php
require __DIR__ . "/SecureLicense/Settings/init.php";
$route = array_values(array_filter(explode("/", $_SERVER['REQUEST_URI'])));
if (DEVMODE === true) {
    array_shift($route);
}
if(!route(0)){
    $route[0] = 'index';
}
if(!file_exists(controller(route(0)))){
    $route[0] = "index";
}
require_once controller(route(0));