<?php

require_once "phpqrcode/qrlib.php";

$png = "png/";
$image = $_GET["data"] ;
$file = ".png" ;

$images = $png.$image.$file;

// 画像の保存場所
$filepath = $images;

// QRコードに入れるテキスト
$contents = $_GET['data'];

// QRコード画像を出力
QRcode::png($contents, $filepath, QR_ECLEVEL_M, 6);;

//このファイルを画像ファイルとして扱う宣言
header('Content-Type: image/png');
readfile("$images");


?>


