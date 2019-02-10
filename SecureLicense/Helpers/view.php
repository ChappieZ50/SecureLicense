<?php

function view($viewName){
    return SECPATH."View/".strtolower($viewName.".php");
}
function get_header(){
    require SECPATH."View/static/header.php";
}
function get_footer(){
    require SECPATH."View/static/footer.php";
}
function get_sidebar(){
    require SECPATH."View/static/sidebar.php";
}