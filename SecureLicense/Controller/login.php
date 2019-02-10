<?php
if(isset($_SESSION["login"])){
    header("Location:".URL);
    exit;
}
if(post("submit")){
	$username = post("username");
	$password = post("password");
	$check_login = new SecureLicense\Classes\Login();
	$login = $check_login->check_login($username,$password);
}
require view("login");