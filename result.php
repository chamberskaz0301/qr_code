<?php
   
    require_once "phpqrcode/qrlib.php";

    // URLを定数に設定
    $url = 'create.php?data='.$_GET['data'];

    echo $_GET['data']

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR</title>
</head>
<body>
<h2>QRコード</h2>

    <?php $png = "png/";?>
    <?php $image = $_GET["data"] ;?>
    <?php $file = ".png" ;?>

    <?php $images = $png.$image.$file;?>

    <!-- <?php echo "<img src= $images />";?> -->
    <img src="<?php echo $url ?>" />
    
    <br>
    <a href="index.php">戻る</a>
</body>
</html> 

