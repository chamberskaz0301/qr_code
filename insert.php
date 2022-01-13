<?php

    session_start();

  require_once("./lib/DBAccess.php");

  try{
    $mydb = new PDO($host, $user, $pass);
    $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $mydb->beginTransaction();

    $stmt = $mydb->prepare('INSERT INTO png (name, image_type, image) VALUES (:name, :pdf, :image)');
    
    $stmt->bindParam( ':name', $_SESSION["name"], PDO::PARAM_STR);
    $stmt->bindParam( ':image', $_POST["mail"], PDO::PARAM_STR);


    $res = $stmt->execute();

    if($res){
        $mydb->commit();
        header('Location:index.php');
    }


}catch(PDOException $e){
    echo $e->getMessage();

    $mydb->rollback();
    
}finally{
    $mydb = null;
}

?>