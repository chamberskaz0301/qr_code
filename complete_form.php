<?php
    require_once('./lib/tcpdf/tcpdf.php');

    session_start();



    $name = $_SESSION['name'];
    $kana = $_SESSION['kana'];
    $age = $_SESSION['age'];
    $gender = $_SESSION['gender'];
    $phone = $_SESSION['phone'];
    $conditions = $_SESSION['condition'];
    $treats = $_SESSION['treat'];
    $allergy = $_SESSION['allergy'];

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
                <label for="name">氏名 :<?php echo $_SESSION["name"]; ?></label>
               <p></p>
            </div>
            <div>
                <label for="kana">しめい:<?php echo $_SESSION["kana"]; ?></label>
                <p></p>
            </div>
            <div>
                <label for="age">年齢:<?php echo $_SESSION["age"]; ?></label>
                <p></p>
            </div>
            <div>
                <label for="gender">性別:<?php echo $_SESSION["gender"]; ?></label><br>
                <p></p>
            </div>
            <div>
                <label for="phone">携帯番号:<?php echo $_SESSION["phone"]; ?></label><br>
                <p></p>
            </div>
            <div>
                <label for="condition">どのような症状ですか？</label><br>
                <p>

                <?php $chk_condition = $_SESSION['condition'];
                    if (!empty($chk_condition)) {
                    foreach($chk_condition as $key => $val){
                    echo $val."<br />";
                    }
                } ?> 
                    
            </p>
            </div>
            <div>
                <label for="condition">現在治療中の病気はありますか？</label><br>
                <p> 
                <?php $chk_treat =$_SESSION['treat'];
                    if (!empty($chk_treat)) {
                    foreach($chk_treat as $key => $val){
                        echo $val."<br />";
                    }
                } ?> 
            </div>
            <div>
                <label for="allergy">アレルギー体質ですか？</label><br>
                <p><?php echo $_SESSION["allergy"]; ?></p>
            </div>

        <!-- リダイレクト先 -->
        <?php
        //header('Location: ./QR.php');
        ?>
        </body>


    </div>
</body>
</html>