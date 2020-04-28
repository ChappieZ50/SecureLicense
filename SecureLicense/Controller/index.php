<?php
$license = new SecureLicense\Classes\GetLicenses();
$licenses = $license->get_licenses();
$notice_licenses = new SecureLicense\Classes\NoticeLicense();
$notice_total_licenses = $notice_licenses->get_notice_license_count();
$expired_licenses = new \SecureLicense\Classes\ExpiredLicenses();
$expired_total_licenses = $expired_licenses->get_total_expired_licenses();
if(get("delete") && is_numeric(get("delete"))){
	$deleteLicense = new SecureLicense\Classes\DeleteLicense();
	$delete = $deleteLicense->delete_license(get("delete"));
}
require view("index");