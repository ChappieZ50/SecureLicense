<?php
require controller("create-file");

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="license.php"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize(controller("license"))); //Absolute URL
ob_clean();
flush();
readfile(controller("license")); //Absolute URL
exit();