<?php
try{

// Host
    $host = "localhost";
//dbname
    $dbname = "clean-blog";
//user
    $user = "root";
//pass
    $pass = "";

    $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    if(!$conn){
        die("Connection Error ");
    }
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $ex){
    die($ex->getMessage());
}