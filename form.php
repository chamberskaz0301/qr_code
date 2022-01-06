

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問診票</title>
    <script src="./checkbox.js"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
    session_start();

    $html = array();

    if(isset($_POST['back'])){
        //htmlentities()でHTMLコードをエスケープします。
        $html['name'] = htmlentities($_SESSION['name'], ENT_QUOTES, 'UTF-8');
        $html["name_jp"] = htmlentities($_SESSION["name_jp"], ENT_QUOTES, 'UTF-8');
        $html['age'] = htmlentities($_SESSION["age"], ENT_QUOTES, 'UTF-8');
        $html["gender"] = htmlentities($_SESSION["gender"], ENT_QUOTES, 'UTF-8');
        $html["phone"] = htmlentities($_SESSION["phone"], ENT_QUOTES, 'UTF-8');
        $html["address"] = htmlentities($_SESSION["address"], ENT_QUOTES, 'UTF-8');
        $html['condition']['fever'] = htmlentities($_SESSION["condition"]['fever'], ENT_QUOTES, 'UTF-8');
        $html['condition']['throat'] = htmlentities($_SESSION["condition"]['throat'], ENT_QUOTES, 'UTF-8');
        $html['condition']['cough'] = htmlentities($_SESSION["condition"]['cough'], ENT_QUOTES, 'UTF-8');
        $html['condition']['spit'] = htmlentities($_SESSION["condition"]['spit'], ENT_QUOTES, 'UTF-8');
        $html['treat']['none'] = htmlentities($_SESSION['treat']['none'], ENT_QUOTES, 'UTF-8');
        $html['treat']['hbp'] = htmlentities($_SESSION['treat']['hbp'], ENT_QUOTES, 'UTF-8');
        $html['treat']['diabetic'] = htmlentities($_SESSION['treat']['diabetic'], ENT_QUOTES, 'UTF-8');
        $html['treat']['asthma'] = htmlentities($_SESSION['treat']['asthma'], ENT_QUOTES, 'UTF-8');
        $html["allergy"] = htmlentities($_SESSION["allergy"], ENT_QUOTES, 'UTF-8');
    //初期値
    }else{
        //初期化
        $_SESSION =  array();
        $html['name'] =  '';
        $html['name_jp'] = '';
        $html['age'] = '';
        $html['gender'] = '';
        $html['phone'] =  '';
        $html['address'] =  '';
        $html['condition']['fever'] = '';
        $html['condition']['throat'] =  '';
        $html['condition']['cough'] = '';
        $html['condition']['spit'] =  '';
        $html['treat']['none'] = '';
        $html['treat']['hbp'] =  '';
        $html['treat']['diabetic'] =  '';
        $html['treat']['asthma'] =  '';
        $html['allergy'] =  '';
    }


    ?>

    <h1>内科問診票</h1>

    <h2>以下のフォームに情報を入力してさい</h2>

    

    <form action="date.php" method="post">
        <p>
           氏名:<input type="text" name="name" , value="<?php echo  $html['name']; ?>"> 
        </p>
        
        <p>
           しめい:<input type="text" name="name_jp", value="<?php echo  $html['name_jp']; ?>"> 
        </p>
        
        <p>
           年齢:<input type="text" name="age" , value="<?php echo  $html['age']; ?>" > 
        </p>

        <p>男性ですか女性ですか？<br>
            <input type="radio" name="gender" value="男"> 男
            <input type="radio" name="gender" value="女"> 女
        </p>


                
        <p>
           電話番号:<input type="text" name="phone" , value="<?php echo  $html['phone']; ?>" >
        </p>
        
                
        <p>
           住所:<input type="text" name="address" , value="<?php echo  $html['address']; ?>">  
        </p>


        <p>どのような状況ですか？<br>
            <input type="checkbox" name="condition[fever]" value="発熱"<?php if($html['condition']['fever'] == 'fever') echo ' checked';?> >発熱
            <input type="checkbox" name="condition[throat]" value="のどの痛み"<?php if($html['condition']['throat'] == 'throat') echo ' checked';?>>のどの痛み
            <input type="checkbox" name="condition[cough]" value="せき"<?php if($html['condition']['cough'] == 'cough') echo ' checked';?>>せき
            <input type="checkbox" name="condition[spit]" value="たん"<?php if($html['condition']['spit'] == 'spit') echo ' checked';?>>たん
        </p>

        <p>現在治療中の病気はありますか？<br>
            <input type="checkbox" name="treat[none]" value="いいえ"<?php if($html['treat']['none'] == 'none') echo ' checked';?> id="0" >なし
            ・ありの方は下記から選んでください。<br/>
            <input type="checkbox" name="treat[hbp]" value="高血圧"<?php if($html['treat']['hbp'] == 'hbp') echo ' checked';?> onclick="changeDisabled();" >高血圧
            <input type="checkbox" name="treat[diabetic]" value="糖尿病"<?php if($html['treat']['diabetic'] == 'diabetic') echo ' checked';?> onclick="changeDisabled();">糖尿病
            <input type="checkbox" name="treat[asthma]" value="ぜんそく"<?php if($html['treat']['asthma'] == 'asthma') echo ' checked';?> onclick="changeDisabled();">ぜんそく
        </p>


        <p>アレルギー体質ですか？<br>
            <input type="radio" name="allergy" value="はい"> はい
            <input type="radio" name="allergy" value="いいえ"> いいえ
        </p>
        

        <input type="submit" name="confirm" value="送信する">

        

    </form>

    



</body>
</html>