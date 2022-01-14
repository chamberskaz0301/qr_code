<?php
    require_once('./lib/tcpdf/tcpdf.php');

    session_start();

    $_SESSION['name']= $_POST["name"];
    $_SESSION['kana']= $_POST["kana"];
    $_SESSION['age']= $_POST["age"];
    $_SESSION['gender']= $_POST["gender"];
    $_SESSION['phone']= $_POST["phone"];
    $_SESSION['condition']= $_POST["condition"];
    $_SESSION['treat']= $_POST["treat"];
    $_SESSION['allergy']= $_POST["allergy"];

    $name = $_SESSION['name'];
    $kana = $_SESSION['kana'];
    $age = $_SESSION['age'];
    $gender = $_SESSION['gender'];
    $phone = $_SESSION['phone'];
    $conditions = $_SESSION['condition'];
    $treats = $_SESSION['treat'];
    $allergy = $_SESSION['allergy'];

    var_dump($name);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>内科問診票 確認画面</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div>
        <h1>お問い合わせフォーム</h1>
        <p>以下の内容でよろしければ「送信する」をクリックしてください。<br>
            内容を変更する場合は「戻る」をクリックして入力画面にお戻りください。</p>
        <form method="post" action="pdf.php">
            <div>
                <label for="name">氏名</label>
                <p><?php echo $_POST["name"]; ?></p>
            </div>
            <div>
                <label for="kana">しめい</label>
                <p><?php echo $_POST["kana"]; ?></p>
            </div>
            <div>
                <label for="age">年齢</label>
                <p><?php echo $_POST["age"]; ?></p>
            </div>
            <div>
                <label for="gender">性別</label><br>
                <p><?php echo $_POST["gender"]; ?></p>
            </div>
            <div>
                <label for="phone">携帯番号</label><br>
                <p><?php echo $_POST["phone"]; ?></p>
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
                <p><?php echo $_POST["allergy"]; ?></p>
            </div>
            <button id="button" class="send" type="submit" name="send">PDF化する</button>

        </form>
        <form action="form.php" method="get">
            <button type="button" onclick=history.back()>戻る</button>
        </form>

    </div>
</body>
</html>