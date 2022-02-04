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
    



    <h1>内科問診票閲覧</h1>

    <h2>ログイン</h2>


    <form  action="login.php" method="post">
     <label for="id">ユーザネーム</label>
     <input type="text" name="name">
     <label for="password">password</label>
     <input type="password" name="password">
     <button type="submit">ログイン</button>
     <input type="hidden" name="check" value="check">
   </form>
        

       

</body>
</html>