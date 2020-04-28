<?php
if ( post( 'submit' ) ) {
	$domain         = post( 'domain' );
	$end_date       = post( 'end_date' );
	$create_license = new SecureLicense\Classes\AddLicense();
	$insert         = $create_license->create_license( $domain, $end_date );
} elseif ( post( "update_submit" ) ) {
	$domain       = post( 'domain' );
	$end_date     = post( 'end_date' );
	$id           = get( "edit" );
	$edit_license = new \SecureLicense\Classes\UpdateLicense();
	$edit         = $edit_license->update_license( $id, $domain, $end_date );
}
if ( get( "edit" ) ) {
	$get_license = new SecureLicense\Classes\GetLicenseForID();
	$license     = $get_license->get_for_id( get( "edit" ) );
}
require view( "add-license" );
