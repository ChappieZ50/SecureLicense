<?php
if(post("license_check") && post("license_domain")){
	$url = post("license_domain");
	$explode_url = explode(".", $url);
	if($explode_url[0] == "https://www"){
		array_shift($explode_url);
	}elseif($explode_url[0] == "http://www"){
		array_shift($explode_url);
	}elseif($explode_url[0] == "www"){
		array_shift($explode_url);
	}
	$license_check = new SecureLicense\Classes\LicenseCheck();
	$license = $license_check->license_check($explode_url,post("ip"),post("date"));
	echo json_encode($license);
}else{
	header("Location:".URL);
}