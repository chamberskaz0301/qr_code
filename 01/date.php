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

    <?php

      session_start();

      $html =      array();
      $_SESSION =  array();
      require_once('./htmlentities.php');





    ?>
    

    <form action="pdf.php" method="post">
        <p>
           氏名:<?php echo $_SESSION['name']; ?> 
        </p>
        
        <p>
           しめい:<?php echo $_SESSION['name_jp']; ?> 
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