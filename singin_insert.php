<?php

    require_once("./DBAccess.php");

    $mydb = new DBAccess();

    $params = [$_POST["username"], password_hash($_POST['password'], PASSWORD_DEFAULT)];
    $result = $mydb->execute("INSERT INTO hospital (name, password ) VALUES(?, ?)", $params);

    header('Location:./clinic.php');

