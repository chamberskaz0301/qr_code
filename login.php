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

            <?php
            require_once("./DBAccess.php");

            session_start();


            $mydb = new DBAccess();
            $ret = $mydb->select("SELECT id, name, password from hospital");
            foreach($ret as $data){}
            
            $_SESSION['name'] = $_POST['name'];

            if(!isset($_POST['check'])) header('location: clinic.php');

            if($_POST['name'] != $data['name'] || password_verify($_POST['password'] , $data['password'])!= true){
                echo 'ユーザー名・パスワードのどちらかが間違えています。';
                $link = '<a href="clinic.php">戻る</a>';

            }else{
                    echo '成功';
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['name'] = $data['name'];
                    header('Location:./clinic_home.php');
                }

                echo $link;
            ?>

        </div>
    </body>
</html>