<!-- サンプルコード -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<meta name="robots" content="index">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
<title>SESSIONフォーム</title>
</head>
<body>

<?php
//セッション開始
session_start();
//変数初期化
$html =      array();
$cln =       array();
$_SESSION =  array();
$strError =  '';


//確認ボタンが押されていれば
if(isset($_POST['confirm'])){
	//POSTデータをSESSIONに格納
    if(isset($_POST['name']) && $_POST['name'] != '')
    $_SESSION['name'] = $_POST['name'];
    else
    $_SESSION['name'] = '';

    if(isset($_POST['hoby']['reading']) && $_POST['hoby']['reading'] != '')
    $_SESSION['hoby']['reading'] = $_POST['hoby']['reading'];
    else
    $_SESSION['hoby']['reading'] = '';

    if(isset($_POST['hoby']['appreciate']) && $_POST['hoby']['appreciate'] != '')
    $_SESSION['hoby']['appreciate'] = $_POST['hoby']['appreciate'];
    else
    $_SESSION['hoby']['appreciate'] = '';

    if(isset($_POST['hoby']['trip']) && $_POST['hoby']['trip'] != '')
    $_SESSION['hoby']['trip'] = $_POST['hoby']['trip'];
    else
    $_SESSION['hoby']['trip'] = '';

    if(isset($_POST['maintext']) && $_POST['maintext'] != '')
    $_SESSION['maintext'] = $_POST['maintext'];
    else
    $_SESSION['maintext'] = '';

    //名前 フィルタリング 30文字以内
    if(isset($_SESSION['name']) && $_SESSION['name'] != ''){
        $cln['name'] = $_SESSION['name'];
        //マルチバイト文字列を含めた文字数
        if(mb_strlen($cln['name']) <= 30){
            //htmlentities()でHTMLコードをエスケープします。
            $html['name'] = htmlentities($cln['name'], ENT_QUOTES, 'UTF-8');
        }else{
            $strError .= "名前を30文字以内にして下さい。<br/>\n";
            $html['name'] = '';
        }
    }else{
        $html['name'] = '';
    }//end

    //選択読書 フィルタリング
    if(isset($_SESSION['hoby']['reading']) && $_SESSION['hoby']['reading'] != ''){
        $cln['hoby']['reading'] = $_SESSION['hoby']['reading'];
        //値のチェック
        if($cln['hoby']['reading'] === 'reading'){
            //htmlentities()でHTMLコードをエスケープします。
            $html['hoby']['reading'] = $cln['hoby']['reading'];
        }else{
            $strError .= "読書の選択肢が不正です。<br/>\n";
            $html['hoby']['reading'] = '';
        }
    }else{
        $html['hoby']['reading'] = '';
    }//end

    //選択鑑賞 フィルタリング
    if(isset($_SESSION['hoby']['appreciate']) && $_SESSION['hoby']['appreciate'] != ''){
        $cln['hoby']['appreciate'] = $_SESSION['hoby']['appreciate'];
        //値のチェック
        if($cln['hoby']['appreciate'] === 'appreciate'){
            //htmlentities()でHTMLコードをエスケープします。
            $html['hoby']['appreciate'] = $cln['hoby']['appreciate'];
        }else{
            $strError .= "鑑賞の選択肢が不正です。<br/>\n";
            $html['hoby']['appreciate'] = '';
        }
    }else{
        $html['hoby']['appreciate'] = '';
    }//end

    //選択旅行 フィルタリング
    if(isset($_SESSION['hoby']['trip']) && $_SESSION['hoby']['trip'] != ''){
        $cln['hoby']['trip'] = $_SESSION['hoby']['trip'];
        //値のチェック
        if($cln['hoby']['trip'] === 'trip'){
            //htmlentities()でHTMLコードをエスケープします。
            $html['hoby']['trip'] = $cln['hoby']['trip'];
        }else{
            $strError .= "旅行の選択肢が不正です。<br/>\n";
            $html['hoby']['trip'] = '';
        }
    }else{
        $html['hoby']['trip'] = '';
    }//end

    //お問合せ内容 フィルタリング 300文字以内
    if(isset($_SESSION['maintext']) && $_SESSION['maintext'] != ''){
        $cln['maintext'] = $_SESSION['maintext'];
        //マルチバイト文字列を含めた文字数
        if(mb_strlen($cln['maintext']) <= 300){
            //htmlentities()でHTMLコードをエスケープします。
            $html['maintext'] = htmlentities($cln['maintext'], ENT_QUOTES, 'UTF-8');
        }else{
            $strError .= "お問合せ内容を300文字以内にして下さい。<br/>\n";
            $html['maintext'] = '';
        }
    }else{
        $html['maintext'] = '';
    }//end

    //フィルタリングでエラーがあれば
    if($strError != ''){
        echo $strError."<br/>\n";
        ?>

        <form action="phpsample-form-session.php" method="POST">
        <input type="submit" name="back" value="-　戻る　-">
        </form>

        </div>
        <hr/>
        </body>
        </html>
        <?php
        exit;
    }

//確認ボタンが押されていなければ
}else{
    ?>
    確認ボタンを押して下さい。<br/>
    <a href="phpsample-form-session.php">入力へ</a>
    </div>
    <hr/>
    </body>
    </html>
    <?php
    exit;
}
?>

<h3>2確認</h3>

<table border="1">

<tr>
<td>名前</td>
<td><?php echo $html['name']; ?></td>
</tr>

<tr>
<td>趣味</td>
<td>
<?php if($html['hoby']['reading'] == 'reading') echo '読書<br/>'; ?>
<?php if($html['hoby']['appreciate'] == 'appreciate') echo '完了<br/>'; ?>
<?php if($html['hoby']['trip'] == 'trip') echo '旅行<br/>'; ?>
</td>
</tr>

<tr>
<td>お問合せ内容</td>
<td><?php echo nl2br($html['maintext']); ?></td>
</tr>

</table>

<form action="phpsample-form-session.php" method="POST">
<input type="submit" name="back" value="-　戻る　-">
</form>

<br/>

<form action="phpsample-form-session3.php" method="POST">
<input type="submit" name="comp" value="-　完了へ　-">
</form>

</body>
</html>