<?php
require "../../config/config.php";

if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $delete = $conn->prepare("DELETE FROM posts WHERE id = :id");
    $delete->execute([
        ':id' => $id
    ]);
    header("Location: ".ADMINROOT."/posts-admins/show-posts.php");
}else{
    die('404');
}