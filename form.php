<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問診票</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <?php
    require_once('./lib/htmlentities.php');
    ?>

    <?php if(isset($errors)) : ?>
        <?php foreach($errors as $value): ?>
            <?php echo $value; ?><br />
        <?php endforeach; ?>
    <?php endif; ?>

    <h1>内科問診票</h1>

    <h2>以下のフォームに情報を入力してさい</h2>

 
  
 
 
    <form action="confirm.php" method="post" class="fetchForm">
        

        <p>
           氏名:<input type="text" name="name" class="name"  value="<?php echo  $html['name']; ?>" placeholder="例：ハル　太郎" required >  
        </p>
        
        <p>
           しめい:<input type="text" name="kana" class="kana" value="<?php echo  $html['kana']; ?>"placeholder="ひらがなのみ" required pattern = "^[ぁ-ん]+$" >  
        </p>
        
        <p>
           年齢:<input type="number" name="age" class="age"  value="<?php echo  $html['age']; ?>" min="0" max="100" value="25" required> 
        </p>

        <p>男性ですか女性ですか？<br>
        <label class="vertical">
            <input type="radio" name="gender" class="gender" value="男<?php if(isset($_SESSION['gender'])){echo $_SESSION['gender'];}?>" required> 男
        </label>
        <label class="vertical">
            <input type="radio" name="gender" class="gender" value="女<?php if(isset($_SESSION['gender'])){echo $_SESSION['gender'];}?>"> 女    
        </label>
        </p>


                
        <p>
           携帯番号:<input type="text" name="phone" class="phone"  id="tel" value="<?php echo  $html['phone']; ?>"  required  maxlength="11" >
        </p>
       

            
        <p>どのような症状ですか？<br>

        <label class="vertical">
            <input type="checkbox" class="condition" name="condition[fever]" value="発熱"<?php if($html['condition']['fever'] == 'fever') echo ' checked';?> checeee2ked  >発熱
        </label>
        <label class="vertical">
            <input type="checkbox"  class="condition"name="condition[throat]" value="のどの痛み"<?php if($html['condition']['throat'] == 'throat') echo ' checked';?>>のどの痛み
        </label>
        <label class="vertical">
            <input type="checkbox"  class="condition" name="condition[cough]" value="せき"<?php if($html['condition']['cough'] == 'cough') echo ' checked';?>>せき
        </label>
        <label class="vertical">
            <input type="checkbox"  class="condition" name="condition[spit]" value="たん"<?php if($html['condition']['spit'] == 'spit') echo ' checked';?>>たん
        </label>

        </p>
        

        <p>現在治療中の病気はありますか？<br>
            <input type="checkbox" name="treat[none]" value="いいえ"<?php if($html['treat']['none'] == 'none') echo ' checked';?> id="treat1" onClick="treatflg1(this.checked);"  checked>なし
            <input type="checkbox" name="treat[none]" value="はい"<?php if($html['treat']['none'] == 'none') echo ' checked';?>  id="treat2" onClick="treatflg2(this.checked);" >あり
            ・ありの方は下記から選んでください。<br/>
            <label class="vertical">
                <input type="checkbox" name="treat[hbp]" value="高血圧"<?php if($html['treat']['hbp'] == 'hbp') echo ' checked';?> id="disease1" disabled="disabled" >高血圧
            </label>
            <label class="vertical">
                <input type="checkbox" name="treat[diabetic]" value="糖尿病"<?php if($html['treat']['diabetic'] == 'diabetic') echo ' checked';?> id="disease2" disabled="disabled" >糖尿病
            </label>
            <label class="vertical">
                <input type="checkbox" name="treat[asthma]" value="ぜんそく"<?php if($html['treat']['asthma'] == 'asthma') echo ' checked';?>  id="disease3" disabled="disabled" >ぜんそく
            </label>
        </p>


        <p>アレルギー体質ですか？<br>
        <label class="vertical">
            <input type="radio" class="allergy" name="allergy" value="はい" required> はい
        </label>
        <label class="vertical">
            <input type="radio" class="allergy" name="allergy" value="いいえ"> いいえ
        </label>
        </p>
        

        <input type="submit" name="confirm" value="送信する" onclick>

    </form>

        <script src="./js/checkbox.js"></script>

</body>
</html>