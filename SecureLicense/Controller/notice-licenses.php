<?php
$license = new SecureLicense\Classes\NoticeLicense();
$licenses = $license->get_notice_license();
if(get("delete") && is_numeric(get("delete"))){
	$deleteLicense = new SecureLicense\Classes\DeleteLicense();
	$delete = $deleteLicense->delete_license(get("delete"),"sl_notice");
}
require view("notice-licenses");