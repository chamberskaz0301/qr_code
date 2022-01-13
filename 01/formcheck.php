<?php
session_start();
// $dataには検証したいデータの配列が入る想定（POSTの値等）
$data = [
    'name' => $_POST['name'],
    'kana' => $_POST['name_jp'],
    'age' => $_POST['age'],
    'gender' => $_POST['gender'],
    'phone' => $_POST['phone'],
    'condition' => $_POST['condition'],
    'address' => $_POST['address'],
    'allergy' => $_POST['allergy'],
];

// ライブラリ読み込み
require_once('./vendor/autoload.php');


// メッセージの日本語化
Valitron\Validator::lang('ja');

// 検証する値を引数にインスタンスを生成
$validation = new Valitron\Validator($data);

// 項目名を設定
$validation->labels([
    'name' => '名前',
    'kana' => 'フリガナ',
    'age' => '年齢',
    'gender' => '性別',
    'phone' => '電話番号',
    'address' => '住所',
    'condition' => '症状',
    'allergy' => 'アレルギー',
]);

// バリデーションルール
$validation->rule('required', ['name', 'kana', 'age','gender','phone','address','condition','allergy'])
    ->message('{field}は必須項目です。.<br>');

$validation->rule('lengthMax', ['name', 'kana'], 50)
    ->message('入力可能な文字数は50字までです。');

$validation->rule('integer', 'age')
    ->message('整数を入力してください');

$validation->rule('regex', 'kana', '/^[ 　ァ-ヴー]+$/u')
    ->message('カタカナで入力してください。');

$validation->rule("regex", "phone", "/\A0[0-9]{9,10}\z/")->message('※{field}を正しく入力してください。');


// バリデーションの実行
if(!$validation->validate()) {
    print_r($validation->errors()); // エラー
}else{
    header('Location:./date.php');
}

// エラー内容の入った配列
//var_dump($validation->errors());

?>

