<?php
$license = new SecureLicense\Classes\GetLicenses();
$licenses = $license->get_licenses();
if(get("delete") && is_numeric(get("delete"))){
	$deleteLicense = new SecureLicense\Classes\DeleteLicense();
	$delete = $deleteLicense->delete_license(get("delete"));
}
require view("licenses");
