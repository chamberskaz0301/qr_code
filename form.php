<?php
    session_start();
    $error = "";
    $name = $_POST["name"];
    $name_jp = $_POST["name_jp"];
    $age = $_POST["age"];
    $sex = $_POST["sex"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $condition = $_POST["condition"];
    $treat = $_POST["treat"];
    $allergy = $_POST["allergy"];

    


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

    <h2>以下のフォームに情報を入力してさい</h2>

    

    <form action="date.php" method="post">
        <p>
           氏名:<input type="text" name="name"> 
        </p>
        
        <p>
           しめい:<input type="text" name="name_jp"> 
        </p>
        
        <p>
           生年月日:<input type="text" name="age" > 
        </p>

        <p>男性ですか女性ですか？<br>
            <input type="radio" name="sex" value="男"> 男
            <input type="radio" name="sex" value="女"> 女
        </p>


                
        <p>
           電話番号:<input type="text" name="phone" >
        </p>
        
                
        <p>
           住所:<input type="text" name="address"> 
        </p>


        <p>どのような状況ですか？<br>
            <input type="checkbox" name="condition[]" value="発熱" >発熱
            <input type="checkbox" name="condition[]" value="のどの痛み">のどの痛み
            <input type="checkbox" name="condition[]" value="せき">せき
            <input type="checkbox" name="condition[]" value="たん">たん
            <input type="checkbox" name="condition[]" value="せき">せき
        </p>

        <!-- はい、いいえの分岐処理 -->
        <p>現在治療中の病気はありますか？<br>
            <input type="checkbox" name="treat[]" value="なし" >なし
            <input type="checkbox" name="treat[]" value="あり">あり
            <input type="checkbox" name="treat[]" value="高血圧">高血圧
            <input type="checkbox" name="treat[]" value="糖尿病">糖尿病
            <input type="checkbox" name="treat[]" value="ぜんそく">ぜんそく
        </p>


        <p>アレルギー体質ですか？<br>
            <input type="radio" name="allergy" value="はい"> はい
            <input type="radio" name="allergy" value="いいえ"> いいえ
        </p>
        

        <input type="submit" value="送信する">

        

    </form>

    



</body>
</html>