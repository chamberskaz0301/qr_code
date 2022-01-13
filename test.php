<?php
// 画像指定
$file_name = 'foo.png';

// base64エンコード
$data = base64_encode(file_get_contents($file_name));

// ファイル情報
$path_parts = pathinfo($file_name);

// 拡張子を小文字置換
$file_ext = strtolower($path_parts['extension']);
if ($file_ext == 'jpeg') {
    $file_ext = 'jpg';
}

// <img src="' . $src . '">
$src = 'data: ' . $file_ext . ';base64,' . $data;