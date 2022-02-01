<?php
    require_once('./lib/tcpdf/tcpdf.php');
    require_once("./DBAccess.php");

    $db = new DBAccess();
    $ret = $db->select("SELECT id, name, kana, age, sex, phone, condition_ch, treat_ch,allergy from png");
    foreach($ret as $data){

        $condition = explode(",", $data["condition_ch"]);
        $treat = explode(",", $data["treat_ch"]);
    }
    

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>内科問診票 </title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div>
        <h1>内科問診票</h1>


            <div>
                <label for="name">氏名 :<?php echo $data['name']; ?></label>
               <p></p>
            </div>
            <div>
                <label for="kana">しめい:<?php echo $data['kana']; ?></label>
                <p></p>
            </div>
            <div>
                <label for="age">年齢:<?php echo $data['age']; ?></label>
                <p></p>
            </div>
            <div>
                <label for="gender">性別:<?php echo $data['sex']; ?></label><br>
                <p></p>
            </div>
            <div>
                <label for="phone">携帯番号:<?php echo $data['phone']; ?></label><br>
                <p></p>
            </div>
            <div>
                <label for="condition">どのような症状ですか？</label><br>
                <p>

                <?php 
                    if (!empty($condition)) {
                    foreach($condition as $key => $val){
                    echo $val."<br />";
                    }
                } ?> 
                    
            </p>
            </div>
            <div>
                <label for="treat">現在治療中の病気はありますか？</label><br>
                <p> 
                <?php 
                    if (!empty($treat)) {
                    foreach($treat as $key => $val){
                        echo $val."<br />";
                    }
                } ?> 
            </div>
            <div>
                <label for="allergy">アレルギー体質ですか？<?php echo $data['allergy']; ?></label><br>
                <p></p>
            </div>




    </div>
</body>
</html>