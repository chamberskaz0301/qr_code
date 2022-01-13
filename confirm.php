<?php
require_once( './vendor/autoload.php' );
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
?>
<!DOCTYPE>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>内科問診票 確認画面</title>
    <link rel="stylesheet" href="sample.css">
</head>
<body>
    <div>
        <h1>お問い合わせフォーム</h1>
        <p>以下の内容でよろしければ「送信する」をクリックしてください。<br>
            内容を変更する場合は「戻る」をクリックして入力画面にお戻りください。</p>
        <form method="post" action="pdf.php">
            <div>
                <label for="name">氏名</label>
                <p><?php echo $name; ?></p>
            </div>
            <div>
                <label for="kana">しめい</label>
                <p><?php echo $kana; ?></p>
            </div>
            <div>
                <label for="age">年齢</label>
                <p><?php echo $age; ?></p>
            </div>
            <div>
                <label for="gender">性別</label><br>
                <p><?php echo $gender; ?></p>
            </div>
            <div>
                <label for="phone">携帯番号</label><br>
                <p><?php echo $phone; ?></p>
            </div>
            <div>
                <label for="condition">どのような症状ですか？</label><br>
                <p>

                <?php $chk_condition = filter_input(INPUT_POST, 'condition', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            if (!empty($chk_condition)) {
            foreach($chk_condition as $key => $val){
               echo $val."<br />";
            }
            } ?> 
                    
            </p>
            </div>
            <div>
                <label for="condition">現在治療中の病気はありますか？</label><br>
                <p>  <?php $chk_treat = filter_input(INPUT_POST, 'treat', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            if (!empty($chk_treat)) {
            foreach($chk_treat as $key => $val){
               echo $val."<br />";
            }
            } ?>         </p></p>
            </div>
            <div>
                <label for="allergy">アレルギー体質ですか？</label><br>
                <p><?php echo $allergy; ?></p>
            </div>
            <input type="submit" value="PDF化する">

        </form>
        <form action="form.php" method="get">
            <button type="submit">戻る</button>
        </form>

    </div>
</body>
</html>