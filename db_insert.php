<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>内科問診票QR</title>
</head>
<body>
    <?php
    $i =' <img src="https://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=localhost/qr/complete_form.php" alt="QRコード"/>';
    ?>

<?php

require_once("./DBAccess.php");
session_start();

$chk_condition = $_SESSION['condition'];
$condition= implode(",", $chk_condition );
echo $condition;

$chk_treat = $_SESSION['treat'];
$treat= implode(",", $chk_treat );
echo $treat;



try{
  $mydb = new PDO($host, $user, $pass);
  $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $mydb->beginTransaction();

  $stmt = $mydb->prepare('INSERT INTO png (name, kana, age, sex, phone, condition_ch, treat_ch,allergy ) VALUES (:name, :kana, :age, :gender, :phone, :condition, :treat, :allergy)');
  
  $stmt->bindParam( ':name', $_SESSION["name"], PDO::PARAM_STR);
  $stmt->bindParam( ':kana', $_SESSION["kana"], PDO::PARAM_STR);
  $stmt->bindParam( ':age', $_SESSION["age"], PDO::PARAM_STR);
  $stmt->bindParam( ':gender', $_SESSION["gender"], PDO::PARAM_STR);
  $stmt->bindParam( ':phone', $_SESSION["phone"], PDO::PARAM_STR);
  $stmt->bindParam( ':condition',$condition , PDO::PARAM_STR);
  $stmt->bindParam( ':treat', $treat, PDO::PARAM_STR);
  $stmt->bindParam( ':allergy', $_SESSION["allergy"], PDO::PARAM_STR);


  $res = $stmt->execute();

  if($res){
      $mydb->commit();
      header('Location:./pdf.php');
  }


}catch(PDOException $e){
  echo $e->getMessage();

  $mydb->rollback();
  
}finally{
  $mydb = null;
}



?>

</body>
</html>