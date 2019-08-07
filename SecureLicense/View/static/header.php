<?php

if(!isset($_SESSION["login"])){

    header("Location:".CURRENT."/login/");

    exit;

}

if ( ! isset( $_COOKIE["activity_time"] ) ) {

	$activity_control = new SecureLicense\Classes\LicenseActivity();

	$activity_control->license_activity();
}

?>

<!DOCTYPE html>

<html lang="tr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Secure License</title>

	<?php sl_header(); ?>

</head>

<body>

<!-- Modal -->

<div class="modal fade" id="code" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Kod</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <h5>Bu kodu kopyalayın</h5>

                <code>

                    require __DIR__."/license.php";

                    <br>

                    if(!isset($require)){

                    <br>

                    &nbsp;&nbsp;die("Lisanssız Kullanım");

                    <br>

                    }

                </code>

                <h6 class="text-danger">Kodu sitenizin bütün sayfalarına entegre edilmiş bir dosyanın en üstüne yapıştırın.</h6>

                <br>

                <p>Genellikle header.php dosyasına eklenir.</p>

                <p>İndirdiğiniz license.php dosyasını kodu entegre ettiğiniz dosyanın yanına atınız.</p>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>

            </div>

        </div>

    </div>

</div>

<?php get_sidebar(); ?>

