<?php

function route($index)
{
    global $route;
    return isset($route[$index]) ? $route[$index] : false;
}

function active_sidebar_item($index, $pageName, $default = '')
{
    global $route;
    if ($route[$index] == $pageName) {
        echo empty($default) ? "sidebar_active_item" : $default;
    } else {
        return false;
    }
}

function get_url($url = '')
{
    return empty($url) ? URL.$url : URL.$url."/";
}