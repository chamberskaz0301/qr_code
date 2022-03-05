<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問診票閲覧</title>
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

    <h1>内科問診票閲覧</h1>

    <h2>登録</h2>


    <form  action="singin_insert.php" method="post">

     <label>ユーザネーム</label>
     <input type="text" name="username">

     <label>password</label>
     <input type="password" name="password">

     <button type="submit">登録</button>

     <input type="hidden" name="check" value="check">
   </form>
        

       

</body>
</html>