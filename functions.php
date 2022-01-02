<?php

    $host = 'mysql:dbname=qr;host=localhost;charset=utf8';
    $user = 'root';
    $pass = '';

    function connectDB(){

        try{

            $pdo = new PDO($host, $user, $pass);
            return $pdo;

        }catch(PDOException $e){

            exit($e->getMessage());
        }
        
    }
?>