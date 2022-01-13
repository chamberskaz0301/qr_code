<!-- <?php
require_once( './lib/vendor/autoload.php' );
Valitron\Validator::lang('ja');
session_start();
// Valitronクラスを実行
$v = new Valitron\Validator($_POST);
// バリエーションルール
$v->rule('required', 'name')->message('{field}を入力してください');
$v->rule('required', 'kana')->message('{field}を入力してください');
$v->rule('required', 'age')->message('{field}を入力してください');
$v->rule('required', 'gender')->message('{field}を入力してください');
$v->rule('required', 'phone')->message('{field}を入力してください');
$v->rule('required', 'condition')->message('{field}を選択してください');
$v->rule('required', 'allergy')->message('{field}を選択してください');
$v->rule('regex', 'kana', '/^[ 　ァ-ヴー]+$/u')->message('カタカナで入力してください。');
$v->rule("regex", "phone", "/\A0[0-9]{9,10}\z/")->message('※{field}を正しく入力してください。');
$v->rule('integer', 'age')->message('年齢は整数を入力してください');
// 項目名設定
$v->labels([
    'name' => '名前',
    'kana' => 'フリガナ',
    'age' => '年齢',
    'gender' => '性別',
    'phone' => '電話番号',
    'condition' => '症状',
    'allergy' => 'アレルギー',
    ]);
$_SESSION['name'] = htmlspecialchars($_POST['name']);
$_SESSION['kana'] = htmlspecialchars($_POST['kana']);
$_SESSION['age'] = htmlspecialchars($_POST['age']);
$_SESSION['gender'] = htmlspecialchars($_POST['gender']);
$_SESSION['phone'] = htmlspecialchars($_POST['phone']);
//$_SESSION['condition[]'] = htmlspecialchars($_POST['condition[]']);
$_SESSION['allergy'] = htmlspecialchars($_POST['allergy']);

      
if(isset($_POST['condition']['fever']) && $_POST['condition']['fever'] != '')
$_SESSION['condition']['fever'] = $_POST['condition']['fever'];
else
$_SESSION['condition']['fever']= '';

if(isset($_POST['condition']['throat'] ) && $_POST['condition']['throat']  != '')
$_SESSION['condition']['throat']  = $_POST['condition']['throat'] ;
else
$_SESSION['condition']['throat']  = '';


if(isset($_POST['condition']['cough'] ) && $_POST['condition']['cough']  != '')
$_SESSION['condition']['cough']  = $_POST['condition']['cough'] ;
else
$_SESSION['condition']['cough']  = '';


if(isset($_POST['condition']['spit'] ) && $_POST['condition']['spit']  != '')
$_SESSION['condition']['spit']  = $_POST['condition']['spit'] ;
else
$_SESSION['condition']['spit']  = '';

if(isset($_POST['treat']['none']) && $_POST['treat']['none'] != '')
$_SESSION['treat']['none'] = $_POST['treat']['none'];
else
$_SESSION['treat']['none'] = '';

// バリデーションを実行
if($v->validate()) {
    // 値の受け取り
    $name = $_SESSION['name'];
    $kana = $_SESSION['kana'];
    $age = $_SESSION['age'];
    $gender = $_SESSION['gender'];
    $phone = $_SESSION['phone'];
    $condition = $_SESSION['condition'];
    $allergy = $_SESSION['allergy'];
} else {
    $errors = [];
    foreach ($v->errors() as $error) {
        foreach ($error as $value) {
            $errors[] =  $value;
        }
    }
    $_SESSION['errors'] = $errors;
    header("location: ./form.php");
}
?> -->
