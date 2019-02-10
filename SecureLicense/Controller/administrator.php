<?php
$admin     = new SecureLicense\Classes\Administrator();
$get_admin = $admin->get_administrator();
if ( post( "submit" ) ) {
	$update_password = true;
	$username = post( "username" );
	$password = post( "password" );
	if($password == "#password"){
		$update_password = false;
	}
	$update_admin = $admin->update_administrator($username,$password,$update_password);
}
require view( "administrator" );