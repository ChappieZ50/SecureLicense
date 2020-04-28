<?php
if(!defined("ACCESS")){
    die("You can not connect directly");
}
try{
    $sldb = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,DB_USER,DB_PASSWORD);
}catch(PDOException $err){
    die($err->getMessage());
}
