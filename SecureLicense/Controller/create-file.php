<?php
$notice_license  = <<<EOD
<!DOCTYPE html>
        <html lang="tr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Lisanssız Kullanım!</title>
        </head>
        <body style="background:#222222;">
            <div style="text-align:center;">
                <h1 style="color:red;">Lisanssız Kullanım</h1>
                <p style="color:white">
                    Lisanssız kullanım algılandı ve lisans sahibine iletildi.
                </p>
            </div>
        </body>
        </html>
EOD;
$expired_license = <<<EOD
  <!DOCTYPE html>
    <html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Lisans Süresi Doldu</title>
    </head>
    <body style="background:#222222;">
        <div style="text-align:center;">
            <h1 style="color:red;">Lisans Süreniz Doldu</h1>
            <p style="color:white">
                Lisans süreniz dolmuştur. Lisans sahibi ile iletişime geçerek lisansınızı yenileyebilirsiniz.
            </p>
        </div>
    </body>
    </html>
EOD;
$content         = array();
$content[]       = '<?php';
$content[]       = ' $post_url = "' . POSTURL . '";';
$content[]       = '$require = true;';
$content[]       = '$data = array(
	"license_check" => true,
	"license_domain" => $_SERVER["HTTP_HOST"] == "localhost" || $_SERVER["HTTP_HOST"] == "www.localhost" ? "localhost.com" : $_SERVER["HTTP_HOST"],
	"ip" => $_SERVER["SERVER_ADDR"] == "::1" ? "localhost" : $_SERVER["SERVER_ADDR"],
	"date" => date("Y.m.d")
);';
$content[]       = '$ch = curl_init($post_url);';
$content[]       = 'curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);';
$content[]       = 'curl_setopt($ch, CURLOPT_POSTFIELDS, $data);';
$content[]       = '$response = curl_exec($ch);';
$content[]       = '$error = curl_error($ch);';
$content[]       = 'curl_close($ch);';
$content[]       = 'if ($error !== "") {';
$content[]       = ' die("Lisansta Bilinmeyen Hata Algılandı. Lütfen lisans sahibi ile iletişime geçin");';
$content[]       = '}';
$content[]       = '$response_data = json_decode($response);';
$content[]       = 'if (!isset($response_data->status) || !isset($response_data->license_activity)) {';
$content[]       = '?>';
$content[]       = $notice_license;
$content[]       = '<?php';
$content[]       = ' die;';
$content[]       = '} elseif ($response_data->license_activity === false) {';
$content[]       = '?>';
$content[]       = $expired_license;
$content[]       = '<?php';
$content[]       = ' die;';
$content[]       = '} elseif ($response_data->status === false) {';
$content[]       = '?>';
$content[]       = $notice_license;
$content[]       = '<?php';
$content[]       = ' die;';
$content[]       = ' }';
if(!file_exists(controller("license"))){
	touch(controller("license"));
}
file_put_contents( controller("license"), $content );