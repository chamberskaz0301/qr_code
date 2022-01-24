<?php

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<img src="https://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=localhost/qr/complete_form.php" alt="QRコード"/>

<?php $i <img src="https://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=localhost/qr/complete_form.php" />;?>
<!-- リダイレクト先 -->
<?php
 //header('Location: ./pdf.php');
 ?>
</body>
</html>