<?php
session_start();
if(isset($_SESSION["errors"])){
    $errors = $_SESSION["errors"];
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問診票</title>
    <script src="./js/checkbox.js"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <?php
    require_once('./htmlentities.php');
    ?>

    <?php if(isset($errors)) : ?>
        <?php foreach($errors as $value): ?>
            <?php echo $value; ?><br />
        <?php endforeach; ?>
    <?php endif; ?>

    <h1>内科問診票</h1>

    <h2>以下のフォームに情報を入力してさい</h2>

 
  
 
 
    <form action="confirm.php" method="post">
        
   

        <p>
           氏名:<input type="text" name="name"  id="fullName", value="<?php echo  $html['name']; ?>"> 
        </p>
        
        <p>
           しめい:<input type="text" name="kana", value="<?php echo  $html['kana']; ?>"> 
        </p>
        
        <p>
           年齢:<input type="text" name="age" , value="<?php echo  $html['age']; ?>" > 
        </p>

        <p>男性ですか女性ですか？<br>
        <input type="radio" name="gender" value="男<?php if(isset($_SESSION['gender'])){echo $_SESSION['gender'];}?>"> 男
        <input type="radio" name="gender" value="女<?php if(isset($_SESSION['gender'])){echo $_SESSION['gender'];}?>"> 女    
        </p>


                
        <p>
           携帯番号:<input type="text" name="phone" id="tel" , value="<?php echo  $html['phone']; ?>" >
        </p>
       

                
        <p>
           住所:<input type="text" name="address" , value="<?php echo  $html['address']; ?>">  
        </p>


        <p>どのような症状ですか？<br>
            <input type="checkbox" name="condition[fever]" value="発熱"<?php if($html['condition']['fever'] == 'fever') echo ' checked';?> >発熱
            <input type="checkbox" name="condition[throat]" value="のどの痛み"<?php if($html['condition']['throat'] == 'throat') echo ' checked';?>>のどの痛み
            <input type="checkbox" name="condition[cough]" value="せき"<?php if($html['condition']['cough'] == 'cough') echo ' checked';?>>せき
            <input type="checkbox" name="condition[spit]" value="たん"<?php if($html['condition']['spit'] == 'spit') echo ' checked';?>>たん
        </p>

        <p>現在治療中の病気はありますか？<br>
            <input type="checkbox" name="treat[none]" value="いいえ"<?php if($html['treat']['none'] == 'none') echo ' checked';?> id="treat1" onClick="treatflg1(this.checked);" >なし
            <input type="checkbox" name="treat[none]" value="はい"<?php if($html['treat']['none'] == 'none') echo ' checked';?>  id="treat2" onClick="treatflg2(this.checked);" >あり
            ・ありの方は下記から選んでください。<br/>
            <input type="checkbox" name="treat[hbp]" value="高血圧"<?php if($html['treat']['hbp'] == 'hbp') echo ' checked';?> id="disease1" disabled="disabled" >高血圧
            <input type="checkbox" name="treat[diabetic]" value="糖尿病"<?php if($html['treat']['diabetic'] == 'diabetic') echo ' checked';?> id="disease2" disabled="disabled" >糖尿病
            <input type="checkbox" name="treat[asthma]" value="ぜんそく"<?php if($html['treat']['asthma'] == 'asthma') echo ' checked';?>  id="disease3" disabled="disabled" >ぜんそく
        </p>


        <p>アレルギー体質ですか？<br>
            <input type="radio" name="allergy" value="はい"> はい
            <input type="radio" name="allergy" value="いいえ"> いいえ
        </p>
        

        <input type="submit" name="confirm" value="送信する" onclick="validate()">
      


    </form>
<!-- 
    phpでのバリデーション処理終了後再度再開
    <script src="main.js"></script> -->



</body>
</html>