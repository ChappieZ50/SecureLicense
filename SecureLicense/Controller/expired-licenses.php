<?php
$license = new SecureLicense\Classes\ExpiredLicenses();
$licenses = $license->get_expired_licenses();
if(get("delete") && is_numeric(get("delete"))){
	$deleteLicense = new SecureLicense\Classes\DeleteLicense();
	$delete = $deleteLicense->delete_license(get("delete"));
}
require view("expired-licenses");
