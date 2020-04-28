<?php

function get_css($css){
    return CURRENT."/SecureLicense/Public/Assets/CSS/".$css.".css";
}

function get_js($js){
    return CURRENT."/SecureLicense/Public/Assets/JS/".$js.".js";
}
function sl_header(){
    require SECPATH."View/static/inc_assets/sl_header.php";
}
function sl_footer(){
    require SECPATH."View/static/inc_assets/sl_footer.php";
}
function uploads_dir(){
	return SECPATH."Public/uploads/";
}
function get_uploads_img($name){
	return CURRENT."/SecureLicense/Public/uploads/".$name;
}