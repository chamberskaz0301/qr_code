<?php
 echo $_GET['data']
?> 

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRコード作成</title>
</head>
<body>
    <p>QRテスト</p>
    <form method="GET" action="result.php">
        <input type="text" name="data">
        <input type="text" name="data">

        <input type="submit" value="QRコードを表示する">
    </form>
</body>
</html>