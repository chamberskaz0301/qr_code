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

require_once("./DBAccess.php");
session_start();

  $chk_condition = $_SESSION['condition'];
  $condition= implode(",", $chk_condition );

  $chk_treat = $_SESSION['treat'];
  $treat= implode(",", $chk_treat );




  $mydb = new DBAccess();

  $params = [$_SESSION["name"], $_SESSION["kana"], $_SESSION["age"], $_SESSION["gender"], $_SESSION["phone"], $condition, $treat, $_SESSION["allergy"]];
  $result = $mydb->execute("INSERT INTO png (name, kana, age, sex, phone, condition_ch, treat_ch,allergy ) VALUES(?, ?, ?, ?, ? ,? ,? ,?)", $params);
  $ret = $mydb->select("SELECT id, name, kana, age, sex, phone, condition_ch, treat_ch,allergy from png");
  foreach($ret as $data){}
  $id = $data['id'];


  header("Location:./pdf.php?id=$id");


?>

</body>
</html>