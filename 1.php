<?php
require_once( './vendor/autoload.php' );
require_once('./htmlentities.php');


Valitron\Validator::lang('ja');
session_start();
// Valitronクラスを実行
$v = new Valitron\Validator($_POST);
// 入力必須の項目が記入されているか確認
// 入力項目のうち備考のみ任意項目にしてみる
$v->rule('required', 'name')->message('{field}を入力してください');
// 項目名を指定
$v->labels([
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
$v->rule('required', ['name', 'kana', 'age','gender','phone','address','condition','allergy'])
    ->message('{field}は必須項目です。.<br>');

$v->rule('lengthMax', ['name', 'kana'], 50)
    ->message('入力可能な文字数は50字までです。');

$v->rule('integer', 'age')
    ->message('整数を入力してください');

$v->rule('regex', 'kana', '/^[ 　ァ-ヴー]+$/u')
    ->message('カタカナで入力してください。');

$v->rule("regex", "phone", "/\A0[0-9]{9,10}\z/")->message('※{field}を正しく入力してください。');


// バリデーションを実行
if($v->validate()) {
    // 値の受け取り

    require_once('./session.php');

} else {
    $errors = [];
    foreach ($v->errors() as $error) {
        foreach ($error as $value) {
            //$errors[] =  $value;
            var_dump($value);
        }

        
    }
    
    //print_r($v->errors()); // エラー
    //$_SESSION['errors'] = $errors;
}

?>
<form action="form.php">
    <input type="submit" value="戻る">
</form>