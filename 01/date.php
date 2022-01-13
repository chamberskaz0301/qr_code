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
$_SESSION['condition']['fever'] = htmlspecialchars($_POST['condition']['fever']);
$_SESSION['condition']['throat'] = htmlspecialchars($_POST['condition']['throat']);
$_SESSION['condition']['cough'] = htmlspecialchars($_POST['condition']['cough']);
$_SESSION['condition']['spit'] = htmlspecialchars($_POST['condition']['spit']);
$_SESSION['allergy'] = htmlspecialchars($_POST['allergy']);

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
    //header("location: form.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問診票</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <h1>内科問診票</h1>

    <h2>以下の内容でよろしければ再度、送信ボタンを押して下しさい。</h2>

    <!-- <?php

      $html =      array();
      $_SESSION =  array();


      if(isset($_POST['confirm'])){
         //POSTデータをSESSIONに格納
          if(isset($_POST['name']) && $_POST['name'] != '')
          $_SESSION['name'] = $_POST['name'];
          else
          $_SESSION['name'] = '';

          if(isset($_POST['kana']) && $_POST['kana'] != '')
          $_SESSION['kana'] = $_POST['kana'];
          else
          $_SESSION['kana'] = '';
      
          if(isset($_POST['age']) && $_POST['age'] != '')
          $_SESSION['age'] = $_POST['age'];
          else
          $_SESSION['age'] = '';
            
          if(isset($_POST['gender']) && $_POST['gender'] != '')
          $_SESSION['gender'] = $_POST['gender'];
          else
          $_SESSION['gender'] = '';
            
          if(isset($_POST['phone']) && $_POST['phone'] != '')
          $_SESSION['phone'] = $_POST['phone'];
          else
          $_SESSION['phone'] = '';
            
          if(isset($_POST['address']) && $_POST['address'] != '')
          $_SESSION['address'] = $_POST['address'];
          else
          $_SESSION['address'] = '';
      
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
      
      
          if(isset($_POST['treat']['hbp']) && $_POST['treat']['hbp'] != '')
          $_SESSION['treat']['hbp'] = $_POST['treat']['hbp'];
          else
          $_SESSION['treat']['hbp'] = '';
      
      
          if(isset($_POST['treat']['diabetic']) && $_POST['treat']['diabetic'] != '')
          $_SESSION['treat']['diabetic'] = $_POST['treat']['diabetic'];
          else
          $_SESSION['treat']['diabetic'] = '';
      
      
          if(isset($_POST['treat']['asthma']) && $_POST['treat']['asthma'] != '')
          $_SESSION['treat']['asthma'] = $_POST['treat']['asthma'];
          else
          $_SESSION['treat']['asthma'] = '';
      
          if(isset($_POST['allergy']) && $_POST['allergy'] != '')
          $_SESSION['allergy'] = $_POST['allergy'];
          else
          $_SESSION['allergy'] = '';

         }else{
            ?>
            確認ボタンを押して下さい。<br/>
            <a href="phpsample-form-session.php">入力へ</a>
            </div>
            <hr/>
            </body>
            </html>
            <?php
            exit;
        }

    ?>
     -->

    <form action="pdf.php" method="post">
        <p>
           氏名:<?php echo $name; ?> 
        </p>
        
        <p>
           しめい:<?php echo $_SESSION['kana']; ?> 
        </p>
        
        <p>
           生年月日:<?php echo $_SESSION['age']; ?> 
        </p>        
        <p>
           性別:<?php echo $_SESSION['gender']; ?> 
        </p>
                
        <p>
           電話番号:<?php echo $_SESSION['phone']; ?> 
        </p>
        
                
        <p>
           住所:<?php echo $_SESSION['address']; ?> 
        </p>



        <p>どのような状況ですか？<br>
        <?php $chk_condition = filter_input(INPUT_POST, 'condition', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            if (!empty($chk_condition)) {
            foreach($chk_condition as $key => $val){
               echo $val."<br />";
            }
            } ?> 
        </p>

        <!-- はい、いいえの分岐処理 -->
        <p>現在治療中の病気はありますか？<br>
        <?php $chk_treat = filter_input(INPUT_POST, 'treat', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            if (!empty($chk_treat)) {
            foreach($chk_treat as $key => $val){
               echo $val."<br />";
            }
            } ?>         </p>


        <p>アレルギー体質ですか？<br>        
        <?php echo $_SESSION['allergy']; ?> 

        </p>
        

        <input type="submit" value="PDF化する">

        

    </form>

    <form action="form.php" method="POST">
      <input type="submit" name="back" value="-　戻る　-">
   </form>

    
</body>
</html>