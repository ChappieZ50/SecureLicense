<?php

function controller($controllerName){
    return SECPATH."Controller/".strtolower($controllerName.".php");
}