
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>内科問診票検索画面 </title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div>
        <h1>内科問診票検索画面</h1>
        
        <?php
     
            session_save_path("/xampp/tmp/"); 
            session_start();

            $username = $_SESSION['name'];

            if (isset($_SESSION['id'])) {//ログインしているとき
                $msg = 'こんにちは' . htmlspecialchars($username, \ENT_QUOTES, 'UTF-8') . 'さん';
                $link = '<a href="clinic.php">ログアウト</a>';
            } else {//ログインしていない時
                $msg = 'ログインしていません';
                $link = '<a href="clinic.php">ログイン</a>';
            }
        ?>
        <h2><?php echo $msg; ?></h2>

        <h2>検索したい患者のIDを入力してください。</h2>

        

        <form  action="clinic_serch.php" method="post">

            <label for="id">ID</label>
            <input type="number" name="id" required>
            <button type="submit">検索</button>

            <input type="hidden" name="check" value="check">
        </form>
        
        <?php echo $link; ?>


        </div>
    </body>
</html>


