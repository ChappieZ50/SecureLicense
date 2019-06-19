<?php $post_url = "http://localhost:8001/license-check/";$require = true;$data = array(
	"license_check" => true,
	"license_domain" => $_SERVER["HTTP_HOST"] == "localhost" || $_SERVER["HTTP_HOST"] == "www.localhost" ? "localhost.com" : $_SERVER["HTTP_HOST"],
	"ip" => $_SERVER["SERVER_ADDR"] == "::1" ? "localhost" : $_SERVER["SERVER_ADDR"],
	"date" => date("Y.m.d")
);$ch = curl_init($post_url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_POSTFIELDS, $data);$response = curl_exec($ch);$error = curl_error($ch);curl_close($ch);if ($error !== "") { die("Lisansta Bilinmeyen Hata Algılandı. Lütfen lisans sahibi ile iletişime geçin");}$response_data = json_decode($response);if (!isset($response_data->status) || !isset($response_data->license_activity)) {?><!DOCTYPE html>
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
        </html><?php die;} elseif ($response_data->license_activity === false) {?>  <!DOCTYPE html>
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
    </html><?php die;} elseif ($response_data->status === false) {?><!DOCTYPE html>
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
        </html><?php die; }