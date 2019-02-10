<?php
function get_success_msg($msg = ''){
    return "<div class='notice success'><p>$msg</p></div>";
}
function get_info_msg($msg = ''){
    return "<div class='notice info'><p>$msg</p></div>";
}
function get_error_msg($msg = ''){
    return "<div class='notice error'><p>$msg</p></div>";
}
function get_warring_msg($msg = ''){
    return "<div class='notice warning'><p>$msg</p></div>";
}