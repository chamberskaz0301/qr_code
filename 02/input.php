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
    <link rel="stylesheet" href="css/style.css">
    <title>内科問診票 入力画面</title>
</head>
<body>
<div>
<h1>内科問診票</h1>

<?php if(isset($errors)) : ?>
    <?php foreach($errors as $value): ?>
        <?php echo $value; ?><br />
    <?php endforeach; ?>
<?php endif; ?>
    <form method="post" action="confirm.php">
    <div>
        <label for="name">氏名</label>
        <input type="text" name="name"  value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];} ?>">
    </div>

    <div>
        <label for="kana">しめい</label>
        <input type="text" name="kana" value="<?php if(isset($_SESSION['kana'])){echo $_SESSION['kana'];} ?>">
    </div>

    <div>
        <label for="age">年齢</label>
        <input type="text" name="age" value="<?php if(isset($_SESSION['age'])){echo $_SESSION['age'];}?>" >
    </div>

    <div>
        <label for="gender">性別</label>
        <input type="radio" name="gender" value="男<?php if(isset($_SESSION['gender'])){echo $_SESSION['gender'];}?>"> 男
        <input type="radio" name="gender" value="女<?php if(isset($_SESSION['gender'])){echo $_SESSION['gender'];}?>"> 女    
    </div>

<div>
    <label for="phone">携帯番号</label>
    <input type="text" name="phone" id="tel" value="<?php if(isset($_SESSION['phone'])){echo $_SESSION['phone'];}?>" >
</div>

<div>
    <label for="condition">どのような症状ですか？</label><br>
    <input type="checkbox" name="condition[]" value="発熱"<?php if(isset($_SESSION['condition'])){echo $_SESSION['condition'];}?> >発熱
    <input type="checkbox" name="condition[]" value="のどの痛み"<?php if(isset($_SESSION['condition'])){echo $_SESSION['condition'];}?> >のどの痛み
    <input type="checkbox" name="condition[]" value="せき"<?php if(isset($_SESSION['condition'])){echo $_SESSION['condition'];}?> >せき
    <input type="checkbox" name="condition[]" value="たん"<?php if(isset($_SESSION['condition'])){echo $_SESSION['condition'];}?> >たん
</div>

<div>
    <label for="address">現在治療中の病気はありますか？</label>
    <input type="checkbox" name="treat[none]" value="いいえ" id="treat1" onClick="treatflg1(this.checked);" >なし
            <input type="checkbox" name="treat[none]" value="はい"  id="treat2" onClick="treatflg2(this.checked);" >あり
            ・ありの方は下記から選んでください。<br/>
            <input type="checkbox" name="treat[hbp]" value="高血圧" id="disease1" disabled="disabled" >高血圧
            <input type="checkbox" name="treat[diabetic]" value="糖尿病" id="disease2" disabled="disabled" >糖尿病
            <input type="checkbox" name="treat[asthma]" value="ぜんそく"  id="disease3" disabled="disabled" >ぜんそく
</div>

<div>
    <label for="allergy">アレルギー体質ですか？</label>
    <input type="radio" name="allergy" value="はい"> はい
    <input type="radio" name="allergy" value="いいえ"> いいえ
</div>



    <button type="submit" name="btn_confirm">入力内容を確認する</button>
</form>
<?php session_destroy(); ?>
</div>
</body>
</html>