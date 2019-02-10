<?php
if(post("submit") && post("name") && post("last_name") && post("site_name") ){
	$name = post("name");
	$last_name = post("last_name");
	$site_name = post("site_name");
	$image = $_FILES["image"];
	$profile = new SecureLicense\Classes\Profile();
	$get_profile = $profile->get_profile();
	if(empty($get_profile)){
		$msg = $profile->insert_profile($name,$last_name,$site_name,empty($image["name"]) ? null : $image);
		header("Refresh:1.5");
	}else{
		$msg = $profile->update_profile($name,$last_name,$site_name,empty($image["name"]) ? null : $image);
		header("Refresh:1.5");
	}
}
$profile = new SecureLicense\Classes\Profile();
$get_profile = $profile->get_profile();
require view("license-user");
